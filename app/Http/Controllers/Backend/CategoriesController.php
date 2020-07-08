<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;


use Image;

use File;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $categories = Category::orderBy('id','desc')->get();
        return view('backend.pages.categories.index',compact('categories'));

    }

    public function create(){
        $main_categories = Category::orderBy('name','desc')->where('parent_id', Null)->get();
        return view('backend.pages.categories.create', compact('main_categories'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'image' => 'nullable|image',
        ],
            [
                'name.required' => 'Please provide a category name!',
                'image.image' => 'Please provide a valid image (ex: .png, .jpg, .gif, .jpeg etc.)!',


                ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        //insert images also
        if ($request->image>0){
                $image = $request->file('image');
                $img = time() . '.'.$image->getClientOriginalExtension();
                $location = 'images/categories/'.$img;
                Image::make($image)->save($location);
            $category->image = $img;

        }
        $category->save();

        session()->flash('success','A new Category has been added successfully!');
        return redirect()->route('admin.categories');
    }

    public function edit($id){
        $main_categories = Category::orderBy('name','desc')->where('parent_id', Null)->get();
        $category = Category::find($id);
        if (!is_null($category)){
            return view('backend.pages.categories.edit',compact('category','main_categories'));
        }else{
            return redirect()->route('admin.categories');
        }
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'image' => 'nullable|image',
        ],
            [
                'name.required' => 'Please provide a category name!',
                'image.image' => 'Please provide a valid image (ex: .png, .jpg, .gif, .jpeg etc.)!',


            ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        //insert images also
        if ($request->image>0){
            //delete the old image from folder

            if (File::exists('images/categories/'.$category->image)){
                File::delete('images/categories/'.$category->image);
            }

            $image = $request->file('image');
            $img = time() . '.'.$image->getClientOriginalExtension();
            $location = 'images/categories/'.$img;
            Image::make($image)->save($location);
            $category->image = $img;

        }
        $category->save();

        session()->flash('success','A new Category has been updated successfully!');
        return redirect()->route('admin.categories');
    }

    public function delete($id){
        $category = Category::find($id);
        if(!is_null($category)){

            //If it is Primary Category, then delete all it's sub category
            if ($category->parent_id == NULL){
                //delete sub-categories
                $sub_categories = Category::orderBy('name','desc')->where('parent_id', $category->id)->get();

                foreach ($sub_categories as $sub){
                    if (File::exists('images/categories/'.$sub->image)){
                        File::delete('images/categories/'.$sub->image);
                    }
                    $sub->delete();

                }

            }

            //Delete category image
            if (File::exists('images/categories/'.$category->image)){
                File::delete('images/categories/'.$category->image);
            }
            $category->delete();
        }
        session()->flash('success','Category has been deleted successfully!');
        return back();
    }

}
