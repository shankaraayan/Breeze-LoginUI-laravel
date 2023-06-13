<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title')</title>

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/public/css/carousel.css" rel="stylesheet">
    @yield('style')
    <style>
        .bg-light {
            background: #f3770f !important;
            color: #fff !important;
        }

        .navbar-light .navbar-brand,
        .navbar-light .navbar-text,
        .navbar-light .navbar-nav .nav-link {
            color: #fff !important;
        }

        li>a {
            color: #fff !important;
            text-decoration: auto;
        }

        /* footer */
        @import url('https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic');

        /* body {font-family: 'Poppins', Poppins;} */
        .bg {
            background: #0d245d;
            color: #fff;
        }

        .main-heading {
            letter-spacing: 2px;
        }

        .heading {
            color: orange;
            font-size: 22px;
        }

        .sub-heading {
            color: rgb(140 183 255);
            ;
            font-size: 16px;
        }

        .list-group-item {
            background: none;
            color: #fff;
            border: none;
            padding: 0px;
            letter-spacing: 1px;
            font-size: 14px
        }

        .footer-text {
            font-size: 12px
        }

        .footer-content {
            font-size: 14px
        }

        .padding-1 {
            padding-right: 16px
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Rashtriya Hindu Ekta Sanghtan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gallery</a>
                    </li>
                </ul>
                @if (Route::has('login'))
                <span class="navbar-text">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        @auth
                            <li class="nav-item" style="padding: 0px 10px;">
                                <a style="color:white" aria-current="page" href="/user/dashboard">
                                    {{ substr(Auth::user()->name, 0, strpos(Auth::user()->name, ' ')) }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <span class="text round-btn"><a href="/user/logout" style="color:white"> Logout </a></span>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a style="color:white" aria-current="page" href="{{ route('login') }}">Join us</a>
                            </li>
                        @endguest

                    </ul>
                </span>
                @endif
            </div>
        </div>
    </nav>
    @yield('body')

    <!-- fotter contetn -->
    <div class="bg p-5">
        <div class="container-fluid">
            <div class="row justify-content-center g-2">
                <h2 class="main-heading">Site Navigator</h2>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <h4 class="heading">Hindu Rashtrya Sangthan</h4>
                    <h5 class="sub-heading">Rashtrya Ekta</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#">Hindu Rashtrya History</a></li>
                        <li class="list-group-item"><a href="#">Sangthan History</a></li>
                        <li class="list-group-item"><a href="#">Hindu Yuva Morcha</a></li>
                        <li class="list-group-item"><a href="#">Other organization's Support</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <h4 class="heading">Importent Links</h4>
                    <h5 class="sub-heading">Navigation</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#">Home</a></li>
                        <li class="list-group-item"><a href="#">About</a></li>
                        <li class="list-group-item"><a href="#">About Leaders</a></li>
                        <li class="list-group-item"><a href="#">Donation</a></li>
                        <li class="list-group-item"><a href="#">Contact us</a></li>
                        <li class="list-group-item"><a href="#">Membership</a></li>
                        <li class="list-group-item"><a href="#">Hindu Ekta Program</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <h4 class="heading">Members / Volunteers</h4>
                    <h5 class="sub-heading">Join us to help Hindu Ekta</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#">Login</a></li>
                        <li class="list-group-item"><a href="#">Register</a></li>
                        <li class="list-group-item"><a href="#">Apply for Membership</a></li>
                        <li class="list-group-item"><a href="#">Join for volunteering</a></li>
                        <li class="list-group-item"><a href="#">Take charge in your state</a></li>
                        <li class="list-group-item"><a href="#">Apply for party post</a></li>
                        <li class="list-group-item"><a href="#">Donation</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <h4 class="heading">Hindu Rashtra</h4>
                    <h5 class="sub-heading">State wise</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#">Bihar</a></li>
                        <li class="list-group-item"><a href="#">Rajasthan</a></li>
                        <li class="list-group-item"><a href="#">Uttar Pradesh</a></li>
                        <li class="list-group-item"><a href="#">Delhi</a></li>
                        <li class="list-group-item"><a href="#">Jharkhand</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="footer-content p-5">"It is a matter of great pride and prestige that due to divine
                        coincidence. I have been a Sangh Swayamsevak. This is only thing worth of pride".</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <span class="footer-text">Copyright © 2023.</span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <ul class="nav">
                        <li class="nav-item footer-text padding-1"><a href="#">Privacy & Policy</a></li>
                        <li class="nav-item footer-text padding-1"><a href="#">Tearms & Condition</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>


@yield('scripts')

</html>
