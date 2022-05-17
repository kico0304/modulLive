@extends('layouts.app')

@php $lang = \Config::get('app.locale'); @endphp

@section('title', 'Home page')

@section('componentcss')
    <style>
        #test {
            color: red;
        }
        .swiper-button-next, .swiper-button-prev{
            color: var(--main-orange);
        }
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
@endsection

@section('sidebar')
{{--    <p>This is appended to the master navbar.</p>--}}
@endsection

@section('content')

    <!-- TEMPLATE PART START -->

    <!-- HEADER START -->
    @include('header')
    <!-- HEADER END -->

    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-xl-7">
                    <div class="block">
                        <div class="divider mb-3"></div>
                        <span class="text-uppercase text-sm letter-spacing ">{{__('home.text25')}}</span>
                        <h1 class="mb-3 mt-3">{{__('home.text26')}}</h1>
                        <p class="mb-4 pr-5">{{__('home.text27')}}</p>
                        <div class="btn-container ">
                            <a href="{{ route('contact') }}" target="_blank" class="btn btn-main-2 btn-icon btn-round-full">{{__('home.text24')}} <i class="icofont-simple-right ml-2  "></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Slider Start -->
    <!-- <section class="banner"> -->
        <!-- <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php

                    $sliderTexts = array (
                        array(
                            "ZAŠTO MMH?",
                            "ModulMobileHomes",
                            "MMH objekti su dimenzionisani prema stvarnim potrebama korisnika, a modularnost i jedinstvenost stambene strukture je postignuta zahvaljujući mogućnostima kombinovanja mobilnih jedinica, koje se modernim dizajnom uklapaju u svako prirodno okruženje.",
                            "Kontaktirajte nas "
                        ),
                        array(
                            "ZAŠTO MMH?",
                            "ModulMobileHomes",
                            "MMH objekti su dimenzionisani prema stvarnim potrebama korisnika, a modularnost i jedinstvenost stambene strukture je postignuta zahvaljujući mogućnostima kombinovanja mobilnih jedinica, koje se modernim dizajnom uklapaju u svako prirodno okruženje.",
                            "Kontaktirajte nas "
                            ),
                        array(
                            "ZAŠTO MMH?",
                            "ModulMobileHomes",
                            "MMH objekti su dimenzionisani prema stvarnim potrebama korisnika, a modularnost i jedinstvenost stambene strukture je postignuta zahvaljujući mogućnostima kombinovanja mobilnih jedinica, koje se modernim dizajnom uklapaju u svako prirodno okruženje.",
                            "Kontaktirajte nas "
                            )
                    );
                    $numberoftexts = count($sliderTexts);
                    $dir = "images/slider/";
                    $images = array();
                    if (is_dir($dir)){
                        if ($dh = opendir($dir)){
                            while (($file = readdir($dh)) !== false){
                                if (!is_dir($dir.$file)) $images[] = $file;
                            }
                            closedir($dh);
                        }
                    }
                    $numberofimages = count($images);

                    //getting images
                    $newArray = array();
                    $finalNumber = $numberofimages * $numberoftexts;
                    for($i=0; $i<$finalNumber; $i++){
                        $k = $i % count($images);
                        $newArray[$i] =  $images[$k];
                    }

                    //getting texts
                    $newArray_ = array();
                    for($i=0; $i<$finalNumber; $i++){
                        $k = $i % count($sliderTexts);
                        $newArray_[$i] =  $sliderTexts[$k];
                    }

                    for($i=0;$i<count($newArray);$i++) : ?>
                       <div class="swiper-slide">
                           <img src="images/slider/<?php echo $newArray[$i] ?>" />
                           <div class="sliderTextSingle">
                                <p class="text-uppercase text-sm letter-spacing animate"><?php echo $newArray_[$i][0] ?></p>
                                <h1  class="mb-3 mt-3 animate"><?php echo $newArray_[$i][1] ?></h1>
                                <p class="mb-4 pr-5 animate"><?php echo $newArray_[$i][2] ?></p>
                                <a id="buttonText" href="{{ route('contact') }}" class="btn btn-main-2 btn-icon btn-round-full animate"><?php echo $newArray_[$i][3] ?><i class="icofont-simple-right ml-2  "></i></a>
                           </div>
                       </div>
                    <?php endfor;
                ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div> -->
    <!-- </section> -->

    <!-- Features Start -->
    <section class="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="feature-block d-lg-flex">
                        <div class="feature-item mb-5 mb-lg-0">
                            <div class="feature-icon mb-4">
                                <i class="icofont-headphone-alt-2"></i>
                            </div>
                            <span>{{__('home.text1')}}</span>
                            <h4 class="mb-3">{{__('home.text2')}}</h4>
                            <p class="mb-4">{{__('home.text3')}}</p>
                            <a href="{{ route('contact') }}" class="btn btn-main btn-round-full">{{__('home.text4')}}</a>
                        </div>

                        <div class="feature-item mb-5 mb-lg-0">
                            <div class="feature-icon mb-4">
                                <i class="icofont-ui-clock"></i>
                            </div>
                            <span>{{__('home.text5')}}</span>
                            <h4 class="mb-3">{{__('home.text6')}}</h4>
                            <ul class="w-hours list-unstyled">
                                <li class="d-flex justify-content-between">{{__('home.text7')}} <span>{{__('home.text10')}}</span></li>
                                <li class="d-flex justify-content-between">{{__('home.text8')}} <span>{{__('home.text11')}}</span></li>
                                <li class="d-flex justify-content-between">{{__('home.text9')}} <span>{{__('home.text12')}}</span></li>
                            </ul>
                        </div>

                        <div class="feature-item mb-5 mb-lg-0">
                            <div class="feature-icon mb-4">
                                <i class="icofont-support"></i>
                            </div>
                            <span>{{__('home.text13')}}</span>
                            <h4 class="mb-3">{{__('home.tel_br')}}</h4>
                            <p>{{__('home.text14')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section cta-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-7"></div>
                <div class="col-lg-5">
                    <div class="cta-content">
                        <div class="divider mb-4"></div>
                        <h2 class="mb-5 text-lg">{{__('home.text15')}} <span class="title-color">{{__('home.text16')}}</span></h2>
                        <a href="{{ route('contact') }}" class="btn btn-main-2 btn-round-full">{{__('home.text17')}}<i class="icofont-simple-right  ml-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="about-img mt-4 mt-lg-0">
                        <img src="images/dijagram_MMH.png" alt="" class="img-fluid img-fluid-exception">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="about-content pl-4 mt-4 mt-lg-0">
                        <!-- <h2 class="title-color">Personal care <br>& healthy living</h2> -->
                        <p class="mt-4 mb-5 mb-5-exception">{{__('home.text18')}}</p>
                        <p class="mt-4 mb-5 mb-5-exception">{{__('home.text19')}}</p>
                        <p class="mt-4 mb-5 mb-5-exception">{{__('home.text20')}}</p>
                        <p class="mt-4 mb-5 mb-5-exception">{{__('home.text21')}}</p>
                        <p class="mt-4 mb-5 mb-5-exception">{{__('home.text22')}}</p>
                        <p class="mt-4 mb-5 mb-5-exception">{{__('home.text23')}}</p>
                        <a href="{{ route('contact') }}" class="btn btn-main-2 btn-round-full btn-icon">{{__('home.text24')}}<i class="icofont-simple-right ml-3"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER START -->
    @include('footer')
    <!-- FOOTER END -->

    <!-- TEMPLATE PART END -->
@endsection

@section('js')

    <!-- Initialize Swiper -->
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
