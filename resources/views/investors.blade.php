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
                    <span class="text-white">{{__('home.investor_text1')}}</span>
                    <h1 class="mb-5 text-lg">{{__('home.investor_text2')}}</h1>
                </div>
            </div>
            </div>
        </div>
    </section>

    <section class="section service-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h2>{{__('home.investor_text3')}}</h2>
                        <div class="divider mx-auto my-4"></div>
                        <img src="images/investors.png" alt="" style="width: 100%;">
                    </div>
                </div>
            </div>

            <div class="row centered">
                <div class="col-lg-3 col-md-6 ">
                    <div class="department-block mb-5">
                        <!-- <img src="images/service/service-1.jpg" alt="" class="img-fluid w-100"> -->
                        <div class="content">
                            <div class="feature-icon mb-4 newIcons">
                                <i class="icofont-users-alt-2"></i>
                            </div>
                            <h4 class="mt-4 mb-2 title-color eeeback">{{__('home.investor_text4')}}</h4>
                            <p class="mb-4">{{__('home.investor_text5')}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="department-block mb-5">
                        <!-- <img src="images/service/service-2.jpg" alt="" class="img-fluid w-100"> -->
                        <div class="content">
                            <div class="feature-icon mb-4 newIcons">
                                <i class="icofont-law"></i>
                            </div>
                            <h4 class="mt-4 mb-2  title-color eeeback">{{__('home.investor_text6')}}</h4>
                            <p class="mb-4">{{__('home.investor_text7')}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="department-block mb-5">
                        <!-- <img src="images/service/service-3.jpg" alt="" class="img-fluid w-100"> -->
                        <div class="content">
                            <div class="feature-icon mb-4 newIcons">
                                <i class="icofont-money"></i>
                            </div>
                            <h4 class="mt-4 mb-2 title-color eeeback">{{__('home.investor_text8')}}</h4>
                            <p class="mb-4">{{__('home.investor_text9')}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="department-block mb-5">
                        <!-- <img src="images/service/service-3.jpg" alt="" class="img-fluid w-100"> -->
                        <div class="content">
                            <div class="feature-icon mb-4 newIcons">
                                <i class="icofont-hail-rainy-sunny"></i>
                            </div>
                            <h4 class="mt-4 mb-2 title-color eeeback">{{__('home.investor_text10')}}</h4>
                            <p class="mb-4">{{__('home.investor_text11')}} <!-- Čelična konstrukcija osigurava da se objekti ne mogu oštetiti prilikom prenošenja objekta na drugu lokaciju. --></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin:0">
                <p class="textJustify">{{__('home.investor_text12')}}</p>
            </div>
            <div class="row">
                <h3 id="scrollhere" class="margined30 centered flexGrow1 myMainColorForTexts">{{__('home.investor_text13')}}</h3>
                <form id="contact-form" class="contact__form" method="post" action="{{ asset('calc.php') }}">
                    <div class="row">
                        <div class="col-12">
                            
                        </div>
                    </div>
                    <div class="row centered">
                        <div class="col-lg-6 col-md-6">
                            <div id="calculationButton" class="btn btn-main btn-round-full btn-active" style="margin-bottom:30px">{{__('home.investor_text14')}}</div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div id="sendCalculationButton" class="btn btn-main btn-round-full btn-inactive" style="margin-bottom:30px">{{__('home.investor_text15')}}</div>
                        </div>
                    </div>
                    <div class="row" id="calculationRow">
                        <div class="col-lg-12 col-md-12 margined10">
                            <div class="form-group">
                                <label>{{__('home.investor_text16')}}</label>
                                <input name="landPrice" id="landPrice" type="number" class="form-control" placeholder="{{__('home.investor_text59')}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 margined10">
                            <div class="form-group">
                                <label>{{__('home.investor_text17')}}</label>
                                <input name="modelAnumber" id="modelAnumber" type="number" class="form-control" placeholder="{{__('home.investor_text60')}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 margined10">
                            <div class="part-image-fixed">
                                <img src="images/osnovni-modul-A_.png" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 margined10">
                            <div class="form-group">
                                <label>{{__('home.investor_text18')}}</label>
                                <input name="modelBnumber" id="modelBnumber" type="number" class="form-control" placeholder="{{__('home.investor_text60')}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 margined10">
                            <div class="part-image-fixed">
                                <img src="images/osnovni-modul-B_.png" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 margined10">
                            <div class="form-group">
                                <label>{{__('home.investor_text19')}}</label>
                                <input name="modelDnumber" id="modelDnumber" type="number" class="form-control" placeholder="{{__('home.investor_text60')}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 margined10">
                            <div class="part-image-fixed">
                                <img src="images/veca-soba_.png" />
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 margined10">
                            <h3 class="myMainColorForTexts">{{__('home.investor_text20')}} <span id="ukupnoSoba">0</span></h3>
                            <input name="totalRoomsHidden" id="totalRoomsHidden" type="number" class="form-control" hidden>
                        </div>
                        <div class="col-lg-12 col-md-12 margined10">
                            <h3 class="myMainColorForTexts">{{__('home.investor_text21')}} <span id="ukupnaInvesticija">0.00 €</span></h3>
                            <input name="totalInvestionHidden" id="totalInvestionHidden" type="number" class="form-control" hidden>
                        </div>
                        <div class="col-lg-12 col-md-12 margined10" style="margin-top: 50px!important">
                            <h4 class="myMainColorForTexts">{{__('home.investor_text22')}}</h4>
                            <div class="divider mx-auto my-4" style="margin: 0 0 0 0px!important"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 margined10">
                            <div class="form-group">
                                <label>{{__('home.investor_text23')}}</label>
                                <input name="numberOfYears" id="numberOfYears" type="number" class="form-control" placeholder="{{__('home.investor_text61')}}">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 margined10">
                            <div class="form-group">
                                <label>{{__('home.investor_text24')}}</label>
                                <input name="yearlyInterest" id="yearlyInterest" type="number" class="form-control" placeholder="{{__('home.investor_text62')}}">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 margined10">
                            <div class="form-group">
                                <label>{{__('home.investor_text25')}}</label>
                                <input name="totalMinus" id="totalMinus" type="number" class="form-control" placeholder="" disabled="true">
                                <input name="totalMinus_0" id="totalMinus_0" type="text" class="form-control" hidden>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 margined10">
                            <h4 class="myMainColorForTexts">{{__('home.investor_text26')}}</h4>
                            <div class="divider mx-auto my-4" style="margin: 0 0 0 0px!important"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 margined10">
                            <div class="form-group">
                                <label>{{__('home.investor_text27')}}</label>
                                <input name="dailyRentPrice" id="dailyRentPrice" type="number" class="form-control" placeholder="{{__('home.investor_text63')}}">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 margined10">
                            <div class="form-group">
                                <label>{{__('home.investor_text28')}}</label>
                                <input name="averageRent" id="averageRent" type="number" class="form-control" placeholder="{{__('home.investor_text64')}}">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 margined10">
                            <div class="form-group">
                                <label>{{__('home.investor_text29')}}</label>
                                <input name="totalPlus" id="totalPlus" type="number" class="form-control" placeholder="" disabled="true">
                                <input name="totalPlus_0" id="totalPlus_0" type="number" class="form-control" hidden>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12" style="text-align:center;">
                            <div id="sendCalculationButton_" class="btn btn-main btn-round-full btn-inactive" style="margin-bottom:30px">{{__('home.investor_text30')}}</div>
                        </div>
                    </div>
                    <div class="row" id="contactRow">
                        <div class="col-lg-12 col-md-6">
                            <h3 class="margined2030">{{__('home.investor_text31')}}</h3>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p>{{__('home.investor_text32')}} <span id="landPrice_">- €</span></p>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p>{{__('home.investor_text33')}} <span id="modelAnumber_">-</span></p>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p>{{__('home.investor_text34')}} <span id="modelBnumber_">-</span></p>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p>{{__('home.investor_text35')}} <span id="modelDnumber_">-</span></p>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p>{{__('home.investor_text36')}} <span id="finalBrojSoba_">-</span></p>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p>{{__('home.investor_text37')}} <span id="totalInvestion_">- €</span></p>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p>{{__('home.investor_text38')}} <span id="numberOfYears_"> - </span></p>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p>{{__('home.investor_text39')}} <span id="loanInterest_"> - %</span></p>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p>{{__('home.investor_text40')}} <span id="loanPayment_"> - €</span></p>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p>{{__('home.investor_text41')}} <span id="dailyRentPrice_"> - €</span></p>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p>{{__('home.investor_text42')}} <span id="averageRent_"> - %</span></p>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <p>{{__('home.investor_text43')}} <span id="totalIncome_"> - €</span></p>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <h3 class="margined2030">{{__('home.investor_text44')}}</h3>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label>{{__('home.investor_text45')}}</label>
                                <input name="name_" id="name_" type="text" class="form-control" placeholder="{{__('home.investor_text45')}}">
                                <span class="requiredField">{{__('home.investor_text47')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label>{{__('home.investor_text48')}}</label>
                                <input name="email_" id="email_" type="email" class="form-control" placeholder="{{__('home.investor_text49')}}">
                                <span class="requiredField">{{__('home.investor_text47')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label>{{__('home.investor_text50')}}</label>
                                <input name="phone_" id="phone_" type="text" class="form-control" placeholder="{{__('home.investor_text51')}}">
                                <!-- <span class="requiredFieldNo">{{__('home.investor_text52')}}</span> -->
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group">
                                <label>{{__('home.investor_text53')}}</label>
                                <input name="subject_" id="subject_" type="text" class="form-control" placeholder="{{__('home.investor_text53')}}">
                                <span class="requiredField">{{__('home.investor_text47')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group">
                                <label>{{__('home.investor_text55')}}</label>
                                <textarea name="message_" id="message_" class="form-control" rows="8" placeholder="{{__('home.investor_text55')}}"></textarea>
                                <span class="requiredField">{{__('home.investor_text47')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                {{__('home.contact_text1')}}
                            </div>
                            <div class="form-group">
                                <input id="submitContact_" class="btn btn-main btn-round-full" name="submit_" type="submit" value="{{__('home.investor_text56')}}" disabled="true"></input>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>{{__('home.investor_text57')}}</h2>
                    </div>
                </div>
                <div class="col-lg-8 text-center">
                    <div class="flipper" data-reverse="true" data-datetime="2023-01-01 00:00:00" data-template="ddd|HH|ii|ss" data-labels="{{__('home.investor_text58')}}" id="myFlipper"></div>
                </div>
            </div>
    </section>

    <style>

    @media screen and (max-width: 575px) {
        .row .row {
            margin-right: 0 !important;
            margin-left: 0 !important;
        }
    }

    </style>

    <!-- FOOTER START -->
    @include('footer')
    <!-- FOOTER END -->


@endsection

@section('js')

    <script type="text/javascript">

        $(document).ready(function(){
            //global variables
            let landPrice;
            let modelAnumber;
            let modelAnumberPrice = 25736;
            let modelBnumber;
            let modelBnumberPrice = 34789;
            let modelDnumber;
            let modelDnumberPrice = 20794;
            let finalBrojSoba;
            let totalInvestion;
            let numberOfYears;
            let loanPayment;
            let monthsNumber;
            let monthlyInterest;
            let dailyRentPrice;
            let averageRent;
            let totalIncome;
            let clickedButton;

            //function for room numbers
            $("#modelAnumber, #modelBnumber, #modelDnumber").change(function(){
                if($("#modelAnumber").val()){
                    modelAnumber = $("#modelAnumber").val();
                    $("#modelAnumber_").text(modelAnumber);
                } else{
                    modelAnumber = 0;
                }
                if($("#modelBnumber").val()){
                    modelBnumber = $("#modelBnumber").val();
                    $("#modelBnumber_").text(modelBnumber);
                } else{
                    modelBnumber = 0;
                }
                if($("#modelDnumber").val()){
                    modelDnumber = $("#modelDnumber").val();
                    $("#modelDnumber_").text(modelDnumber);
                } else{
                    modelDnumber = 0;
                }
                finalBrojSoba = parseInt(modelAnumber) + parseInt(modelBnumber)*2 + parseInt(modelDnumber);
                $("#ukupnoSoba").text(finalBrojSoba);
                $("#finalBrojSoba_").text(finalBrojSoba);
                $("#totalRoomsHidden").val(finalBrojSoba);
            });

            //function for prices and total investion
            $("#landPrice, #modelAnumber, #modelBnumber, #modelDnumber").change(function(){
                if($("#landPrice").val()){
                    landPrice = $("#landPrice").val();
                    $("#landPrice_").text(landPrice+".00 €");
                } else{
                    landPrice = 0;
                }
                if($("#modelAnumber").val()){
                    modelAnumber = $("#modelAnumber").val();
                } else{
                    modelAnumber = 0;
                }
                if($("#modelBnumber").val()){
                    modelBnumber = $("#modelBnumber").val();
                } else{
                    modelBnumber = 0;
                }
                if($("#modelDnumber").val()){
                    modelDnumber = $("#modelDnumber").val();
                } else{
                    modelDnumber = 0;
                }
                totalInvestion =
                    parseInt(landPrice) +
                    parseInt(modelAnumber)*parseInt(modelAnumberPrice) +
                    parseInt(modelBnumber)*parseInt(modelBnumberPrice) +
                    parseInt(modelDnumber)*parseInt(modelDnumberPrice);

                $("#ukupnaInvesticija").text(totalInvestion.toFixed(2)+" €");
                $("#totalInvestion_").text(totalInvestion.toFixed(2)+" €");
                $("#totalInvestionHidden").val(totalInvestion.toFixed(2));
            });

            //function for loan calculation
            $("#numberOfYears, #yearlyInterest, #landPrice, #modelAnumber, #modelBnumber, #modelDnumber, #dailyRentPrice, #averageRent").change(function(){
                if(totalInvestion != undefined){
                    if($("#numberOfYears").val()){
                        numberOfYears = $("#numberOfYears").val();
                        $("#numberOfYears_").text(numberOfYears);
                    } else{
                        numberOfYears = 0;
                    }
                    if($("#yearlyInterest").val()){
                        yearlyInterest = $("#yearlyInterest").val();
                        $("#loanInterest_").text(yearlyInterest + "%");
                    } else{
                        yearlyInterest = 0;
                    }
                    //number of months
                    monthsNumber = parseInt(numberOfYears) * 12;
                    //monthly interest
                    monthlyInterest = parseInt(yearlyInterest) / 100 / 12;
                    //getting loan payment
                    loanPayment = (totalInvestion * monthlyInterest * Math.pow(1 + monthlyInterest, monthsNumber)) / (Math.pow(1 + monthlyInterest, monthsNumber) - 1);
                    //writing result to input
                    if($("#numberOfYears").val() && $("#yearlyInterest").val()){
                        $("#totalMinus, #totalMinus_0").val(loanPayment.toFixed(2));
                        $("#loanPayment_").text(parseInt(loanPayment).toFixed(2)+ " €");
                    }
                }
                if(finalBrojSoba != undefined){
                    if($("#dailyRentPrice").val()){
                        dailyRentPrice = $("#dailyRentPrice").val();
                        $("#dailyRentPrice_").text(dailyRentPrice+ " €");
                    } else{
                        dailyRentPrice = 0;
                    }
                    if($("#averageRent").val()){
                        averageRent = $("#averageRent").val();
                        $("#averageRent_").text(averageRent+ "%");
                    } else{
                        averageRent = 0;
                    }

                    //getting total income
                    totalIncome = finalBrojSoba * dailyRentPrice * ((averageRent * 30) / 100);

                    $("#totalPlus, #totalPlus_0").val(totalIncome.toFixed(2));
                    $("#totalIncome_").text(totalIncome.toFixed(2)+ " €");
                }
            });

            var targetDate = new Date();
            targetDate.setDate(targetDate.getDate() + 60);
            var dd = targetDate.getDate();
            var mm = targetDate.getMonth() + 1; // 0 is January, so we must add 1
            var yyyy = targetDate.getFullYear();
            var hours = targetDate.getHours();
            var minutes = targetDate.getMinutes();
            var seconds = targetDate.getSeconds();
            var dateString = yyyy + "-" + mm + "-" + dd + " " + hours + ":" + minutes + ":" + seconds;
            $("#myFlipper").attr("data-datetime", dateString);

            $('#myFlipper').flipper('init');

            $("#myFlipper>div>div:first").css("font-size", "0");
            $("#myFlipper").css("width", "90%");

        });

        /* calc and contact switch */

        $("#calculationButton, #sendCalculationButton, #sendCalculationButton_").click(function(){
            if($("#ukupnaInvesticija").html() == "0.00 €"){
                alert("Molimo popunite Vašu kalkulaciju.");
                $([document.documentElement, document.body]).animate({scrollTop: $("#scrollhere").offset().top}, 1000);
            }else{
                if($(this).is("#calculationButton")){
                    if($(this).hasClass("btn-inactive")){
                        $(".btn-active").removeClass("btn-active").addClass("btn-inactive");
                        $(this).removeClass("btn-inactive").addClass("btn-active");
                    }
                    clickedButton = $(this).attr("id");
                }else{
                    $("#calculationButton").removeClass("btn-active").addClass("btn-inactive");
                    $("#sendCalculationButton, #sendCalculationButton_").removeClass("btn-inactive").addClass("btn-active");
                    clickedButton = $(this).attr("id");
                }
                if(clickedButton == "calculationButton"){
                    $("#calculationRow").css("display", "flex");
                    $([document.documentElement, document.body]).animate({scrollTop: $("#scrollhere").offset().top}, 1000);
                    $("#contactRow").hide();
                }else{
                    $("#contactRow").css("display", "flex");
                    $("#calculationRow").hide();
                    $([document.documentElement, document.body]).animate({scrollTop: $("#scrollhere").offset().top}, 1000);
                }
            }
        });

        //function for loan calculation
        $("#name_, #email_, #phone_, #subject_, #message_").change(function(){
                if(($("#name_").val()) && ($("#email_").val()) && ($("#subject_").val()) && ($("#message_").val())){
                    $("#submitContact_").attr("disabled", false);
                } else {
                    $("#submitContact_").attr("disabled", true);
                }
            });

    </script>

@endsection
