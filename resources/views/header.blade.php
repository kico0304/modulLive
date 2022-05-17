    <header>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="header-top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <ul class="top-bar-info list-inline-item pl-0 mb-0">
                            <li class="list-inline-item"><a href="mailto:support@gmail.com"><i class="icofont-support-faq mr-2"></i>{{__('home.email')}}</a></li>
                            <li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>{{__('home.adresa')}}</li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-lg-right top-right-bar mt-2 mt-lg-0">
                            @foreach($app_lang as $lng)
                            <a onclick=getLanguageLink("{{$lng->lang}}")>
                                <span>
                                    <img class="langFlag" src="{{url('/images/flags/'.$lng->lang.'.png')}}">
                                </span>
                            </a>
                            @endforeach
                            <script>

                                function getLanguageLink(lang) {
                                    $hostVar = window.location.origin;
                                    $hostVar = $hostVar.split("//");
                                    $hostVar = $hostVar[1].split("/");
                                    //console.log($hostVar[0]);
                                    $hostvar2 = $hostVar[0].split(".")
                                    //console.log($hostvar2[0].length);
                                    if($hostvar2[0].length == 2){
                                        window.location.replace("http://"+lang+"."+$hostvar2[1]+"."+$hostvar2[2]);
                                        console.log($hostvar2[0]);
                                        console.log($hostvar2[1]);
                                        console.log($hostvar2[2]);
                                        console.log($hostvar2[3]);
                                        console.log($hostvar2[4]);
                                    } else {
                                        window.location.replace("http://"+lang+"."+$hostvar2[0]+"."+$hostvar2[1]);
                                        console.log($hostvar2[0]);
                                        console.log($hostvar2[1]);
                                        console.log($hostvar2[2]);
                                        console.log($hostvar2[3]);
                                        console.log($hostvar2[4]);
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navigation" id="navbar">
            <div class="container">

                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{url('/images/logo.png')}}" alt="" class="img-fluid">
                </a>

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icofont-navigation-menu"></span>
                </button>

            <div class="collapse navbar-collapse" id="navbarmain">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">{{__('home.pocetna')}}</a>
                    </li>

                    <li class="nav-item">  <!-- dropdown -->
                        <a class="nav-link" href="{{ route('products') }}">{{__('home.proizvodi')}} <!--<i class="icofont-thin-down"></i> --></a>
                        <!-- <ul class="dropdown-menu" aria-labelledby="dropdown02">
                            <li><a class="dropdown-item" href="#">MMH21.S01 – kuća za 2 osobe</a></li>
                            <li><a class="dropdown-item" href="#">MMH21.M01 – kuća za 4 osobe</a></li>
                            <li><a class="dropdown-item" href="#">MMH21.M02- kuća za 4 osobe</a></li>
                            <li><a class="dropdown-item" href="#">MMH21.L01- kuća za 6 osoba</a></li>
                            <li><a class="dropdown-item" href="#">MMH21.L.02- kuća za 6 osoba</a></li>
                            <li><a class="dropdown-item" href="#">MMH21.XL01- kuća za 8 osoba</a></li>
                            <li><a class="dropdown-item" href="#">NAPRAVI SVOJU KOMBINACIJU</a></li>
                        </ul> -->
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('investors') }}">{{__('home.investitori')}}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('technology') }}">{{__('home.teh_karakteristike')}}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about-us') }}">{{__('home.onama')}}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('actualities') }}">{{__('home.aktuelnosti')}}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">{{__('home.kontakt')}}</a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
    </header>
