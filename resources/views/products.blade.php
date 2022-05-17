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
                    <span class="text-white">{{__('home.product_text1')}}</span>
                    <h1 class="mb-5 text-lg">{{__('home.product_text2')}}</h1>
                </div>
            </div>
            </div>
        </div>
    </section>

    <section class="section doctors">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h2>{{__('home.product_text3')}}</h2>
                        <div class="divider mx-auto my-4"></div>
                        <p>{{__('home.product_text4')}}</p>
                    </div>
                </div>
            </div>

            <div class="col-12 text-center  mb-5">
                <div class="btn-group btn-group-toggle " data-toggle="buttons">
                    <label class="btn active ">
                        <input type="radio" name="shuffle-filter" value="all" checked="checked" />{{__('home.product_text5')}}
                    </label>
                    <label class="btn">
                        <input type="radio" name="shuffle-filter" value="1" />{{__('home.product_text6')}}
                    </label>
                    <label class="btn">
                        <input type="radio" name="shuffle-filter" value="2" />{{__('home.product_text7')}}
                    </label>
                </div>
            </div>

            <div class="row shuffle-wrapper portfolio-gallery">
            @foreach($products as $product)
                <!-- <p>Product name: {{$product->names[0]->name}}</p> -->
                <!-- <p>Product price: {{$product->price}}</p> -->
                <!-- <p>Product surface: {{$product->surface}}</p> -->
                <!-- <p>Product text: {{$product->texts[0]->text}}</p> -->
                <!-- <img class="img" alt="" src="{{asset('images/products/product_'.$product->id.'/'.$product->images[0]->name)}}"> -->

                <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;{{$product->type}}&quot;,&quot;{{$product->type}}&quot;]">
                    <div class="position-relative doctor-inner-box">
                        <div class="doctor-profile">
                        <div class="doctor-img">
                                <img src="{{asset('images/products/product_'.$product->id.'/'.$product->images[0]->name)}}" class="img-fluid w-100">
                        </div>
                        </div>
                        <div class="content mt-3 product_view" data-id="{{$product->id}}">
                            <h4 class="mb-0"><a href="{{ route('product', $product->id) }}">{{$product->names[0]->name}}</a></h4>
                            <p>{{__('home.product_text8')}} {{$product->surface}} <span class="superscript">2</span></p>
                            <!-- <p>{{$product->id}}</p> -->
                        </div>
                    </div>
                </div>
            @endforeach

                <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;{{$product->type}}&quot;,&quot;{{$product->type}}&quot;]">
                    <div class="position-relative doctor-inner-box">
                        <div class="doctor-profile">
                        <div class="doctor-img">
                                <img src="{{asset('images/products/product_'.$product->id.'/'.$product->images[0]->name)}}" class="img-fluid w-100">
                                <div class="overlay_combination"></div>
                                <i class="icofont-question-circle"></i>
                        </div>
                        </div>
                        <div class="content mt-3">
                            <h4 style="text-align:center" class="mb-0"><a href="{{ route('modules') }}">{{__('home.product_text9')}}</a></h4>
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
        //increment view product
        $('.product_view').click(function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            $.ajax({
                url: '{{ url('/product_view') }}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'id': id},
                type: 'post',
                success: function (ret) {
                    window.location.href = '{{ url('/product/' ) }}/' + id;
                },
                error: function (err) {
                    window.location.href = '{{ url('/product/' ) }}/' + id;
                }
            })
        });
    </script>

@endsection
