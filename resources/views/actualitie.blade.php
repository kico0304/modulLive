@extends('layouts.app')

@section('title', 'Home page')

@section('componentcss')
    <style>

    </style>
@endsection

@section('sidebar')
    <p>This is appended to the master navbar.</p>
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
                    <!-- <span class="text-white">25. April 2021</span> -->
                    @foreach($actualities as $actualitie)
                    <h1 class="mb-5 text-lg">{{$actualitie->name}}</h1>
                    @endforeach                    
                </div>
            </div>
            </div>
        </div>
    </section>

    <section class="section blog-wrap">
        <div class="container">
            <div class="row">
            
            @foreach($actualitie->images as $image)
            <div class="col-lg-4 mb-4">
                <img class="lightboxed" rel="group1" src="{{asset('images/actualities/actualities_'.$actualitie->id.'/'.$image->name)}}" data-link="{{asset('images/actualities/actualities_'.$actualitie->id.'/'.$image->name)}}" alt="" data-caption="" />
            </div>
            @endforeach
                <div class="col-lg-12 mb-5">
                    <div class="single-blog-item">
                        <!-- <div class="swiper mySwiper" style="max-height:400px">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    @foreach($actualitie->images as $image)
                                    <img src="{{asset('images/actualities/actualities_'.$actualitie->id.'/'.$image->name)}}" />
                                    @endforeach
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div> -->
                        <div class="blog-item-content mt-5">
                            <div class="blog-item-meta mb-3">
                                <span class="text-black text-capitalize mr-3"><i class="icofont-calendar mr-2"></i>{{date('d-m-Y', strtotime($actualitie->created_at))}}</span>
                            </div> 
                            @foreach($actualities as $actualitie)
                            <h2 class="mb-4 text-md">{{$actualitie->name}}</h2>
                            <p class="lead mb-4">{{$actualitie->text}}</p>
                            @endforeach
                            <!-- <blockquote class="quote">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </blockquote> -->
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </section>

    <!-- FOOTER START -->
    @include('footer') 
    <!-- FOOTER END -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>


@endsection

@section('js')
    
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>

@endsection
