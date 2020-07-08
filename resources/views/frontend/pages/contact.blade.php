@extends('frontend.layouts.master')

@section('content')

    <div class="container margin-top-20">
        <h2><strong><u>Contact Us :</u></strong></h2>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                <div class="input-group margin-bottom-sm">

                </div>
                </div>
            </div>
        </div>

        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <h4>Dial <strong style="color: #002752" >12345</strong><small style="color: darkred"> (available till 9pm.)</small></h4>
                    <h5>
                        Phone:    +8801789975257</h5>
                    <h5>
                        T&T Phone :    55012152, 55012120 & 55012122 .
                    </h5>
                    <hr>
                    <h5 style="color: #023d07"><strong>BdBrandBucket.com</strong></h5>
                    <p>1st Floor - 159/2, Ananna, lake Circus,
                        <br>Kolabagan,
                        Dhaka-1205,
                        Bangladesh</p>
                </div>
                <div class="col-md-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1081.5528317445883!2d90.37943751622318!3d23.74982152968644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b0e848958f%3A0xd56e2e3180c6a3ce!2sKalabagan%2C%20Dhaka%201205!5e0!3m2!1sen!2sbd!4v1572501661979!5m2!1sen!2sbd" width="300" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div class="col-md-4">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Join the Largest Brand E-Shop of Bangladesh</h5>
                    <hr>
                    <a href="{{ route('register') }}" class="btn btn-danger btn-lg">Sign Up for Free!</a>

            </div>
        </div>
        <br>
    </div>
    </div>

@endsection