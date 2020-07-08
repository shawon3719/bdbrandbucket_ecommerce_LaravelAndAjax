@include('frontend.partials.styles')
@extends('frontend.layouts.master')
@section('content')

    <!---view Slider--->
    <div class="our-slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($sliders as $slider)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{$loop->index == 0 ?  'active' : ''}}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner shadow">
                @foreach($sliders as $slider)
                    <div class="carousel-item {{$loop->index == 0 ?  'active' : ''}}">
                        <img src="{{asset('images/sliders/'.$slider->image)}}" class="d-block w-100" alt="{{asset($slider->title)}}" style="height: 450px">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>{{$slider->title}}</h3>
                            @if($slider->button_text)
                                <p>
                                    <a href="{{$slider->button_link}}" target="_blank" class="btn btn-danger border-dark"><i class="fa fa-mouse-pointer" aria-hidden="true"></i>
                                        {{$slider->button_text}}</a>
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- Start Sidebar + Content -->
    <div class='container margin-top-20'>
        <!---view Sidebar--->
        <div class="row">
            <div class="col-md-4">
                @include('frontend.partials.sidebar')
            </div>
            <!---view products--->
            <div class="col-md-8">
                <div class="widget">
                    <h3>All Products</h3>
                    @include('frontend.pages.product.partials.all_products')
                </div>
                <div class="widget">

                </div>
            </div>


        </div>
    </div>
    <!-- End Sidebar + Content -->
@endsection
