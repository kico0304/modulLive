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
                    <span class="text-white">{{__('home.prod_text1')}}</span>
                    @foreach($products as $product)
                    <span class="text-white">{{$product->names[0]->name}}</span>
                    <h1 class="mb-5 text-lg">{{__('home.prod_text2')}}</h1>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
    </section>

    <section class="section doctor-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
                        @foreach($product->images as $image)
                        <div class="gallery-cell"><img src="{{asset('images/products/product_'.$product->id.'/'.$image->name)}}"></div>
                        @endforeach
                    </div>
                    <div id="mobileGallery">
                        @foreach($product->images as $image)
                        <div class="col-lg-6 mb-6">
                            <img class="lightboxed" rel="group1" src="{{asset('images/products/product_'.$product->id.'/'.$image->name)}}" data-link="{{asset('images/products/product_'.$product->id.'/'.$image->name)}}" alt="" data-caption="" />
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-2 mb-5 flexCenter">
                @foreach($products as $product)
                    <div class="flexColumn marginedClass">
                    <i class="icofont-ui-home newIcons2"></i>
                    <h3>{{$product->surface}} m<sup>2</sup></h3>
                    </div>
                @endforeach
                </div>
                <div class="col-lg-8 mb-5">
                    @foreach($products as $product)
                    <div>
                        <p class="textJustify">{{$product->texts[0]->text}}</p>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-2 mb-5 flexCenter">
                @foreach($products as $product)
                    <div class="flexColumn marginedClass">
                    <i class="icofont-euro-true newIcons2"></i>
                    <h3>{{$product->price}}</h3>
                    </div>
                @endforeach
                </div>
                <div class="col-lg-12 mb-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center">
                            <div class="">
                                <h2 class="mainBlue">{{__('home.prod_text3')}}</h2>
                                <div class="divider mx-auto my-4"></div>
                                <p>{{__('home.prod_text4')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($products as $product)
                    <!-- <p>Product name: {{$product->names[0]->name}}</p> -->
                    <!-- <p>Product price: {{$product->price}}</p> -->
                    <!-- <p>Product surface: {{$product->surface}}</p> -->
                    <!-- <p>Product text: {{$product->texts[0]->text}}</p> -->
                    @foreach($product->product_parts as $part)
                    <div class="col-lg-6 mb-5 flexOnly">
                        <div class="partsTexts flexCentered">
                            <h3>{{$part->part_names()->where('language', $lang)->first()->name}}</h3>
                            <p>{{$part->part_texts()->where('language', $lang)->first()->text}}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-5">
                    @foreach($part->part_images as $part_img)
                            <img style="width: 100%;" src="{{asset('images/parts/part_'.$part->id.'/'.$part_img->name)}}">
                    @endforeach
                    </div>
                        <!-- <p>Product part name: {{$part->part_names[0]->name}}</p> -->
                        <!-- <p>Product part text: {{$part->part_texts[0]->text}}</p> -->
                    @endforeach
                @endforeach
                <div class="col-lg-4 col-md-6">
                </div>

                <div class="col-lg-8 col-md-6">
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
