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
                    <span class="text-white">{{__('home.contact_text1')}}</span>
                    <h1 class="mb-5 text-lg">{{__('home.contact_text2')}}</h1>
                </div>
            </div>
            </div>
        </div>
    </section>

    <section class="contact-form-wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <!-- <h2 class="text-md mb-2"></h2> -->
                        <div class="divider mx-auto my-4"></div>
                        <h3>{{__('home.contact_text3')}}</h3>
                        <select name="countryChoose" id="countryChoose">
                            <option value="none">{{__('home.contact_text4')}}</option>
                            <option value="Bosna i Hercegovina">{{__('home.contact_text5')}}</option>
                            <option value="Hrvatska">{{__('home.contact_text6')}}</option>
                            <option value="Slovenija">{{__('home.contact_text7')}}</option>
                            <option value="Srbija">{{__('home.contact_text8')}}</option>
                            <option value="Grčka">{{__('home.contact_text9')}}</option>
                            <option value="Makedonija">{{__('home.contact_text10')}}</option>
                        </select>
                        <div id="addressCounties"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <form id="contact-form" class="contact__form" method="post" action="{{ asset('mail_handler.php') }}">
                    <!-- form message -->
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                    {{__('home.contact_text11')}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input name="mailto" id="mailto" type="email" class="form-control"  style="height:0px!important; border: none!important; padding:0!important">
                                </div>
                                <div class="form-group">
                                    <input name="disCountry" id="disCountry" type="text" class="form-control"  style="height:0px!important; border: none!important; padding:0!important">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="name" id="name" type="text" class="form-control" placeholder="{{__('home.contact_text12')}}" disabled="true">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="email" id="email" type="email" class="form-control" placeholder="{{__('home.contact_text13')}}" disabled="true">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="subject" id="subject" type="text" class="form-control" placeholder="{{__('home.contact_text14')}}" disabled="true">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="phone" id="phone" type="text" class="form-control" placeholder="{{__('home.contact_text15')}}" disabled="true">
                                </div>
                            </div>
                        </div>

                        <div class="form-group-2 mb-4">
                            <textarea name="message" id="message" class="form-control" rows="8" placeholder="{{__('home.contact_text16')}}" disabled="true"></textarea>
                        </div>

                        <div class="text-center">
                            <input id="submitContact" class="btn btn-main btn-round-full" name="submit" type="submit" value="{{__('home.contact_text17')}}" disabled="true"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="mapouter">
        <div class="gmap_canvas">
            <iframe width="1920" height="0" id="gmap_canvas" src="" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            <style>
                .mapouter{
                    position:relative;
                    text-align:right;
                    height:0px;
                    width:100%;
                }
            </style>
            <!-- <a href="https://www.embedgooglemap.net">google embedded</a> -->
            <style>
                .gmap_canvas{
                    overflow:hidden;
                    background:none!important;
                    height:0px;
                    width:100%;
                }
            </style>
        </div>
    </div>

    <!-- FOOTER START -->
    @include('footer')
    <!-- FOOTER END -->


@endsection

@section('js')
    <script type="text/javascript">

        let mailToAddressBA = "marijanasebez.mmh@gmail.com";
        let mailToAddressHR = "marijanasebez.mmh@gmail.com";
        let mailToAddressSI = "marijanasebez.mmh@gmail.com";
        let mailToAddressRS = "marijanasebez.mmh@gmail.com";
        let mailToAddressGR = "marijanasebez.mmh@gmail.com";
        let mailToAddressMK = "marijanasebez.mmh@gmail.com";

        function disableInputs() {
            //getting selected option
            var selectBoxCountry = $("#countryChoose option:selected").attr("Value");
            //addresses
            var bosniaAddress = "<div class='logoAddress'><img src='images/gradprojektgroup.jpg'></div><div class='textLogoAddress'>{!!__('home.contact_text18')!!}</div>";
            var sloveniaAddress = "<div class='logoAddress'><img src='images/gradprojektgroup.jpg'></div><div class='textLogoAddress'>{!!__('home.contact_text19')!!}</div>";
            var srbijaAddress = "<div class='logoAddress'><img src='images/primavera-logo.png'></div><div class='textLogoAddress'>{!!__('home.contact_text20')!!}</div>";
            //switch content function
            switch(selectBoxCountry){
                case "none":
                    $("#name, #email, #subject, #phone, #message, #submitContact").prop("disabled", true);
                    $("#name, #email, #subject, #phone, #message").val("");
                    $(".mapouter, .gmap_canvas, #gmap_canvas").css("height", "0px");
                    $("#gmap_canvas").prop("src", "")
                    $("#addressCounties").html("").animate({'opacity': 1}, 400);
                    $("#mailto").val("");
                    $("#disCountry").val("");
                    break;
                case "Bosna i Hercegovina":
                    $("#name, #email, #subject, #phone, #message, #submitContact").prop("disabled", false);
                    $(".mapouter, .gmap_canvas, #gmap_canvas").css("height", "500px");
                    $("#gmap_canvas").prop("src", "https://maps.google.com/maps?q=Isaije%20MItrovi%C4%87a%203,%2078000%20Banja%20Luka&t=&z=13&ie=UTF8&iwloc=&output=embed");
                    $("#addressCounties").html(bosniaAddress).animate({'opacity': 1}, 400);
                    $("#mailto").val(mailToAddressBA);
                    $("#disCountry").val("Bosna i Hercegovina");
                    break;
                case "Hrvatska":
                    $("#name, #email, #subject, #phone, #message, #submitContact").prop("disabled", false);
                    $(".mapouter, .gmap_canvas, #gmap_canvas").css("height", "500px");
                    $("#gmap_canvas").prop("src", "https://maps.google.com/maps?q=5000%20Nova%20Gorica,%20%20Ulica%20Gradnikove%20brigade%2053&t=&z=13&ie=UTF8&iwloc=&output=embed");
                    $("#addressCounties").html(sloveniaAddress).animate({'opacity': 1}, 400);
                    $("#mailto").val(mailToAddressHR);
                    $("#disCountry").val("Hrvatska");
                    break;
                case "Slovenija":
                    $("#name, #email, #subject, #phone, #message, #submitContact").prop("disabled", false);
                    $(".mapouter, .gmap_canvas, #gmap_canvas").css("height", "500px");
                    $("#gmap_canvas").prop("src", "https://maps.google.com/maps?q=5000%20Nova%20Gorica,%20%20Ulica%20Gradnikove%20brigade%2053&t=&z=13&ie=UTF8&iwloc=&output=embed");
                    $("#addressCounties").html(sloveniaAddress).animate({'opacity': 1}, 400);
                    $("#mailto").val(mailToAddressSI);
                    $("#disCountry").val("Slovenija");
                    break;
                case "Srbija":
                    $("#name, #email, #subject, #phone, #message, #submitContact").prop("disabled", false);
                    $(".mapouter, .gmap_canvas, #gmap_canvas").css("height", "500px");
                    $("#gmap_canvas").prop("src", "https://maps.google.com/maps?q=Ugrinova%C4%8Dki%20Put%2029%20%2011080,%20Beograd%20(Zemun)%20Serbia&t=&z=13&ie=UTF8&iwloc=&output=embed");
                    $("#addressCounties").html(srbijaAddress).animate({'opacity': 1}, 400);
                    $("#mailto").val(mailToAddressRS);
                    $("#disCountry").val("Srbija");
                    break;
                case "Grčka":
                    $("#name, #email, #subject, #phone, #message, #submitContact").prop("disabled", false);
                    $(".mapouter, .gmap_canvas, #gmap_canvas").css("height", "500px");
                    $("#gmap_canvas").prop("src", "https://maps.google.com/maps?q=Ugrinova%C4%8Dki%20Put%2029%20%2011080,%20Beograd%20(Zemun)%20Serbia&t=&z=13&ie=UTF8&iwloc=&output=embed");
                    $("#addressCounties").html(srbijaAddress).animate({'opacity': 1}, 400);
                    $("#mailto").val(mailToAddressGR);
                    $("#disCountry").val("Grčka");
                    break;
                case "Makedonija":
                    $("#name, #email, #subject, #phone, #message, #submitContact").prop("disabled", false);
                    $(".mapouter, .gmap_canvas, #gmap_canvas").css("height", "500px");
                    $("#gmap_canvas").prop("src", "https://maps.google.com/maps?q=Ugrinova%C4%8Dki%20Put%2029%20%2011080,%20Beograd%20(Zemun)%20Serbia&t=&z=13&ie=UTF8&iwloc=&output=embed");
                    $("#addressCounties").html(srbijaAddress).animate({'opacity': 1}, 400);
                    $("#mailto").val(mailToAddress);
                    $("#disCountry").val("mailToAddressMK");
                    break;
            }

        }
        //do the functon on load
        $(document).ready(function() {
            disableInputs();
        });
        //do the function on change
        $('#countryChoose').on('change', function() {
            disableInputs();
        });

    </script>

@endsection
