<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="Themesdesign" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">

        <!-- Material Icon -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/materialdesignicons.min.css') }}" />

        <!-- owl carousel -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.default.min.css') }}" />

        <!-- Custom  sCss -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />

        <!-- Toastr -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        @livewireStyles
    </head>

    <body>

        <!--Navbar Start-->
        <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark">
            <div class="container">
                <!-- LOGO -->
                <a class="logo text-uppercase" href="index-1.html">
                    <img src="images/logo-dark.png" alt="" class="logo-dark" height="20" />
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto navbar-center" id="mySidenav">
                        <li class="nav-item active">
                            <a href="/" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="/search" class="nav-link">Find</a>
                        </li>
                        <li class="nav-item">
                            <a href="/post" class="nav-link">Post</a>
                        </li>
                        <li class="nav-item">
                            <a href="#features" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#services" class="nav-link">FAQs</a>
                        </li>
                    </ul>
                    @guest
                    @if(Route::has('login') || Route::has('register'))
                    <a href="{{ route('login') }}" class="btn btn-success btn-rounded navbar-btn">Login/ Register</a>
                    @endif	
                    @else
                    <a href="#">{{ Auth::user()->name }}</a>
                    @endguest

                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        @yield('content')

         <!-- Footer start -->
         <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div>
                            <h5 class="mb-4 footer-list-title">About the Invoza</h5>
                            <p>The Invoza is a sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque rem eaque </p>
                        </div>
                    </div>
                    <div class="col-lg-2 offset-lg-1 col-sm-6">
                        <div>
                            <h5 class="mb-4 footer-list-title">Company</h5>
                            <ul class="list-unstyled footer-list-menu">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Media & Press</a></li>
                                <li><a href="#">Career</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                              </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div>
                            <h5 class="mb-4 footer-list-title">More Info</h5>
                            <ul class="list-unstyled footer-list-menu">
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">For Marketing</a></li>
                                <li><a href="#">For CEOs </a></li>
                                <li><a href="#">For Agencies</a></li>
                                <li><a href="#">Our Apps</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div>
                            <h5 class="mb-4 footer-list-title">Contact</h5>

                            <div>
                                <div class="media">
                                    <i data-feather="map-pin" class="icon-dual-light icons-sm mt-1 mr-2"></i> 
                                    <div class="media-body">
                                        <p>476 University Drive Ridge, IL 61257</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <i data-feather="mail" class="icon-dual-light icons-sm mt-1 mr-2"></i> 
                                    <div class="media-body">
                                        <p>exampleabc@armyspy.com</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <i data-feather="phone" class="icon-dual-light icons-sm mt-1 mr-2"></i> 
                                    <div class="media-body">
                                        <p>0123-456-789</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
            
        </footer>
        <!-- Footer end -->

        <!-- Footer alt start -->
        <section class="bg-primary py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="float-sm-left">
                            <a href="#">
                                <img src="images/logo-light.png" alt="" height="20">
                            </a>
                        </div>
                        <div class="float-sm-right mt-4 mt-sm-0">
                            <p class="copyright-desc text-white mb-0">2019 © Invoza. Created by Themesdesign</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- Footer alt start -->

        <!-- Javascript -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('js/scrollspy.min.js') }}"></script>
        <script src="{{ asset('js/feather.min.js') }}"></script>

        <!-- owl carousel -->
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>

        <!-- app js -->
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- other libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
        //     window.addEventListener('signindialog', event => {
        //  $('#sign-in-dialog').modal('show');
		//     // alert("Please login first");
        //  });

		   window.addEventListener('toastr:subscribe', event => {
			toastr.error(event.detail.message);
           });

           window.addEventListener('toastr:notifyMe', event => {
			toastr.success(event.detail.message);
             $('#notifyMe').modal('hide');
           });

        //    window.addEventListener('deletedDogSuccess', event => {
		// 	toastr.success(event.detail.message);
        //    });

		   window.addEventListener('swal:subscribe', event => {
			swal({
			title: event.detail.title,
			text: event.detail.text,
			icon: event.detail.type,
           });
		});
        </script>

        @livewireScripts
    </body>

</html>