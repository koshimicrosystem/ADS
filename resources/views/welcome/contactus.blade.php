@extends('layouts.welcome')
@section('title','Contact Us')
@section('meta')
	
@endsection
@section('script2')
<script src="{{asset('unicat/plugins/easing/easing.js')}}"></script>
<script src="{{asset('unicat/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{asset('unicat/plugins/marker_with_label/marker_with_label.js')}}"></script>
<script src="{{asset('unicat/js/contact.js')}}"></script>
@endsection
@section('script1')
@endsection
@section('style2')
<link rel="stylesheet" type="text/css" href="{{asset('unicat/styles/contact.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('unicat/styles/contact_responsive.css')}}">
@endsection
@section('style1')
<link rel="stylesheet" href="{{asset('css/custom.css')}}">
@endsection
@section('body')
<div class="contact">
		
    <!-- Contact Map -->

    <div class="contact_map">

        <!-- Google Map -->
        
        <div class="map">
            <div id="google_map" class="google_map">
                <div class="map_container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3600.9956434791457!2d86.45507531449067!3d25.505191825395844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f1e48a50ba031f%3A0xfc8586059f737d18!2sA.D.S.%20Public%20School!5e0!3m2!1sen!2sin!4v1577801623516!5m2!1sen!2sin" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>

    </div>

    <!-- Contact Info -->

    <div class="contact_info_container">
        <div class="container">
            <div class="row">

                <!-- Contact Form -->
                <div class="col-lg-6">
                    <contactus-component></contactus-component>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-6">
                    <div class="contact_info">
                        <div class="contact_info_title">Contact Info</div>
                        <div class="contact_info_text">
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a distribution of letters.</p>
                        </div>
                        <div class="contact_info_location">
                            <div class="contact_info_location_title">New York Office</div>
                            <ul class="location_list">
                                <li>T8/480 Collins St, Melbourne VIC 3000, New York</li>
                                <li>1-234-567-89011</li>
                                <li>info.deercreative@gmail.com</li>
                            </ul>
                        </div>
                        <div class="contact_info_location">
                            <div class="contact_info_location_title">Australia Office</div>
                            <ul class="location_list">
                                <li>Forrest Ray, 191-103 Integer Rd, Corona Australia</li>
                                <li>1-234-567-89011</li>
                                <li>info.deercreative@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter -->


@endsection
