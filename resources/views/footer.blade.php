    <footer class="footer section gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mr-auto col-sm-6">
                    <div class="widget mb-5 mb-lg-0">
                        <div class="logo mb-4">
                            <img src="{{url('/images/logo.png')}}" alt="" class="img-fluid">
                        </div>
                        <div class="widget mb-5 mb-lg-0">
                            {{__('home.footer_text1')}} <br/>
                            {{__('home.footer_text2')}} <br/>
                            {{__('home.footer_text3')}}
                        </div>

                        <ul class="list-inline footer-socials mt-4">
                            <li class="list-inline-item"><a href="#"><i class="icofont-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="icofont-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="icofont-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="widget mb-5 mb-lg-0">
                        {{__('home.footer_text4')}} <br/>
                        {{__('home.footer_text5')}} <br/>
                        {{__('home.footer_text6')}}
                        <div class="divider mb-4 mb-4-exception"></div>
                        {{__('home.footer_text7')}}  <br/>
                        {{__('home.footer_text8')}} <br/>
                        {{__('home.footer_text9')}}
                        <div class="divider mb-4 mb-4-exception"></div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="widget widget-contact mb-5 mb-lg-0">
                        <h4 class="text-capitalize mb-3">{{__('home.footer_text10')}}</h4>
                        <!-- <div class="divider mb-4"></div> -->

                        <div class="footer-contact-block mb-6">
                            <div class="icon d-flex align-items-center">
                                <i class="icofont-email mr-3"></i>
                                <span class="h6 mb-0">{{__('home.footer_text11')}}</span>
                            </div>
                            <h4 class="mt-2"><a href="mailto:info@modulmobilehomes.com">{{__('home.email')}}</a></h4>
                        </div>

                        <div class="footer-contact-block">
                            <div class="icon d-flex align-items-center">
                                <i class="icofont-support mr-3"></i>
                                <span class="h6 mb-0">{{__('home.text7')}} : {{__('home.text10')}}</span>
                            </div>
                            <h4 class="mt-2"><a href="tel:+38765959595">{{__('home.tel_br')}}</a></h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-btm py-4 mt-5">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-7">
                        <div class="copyright">
                            {{__('home.footer_text14')}}
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="subscribe-form text-lg-right mt-5 mt-lg-0">
                            <form method="post" action="{{url('/user_email')}}" class="subscribe">
                                @csrf
                                <input type="text" name="user_email" class="form-control" placeholder="{{__('home.footer_text13')}}">
                                <button class="btn btn-main-2 btn-round-full">{{__('home.footer_text12')}}</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <a class="backtop js-scroll-trigger" href="#top">
                            <i class="icofont-long-arrow-up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
