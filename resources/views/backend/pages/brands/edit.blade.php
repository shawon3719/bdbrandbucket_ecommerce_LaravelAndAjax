@extends('backend.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="card">
                <div class="card-header">
                    Edit Brand
                </div>
                <div class="card-body">
                    <form action="{{route('admin.brand.update', $brand->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('backend.partials.messages')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{$brand->name}}" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description (Optional)</label>
                            <textarea name="description" rows="8" cols="80" class="form-control">{{$brand->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="oldImage">Brand Old Image</label> <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{!! asset('images/brands/'.$brand->image) !!}" width="100"> <br>
                                    <label for="product_image">Brand New Image (Optional)</label>
                                    <input type="file" class="form-control" name="image" id="image" >
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Update Brand</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
    <!-- main-panel ends -->
@endsection
