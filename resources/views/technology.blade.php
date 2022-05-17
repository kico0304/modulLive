@extends('layouts.app')

@section('title', 'Home page')

@section('componentcss')
    <style>

    </style>
@endsection

@section('sidebar')
{{--    <p>This is appended to the master navbar.</p>--}}
@endsection

@section('content')

    <!-- HEADER START -->
    @include('header')
    <!-- HEADER END -->

    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">{{__('home.technology_text1')}}</span>
                    <h1 class="mb-5 text-lg">{{__('home.technology_text2')}}</h1>
                </div>
            </div>
            </div>
        </div>
    </section>

    <section class="section doctor-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="doctor-details mt-4 mt-lg-0">
                        <h2 class="text-md">{{__('home.technology_text3')}}</h2>
                        <div class="divider my-4"></div>
                        <img style="width: 300px;float: left;margin-right: 30px;margin-bottom: 30px;" src="images/tech1.jpg" >
                        <p>{{__('home.technology_text4')}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="doctor-details mt-4 mt-lg-0">
                        <h2 class="text-md">{{__('home.technology_text5')}}</h2>
                        <div class="divider my-4"></div>
                        <p>{{__('home.technology_text6')}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="doctor-details mt-4 mt-lg-0">
                        <h2 class="text-md">{{__('home.technology_text7')}}</h2>
                        <div class="divider my-4"></div>
                        <img style="width: 300px;float: left;margin-right: 30px;margin-bottom: 30px;" src="images/tech2.png" >
                        <p>{{__('home.technology_text8')}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="doctor-details mt-4 mt-lg-0">
                        <h2 class="text-md">{{__('home.technology_text9')}}</h2>
                        <div class="divider my-4"></div>
                        <p>{{__('home.technology_text10')}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="doctor-details mt-4 mt-lg-0">
                        <h2 class="text-md">{{__('home.technology_text11')}}</h2>
                        <div class="divider my-4"></div>
                        <p>{{__('home.technology_text12')}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="doctor-details mt-4 mt-lg-0">
                        <h2 class="text-md">{{__('home.technology_text13')}}</h2>
                        <div class="divider my-4"></div>
                        <p>{{__('home.technology_text14')}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="doctor-details mt-4 mt-lg-0">
                        <h2 class="text-md">{{__('home.technology_text15')}}</h2>
                        <div class="divider my-4"></div>
                        <p>{{__('home.technology_text16')}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="doctor-details mt-4 mt-lg-0">
                        <h2 class="text-md">{{__('home.technology_text17')}}</h2>
                        <div class="divider my-4"></div>
                        <p>{{__('home.technology_text18')}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="doctor-details mt-4 mt-lg-0">
                        <h2 class="text-md">{{__('home.technology_text19')}}</h2>
                        <div class="divider my-4"></div>
                        <p>{{__('home.technology_text20')}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="doctor-details mt-4 mt-lg-0">
                        <h2 class="text-md">{{__('home.technology_text21')}}</h2>
                        <div class="divider my-4"></div>
                        <p>{{__('home.technology_text22')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- FOOTER START -->
    @include('footer')
    <!-- FOOTER END -->


@endsection

@section('js')
    <script type="text/javascript">

    </script>

@endsection
