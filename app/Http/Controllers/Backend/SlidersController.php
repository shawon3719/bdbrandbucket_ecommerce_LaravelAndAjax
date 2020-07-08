<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Image;
use File;

class SlidersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $sliders = Slider::orderBy('priority', 'asc')->get();
        return view('backend.pages.sliders.index', compact('sliders'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'image' => 'required','image',
            'priority' => 'required',
            'button_link' => 'nullable|url',
            'button_text' => 'nullable',
        ],
            [ 'title.required' => 'Please Provide a Slider Title',
                'priority.required' => 'Please Provide a Slider Priority',
                'image.required' => 'Please Provide a Slider Image',
                'image.image' => 'Please Provide a valid Slider Image',
                'button_text' => 'Please Provide a Slider Button Text',
                'button_link.url' => 'Please Provide a valid Slider Button Link',

            ]);
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;
        if ($request->image>0){
            $image = $request->file('image');
            $img = time() . '.'.$image->getClientOriginalExtension();
            $location = 'images/sliders/'.$img;
            Image::make($image)->save($location);
            $slider->image = $img;

        }
        $slider->save();

        session()->flash('success', 'A Slider has been added successfully');
        return redirect()->route('admin.sliders');
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'title' => 'required',
            'image' => 'nullable','image',
            'priority' => 'required',
            'button_link' => 'nullable|url',
        ],
            [
                'title.required' => 'Please Provide a Slider Title',
                'priority.required' => 'Please Provide a Slider Priority',
                'image.image' => 'Please Provide a valid Slider Image',
                'button_link.url'=> 'Please Provide a valid Slider Button Link'

            ]);
        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;
        if ($request->image>0){
            //Delete Old Slider
            if (File::exists('images/sliders/'.$slider->image)) {
                (File::delete('images/sliders/' . $slider->image));
            }
            $image = $request->file('image');
            $img = time() . '.'.$image->getClientOriginalExtension();
            $location = 'images/sliders/'.$img;
            Image::make($image)->save($location);
            $slider->image = $img;
        }
        $slider->save();

        session()->flash('success', 'Slider has been updated successfully');
        return redirect()->route('admin.sliders');
    }
    public function delete($id){
        $slider = Slider::find($id);
        if (!is_null($slider)){
            //Delete Image
            if (File::exists('images/sliders/'.$slider->image)) {
                (File::delete('images/sliders/' . $slider->image));
            }
            $slider->delete();
        }
        session()->flash('success', 'Slider has been deleted successfully');
        return back();
    }

}
