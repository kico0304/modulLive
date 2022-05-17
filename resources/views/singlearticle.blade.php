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
                    <span class="text-white">25. April 2021</span>
                    <h1 class="mb-5 text-lg">Postavljanje uzornog objekta</h1>
                </div>
            </div>
            </div>
        </div>
    </section>

    <section class="section blog-wrap">
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <div class="single-blog-item">
                                <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
                                    <div class="gallery-cell"><img src="images/aktuelnosti/blog-1.jpg" ></div>
                                    <div class="gallery-cell"><img src="images/aktuelnosti/blog-2.jpg" ></div>
                                    <div class="gallery-cell"><img src="images/aktuelnosti/blog-3.jpg" ></div>
                                    <div class="gallery-cell"><img src="images/aktuelnosti/blog-4.jpg" ></div>
                                    <div class="gallery-cell"><img src="images/aktuelnosti/blog-5.jpg" ></div>
                                    <div class="gallery-cell"><img src="images/aktuelnosti/blog-6.jpg" ></div>
                                    <div class="gallery-cell"><img src="images/aktuelnosti/blog-7.jpg" ></div>
                                    <div class="gallery-cell"><img src="images/aktuelnosti/blog-8.jpg" ></div>
                                    <div class="gallery-cell"><img src="images/aktuelnosti/blog-9.jpg" ></div>
                                    <div class="gallery-cell"><img src="images/aktuelnosti/blog-10.jpg" ></div>
                                </div>
                                <div class="blog-item-content mt-5">
                                    <div class="blog-item-meta mb-3">
                                        <span class="text-black text-capitalize mr-3"><i class="icofont-calendar mr-2"></i>25. April 2021</span>
                                    </div> 

                                    <h2 class="mb-4 text-md"><a href="blog-single.html">Postavljanje uzornog objekta</a></h2>

                                    <p class="lead mb-4">Danas smo postavili objekat MMH21.M01 na raskršću ulica Patre i Kralja Petra I Oslobodioca.</p>

                                    <p>Objekat ćemo koristiti kao SHOWROOM i moći ćete ga obići svaki radni dan od 12-16 sati (skraćeno zbog godišnjih odmora) ili po dogovoru sa našim prodajnim agentima. Obilazak možete zakazati na broj telefona 065 95 95 95 ili popunite formular na linku.</p>

                                    <blockquote class="quote">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    </blockquote>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, rerum beatae repellat tenetur incidunt quisquam libero dolores laudantium. Nesciunt quis itaque quidem, voluptatem autem eos animi laborum iusto expedita sapiente.</p>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, rerum beatae repellat tenetur incidunt quisquam libero dolores laudantium. Nesciunt quis itaque quidem, voluptatem autem eos animi laborum iusto expedita sapiente.</p>
                                </div>
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
