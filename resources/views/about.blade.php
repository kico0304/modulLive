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
                    <span class="text-white">{{__('home.about_text1')}}</span>
                    <h1 class="mb-5 text-lg">{{__('home.about_text2')}}</h1>
                </div>
            </div>
            </div>
        </div>
    </section>

    <section class="section about-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 centered">
                    <h2 class="title-color resizedFont">{!!__('home.about_text3')!!}</h2>
                    <img src='images/gradprojektgroup.jpg'>
                </div>
                <div class="col-lg-8 justified">
                    <p>{!!__('home.about_text4')!!}</p>
                    <img src="images/about/sign.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 centered">
                    <h2 class="title-color resizedFont">{{__('home.about_text5')}}</h2>
                    <img style="filter: drop-shadow(1px 1px 1px black)" src='images/metkon.png'>
                </div>
                <div class="col-lg-8 justified">
                    <p>{!!__('home.about_text6')!!}</p>
                    <img src="images/about/sign.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="fetaure-page ">
        <div class="container">
            <h1 class="centered" style="margin: 0  0 50px 0;">{{__('home.about_text7')}}</h1>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="about-block-item mb-5 mb-lg-0">
                        <img src="images/drvoprodex.png" alt="" class="img-fluid w-100">
                        <h4 class="mt-3">{{__('home.about_text8')}}</h4>
                        <p class="justified">{{__('home.about_text9')}}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="about-block-item mb-5 mb-lg-0">
                        <img src="images/unicoop-logo.jpg" alt="" class="img-fluid w-100">
                        <h4 class="mt-3">{{__('home.about_text10')}}</h4>
                        <p class="justified">{{__('home.about_text11')}}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="about-block-item mb-5 mb-lg-0">
                        <img src="images/doselektro.png" alt="" class="img-fluid w-100">
                        <h4 class="mt-3">{{__('home.about_text12')}}</h4>
                        <p class="justified">{{__('home.about_text13')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section awards">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <h2 class="title-color">{{__('home.about_text14')}}</h2>
                    <div class="divider mt-4 mb-5 mb-lg-0"></div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="award-img">
                                <img src="images/alumil.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="award-img">
                                <img src="images/aragosta.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="award-img">
                                <img src="images/ardor.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="award-img">
                                <img src="images/dacom.png" alt="" class="img-fluid">
                            </div>
                        </div>
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
