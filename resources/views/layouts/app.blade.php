<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="robots" content="all,follow">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- gLightbox gallery-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/lightbox2/css/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/nouislider/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/bootstrap-select/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/owl.carousel2/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/owl.carousel2/assets/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.default.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">

</head>
<body>
<div id="app" class="page-holder" {{request()->routeIs('frontend.detail') ? 'bg-light' :null}}>
    <!-- navbar-->
    <header class="header bg-white">
        <div class="container px-lg-3">
            <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand"
                                                                              href="{{route('frontend.index')}}">
                    <span class="fw-bold text-uppercase text-dark">{{config('app.name')}}</span></a>
                <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link active" href="{{route('frontend.index')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link" href="{{route('frontend.shop')}}">Shop</a>
                        </li>
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link" href="{{route('frontend.detail')}}">Product detail</a>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#"
                                                         data-bs-toggle="dropdown" aria-haspopup="true"
                                                         aria-expanded="false">Pages</a>
                            <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown">
                                <a class="dropdown-item border-0 transition-link" href="{{route('frontend.index')}}">Homepage</a>
                                <a class="dropdown-item border-0 transition-link" href="{{route('frontend.shop')}}">Category</a>
                                <a class="dropdown-item border-0 transition-link" href="{{route('frontend.detail')}}">Product
                                    detail</a>
                                <a class="dropdown-item border-0 transition-link" href="{{route('frontend.cart')}}">Shopping
                                    cart</a>
                                <a class="dropdown-item border-0 transition-link" href="{{route('frontend.checkout')}}">Checkout</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="{{route('frontend.cart')}}"> <i
                                    class="fas fa-dolly-flatbed me-1 text-gray"></i>Cart<small
                                    class="text-gray fw-normal">(2)</small></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"> <i class="far fa-heart me-1"></i><small
                                    class="text-gray fw-normal"> (0)</small></a></li>

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <i class="fas fa-user-alt mr-1 text-gray"></i>Login
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                                    <i class="fas fa-user-alt mr-1 text-gray"></i>Register
                                </a>
                            </li>
                        @else


                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" id="authDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ auth()->user()->full_name  }}
                                </a>
                                <div class="dropdown-menu mt-3" aria-labelledby="authDropdown">
                                    <a href="" class="dropdown-item border-0">Dashboard</a>
                                    <a href="" class="dropdown-item border-0" >

                                        Logout</a>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main class="container">
        @yield('content')
    </main>
    <footer class="bg-dark text-white">
        <div class="container py-4">
            <div class="row py-5">
                <div class="col-md-4 mb-3 mb-md-0">
                    <h6 class="text-uppercase mb-3">Customer services</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a class="footer-link" href="#!">Help &amp; Contact Us</a></li>
                        <li><a class="footer-link" href="#!">Returns &amp; Refunds</a></li>
                        <li><a class="footer-link" href="#!">Online Stores</a></li>
                        <li><a class="footer-link" href="#!">Terms &amp; Conditions</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <h6 class="text-uppercase mb-3">Company</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a class="footer-link" href="#!">What We Do</a></li>
                        <li><a class="footer-link" href="#!">Available Services</a></li>
                        <li><a class="footer-link" href="#!">Latest Posts</a></li>
                        <li><a class="footer-link" href="#!">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6 class="text-uppercase mb-3">Social media</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a class="footer-link" href="#!">Twitter</a></li>
                        <li><a class="footer-link" href="#!">Instagram</a></li>
                        <li><a class="footer-link" href="#!">Tumblr</a></li>
                        <li><a class="footer-link" href="#!">Pinterest</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-top pt-4" style="border-color: #1d1d1d !important">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="small text-muted mb-0">&copy; 2021 All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <p class="small text-muted mb-0">Template designed by <a class="text-white reset-anchor"
                                                                                 href="https://bootstrapious.com/p/boutique-bootstrap-e-commerce-template">Bootstrapious</a>
                        </p>
                        <!-- If you want to remove the backlink, please purchase the Attribution-Free License. See details in readme.txt or license.txt. Thanks!-->
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Scripts -->
<!--  Modal -->
<div class="modal fade" id="productView" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content overflow-hidden border-0">
            <button class="btn-close p-4 position-absolute top-0 end-0 z-index-20 shadow-0" type="button"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-0">
                <div class="row align-items-stretch">
                    <div class="col-lg-6 p-lg-0"><a class="glightbox product-view d-block h-100 bg-cover bg-center"
                                                    style="background: url({{asset('frontend/img/product-5.jpg')}})"
                                                    href="img/product-5.jpg" data-gallery="gallery1"
                                                    data-glightbox="Red digital smartwatch"></a><a
                            class="glightbox d-none" href="img/product-5-alt-1.jpg" data-gallery="gallery1"
                            data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none"
                                                                           href="img/product-5-alt-2.jpg"
                                                                           data-gallery="gallery1"
                                                                           data-glightbox="Red digital smartwatch"></a>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-4 my-md-4">
                            <ul class="list-inline mb-2">
                                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
                            </ul>
                            <h2 class="h4">Red digital smartwatch</h2>
                            <p class="text-muted">$250</p>
                            <p class="text-sm mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut
                                ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis
                                parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</p>
                            <div class="row align-items-stretch mb-4 gx-0">
                                <div class="col-sm-7">
                                    <div class="border d-flex align-items-center justify-content-between py-1 px-3">
                                        <span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                                        <div class="quantity">
                                            <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                                            <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                                            <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5"><a
                                        class="btn btn-dark btn-sm w-100 h-100 d-flex align-items-center justify-content-center px-0"
                                        href="cart.blade.php">Add to cart</a></div>
                            </div>
                            <a class="btn btn-link text-dark text-decoration-none p-0" href="#!"><i
                                    class="far fa-heart me-2"></i>Add to wish list</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset(asset('js/app.js'))}}"></script>

<script src="{{asset(asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js'))}}"></script>
<script src="{{asset(asset('frontend/vendor/glightbox/js/glightbox.min.js'))}}"></script>
<script src="{{asset(asset('frontend/vendor/nouislider/nouislider.min.js'))}}"></script>
<script src="{{asset(asset('frontend/vendor/swiper/swiper-bundle.min.js'))}}"></script>
<script src="{{asset(asset('frontend/vendor/choices.js/public/assets/scripts/choices.min.js'))}}"></script>
<script src="{{asset(asset('frontend/js/front.js'))}}"></script>
<script>
    // ------------------------------------------------------- //
    //   Inject SVG Sprite -
    //   see more here
    //   https://css-tricks.com/ajaxing-svg-sprite/
    // ------------------------------------------------------ //
    function injectSvgSprite(path) {

        var ajax = new XMLHttpRequest();
        ajax.open("GET", path, true);
        ajax.send();
        ajax.onload = function (e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
        }
    }

    // this is set to BootstrapTemple website as you cannot
    // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
    // while using file:// protocol
    // pls don't forget to change to your domain :)
    injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');

</script>
</body>
</html>
