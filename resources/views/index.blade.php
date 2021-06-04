@include('layout.header')
<body class="bg-light-4">
    <!-- page wrapper start -->
    <div class="page-wrapper">
        @include('layout.navbar')
        <!--hero section start-->
        <section class="banner pos-r p-0 mt-5">
            <div class="container">
                <div class="row">
                    {{-- <div class="col-lg-3">
                        <div class="categories_wrap">
                            <div class="head"><i class="las la-bars"></i> Categories</div>
                            <div id="navCatContent" class="nav_cat navbar">
                                <ul>
                                    <li class="dropdown dropdown-mega-menu"> <a
                                            class="dropdown-item nav-link dropdown-toggler" href="#"
                                            data-toggle="dropdown"><i class="las la-laptop"></i>
                                            <span>Computer</span></a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-7">
                                                    <ul class="d-lg-flex mt-0">
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li> <a href="#">Laptops</a></li>
                                                                <li> <a href="#">Hard Drives</a></li>
                                                                <li> <a href="#">Motherboards</a></li>
                                                                <li> <a href="#">Graphic Cards </a></li>
                                                                <li> <a href="#">Processors</a></li>
                                                                <li> <a href="#">Keyboards </a></li>
                                                                <li> <a href="#">WebCams</a></li>
                                                                <li> <a href="#">Speakers</a></li>
                                                                <li> <a href="#">Bags &amp; Cases</a></li>
                                                                <li> <a href="#">Connectors</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li> <a href="shop-grid-left-sidebar.html">Laptops</a>
                                                                </li>
                                                                <li> <a href="#">Hard Drives</a></li>
                                                                <li> <a href="#">Motherboards</a></li>
                                                                <li> <a href="#">Graphic Cards </a></li>
                                                                <li> <a href="#">Processors</a></li>
                                                                <li> <a href="#">Keyboards </a></li>
                                                                <li> <a href="#">WebCams</a></li>
                                                                <li> <a href="#">Speakers</a></li>
                                                                <li> <a href="#">Bags &amp; Cases</a></li>
                                                                <li> <a href="#">Connectors</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-col col-lg-5">
                                                    <div class="header-banner2"> <img
                                                            src="{{url('public')}}/images/electronic/product-ad/04.jpg"
                                                            alt="menu_banner">
                                                        <div class="banne_info">
                                                            <h6>20% Off</h6>
                                                            <h4>Laptops</h4>
                                                            <a href="#">Shop now</a>
                                                        </div>
                                                    </div>
                                                    <div class="header-banner2"> <img
                                                            src="{{url('public')}}/images/electronic/product-ad/05.jpg"
                                                            alt="menu_banner">
                                                        <div class="banne_info">
                                                            <h6>15% Off</h6>
                                                            <h4>Cameras</h4>
                                                            <a href="#">Shop now</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="dropdown dropdown-mega-menu"> <a
                                            class="dropdown-item nav-link dropdown-toggler" href="#"
                                            data-toggle="dropdown"><i class="las la-tablet-alt"></i> <span>Mobile &amp;
                                                Tablet</span></a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-7">
                                                    <ul class="d-lg-flex">
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li> <a href="#">Accessories</a></li>
                                                                <li> <a href="#">Binoculars</a></li>
                                                                <li> <a href="#">Telescopes</a> </li>
                                                                <li> <a href="#">Camcorders</a></li>
                                                                <li> <a href="#">Film Cameras</a></li>
                                                                <li> <a href="#">Flashes</a></li>
                                                                <li> <a href="#">Webcam</a></li>
                                                                <li> <a href="#">Door Camera</a></li>
                                                                <li> <a href="#">CCTV Camera</a></li>
                                                                <li> <a href="#">Telescopes</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li> <a href="#">Accessories</a></li>
                                                                <li> <a href="#">Binoculars</a></li>
                                                                <li> <a href="#">Telescopes</a> </li>
                                                                <li> <a href="#">Camcorders</a></li>
                                                                <li> <a href="#">Film Cameras</a></li>
                                                                <li> <a href="#">Flashes</a></li>
                                                                <li> <a href="#">Webcam</a></li>
                                                                <li> <a href="#">Door Camera</a></li>
                                                                <li> <a href="#">CCTV Camera</a></li>
                                                                <li> <a href="#">Telescopes</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-col col-lg-5">
                                                    <div class="header-banner2"> <a href="#"><img
                                                                src="{{url('public')}}/images/electronic/product-ad/06.jpg"
                                                                alt="menu_banner"></a> </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="dropdown dropdown-mega-menu"> <a
                                            class="dropdown-item nav-link dropdown-toggler" href="#"
                                            data-toggle="dropdown"><i class="las la-camera"></i> <span>Camera</span></a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-7">
                                                    <ul class="d-lg-flex">
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li> <a href="#">Refrigerators</a></li>
                                                                <li> <a href="#">Dishwashers</a></li>
                                                                <li> <a href="#">Microwaves</a></li>
                                                                <li> <a href="#">Range Hoods</a></li>
                                                                <li> <a href="#">Cooktops</a></li>
                                                                <li> <a href="#">Tosters</a></li>
                                                                <li> <a href="#">Mixer &amp; Grinder</a></li>
                                                                <li> <a href="#">Washing Machine</a></li>
                                                                <li> <a href="#">Food Processer</a></li>
                                                                <li> <a href="#">Gas Stove</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>

                                                                <li> <a href="#">Refrigerators</a></li>
                                                                <li> <a href="#">Dishwashers</a></li>
                                                                <li> <a href="#">Microwaves</a></li>
                                                                <li> <a href="#">Range Hoods</a></li>
                                                                <li> <a href="#">Cooktops</a></li>
                                                                <li> <a href="#">Tosters</a></li>
                                                                <li> <a href="#">Mixer &amp; Grinder</a></li>
                                                                <li> <a href="#">Washing Machine</a></li>
                                                                <li> <a href="#">Food Processer</a></li>
                                                                <li> <a href="#">Gas Stove</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-col col-lg-5">
                                                    <div class="header-banner2"> <a href="#"><img
                                                                src="{{url('public')}}/images/electronic/product-ad/06.jpg"
                                                                alt="menu_banner"></a> </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="dropdown dropdown-mega-menu"> <a
                                            class="dropdown-item nav-link dropdown-toggler" href="#"
                                            data-toggle="dropdown"><i class="las la-mouse"></i>
                                            <span>Accessories</span></a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-4">
                                                    <ul>
                                                        <li> <a href="#">Binoculars</a></li>
                                                        <li> <a href="#">Telescopes</a> </li>
                                                        <li> <a href="#">Camcorders</a></li>
                                                        <li> <a href="#">Film Cameras</a></li>
                                                        <li> <a href="#">Flashes</a></li>
                                                        <li> <a href="#">Webcam</a></li>
                                                        <li> <a href="#">Door Camera</a></li>
                                                        <li> <a href="#">CCTV Camera</a></li>
                                                        <li> <a href="#">Telescopes</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-col col-lg-4">
                                                    <ul>

                                                        <li> <a href="#">Dishwashers</a></li>
                                                        <li> <a href="#">Microwaves</a></li>
                                                        <li> <a href="#">Range Hoods</a></li>
                                                        <li> <a href="#">Cooktops</a></li>
                                                        <li> <a href="#">Tosters</a></li>
                                                        <li> <a href="#">Mixer &amp; Grinder</a></li>
                                                        <li> <a href="#">Washing Machine</a></li>
                                                        <li> <a href="#">Food Processer</a></li>
                                                        <li> <a href="#">Gas Stove</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-col col-lg-4">
                                                    <ul>
                                                        <li> <a href="#">Samsung</a></li>
                                                        <li> <a href="#">Lenovo</a></li>
                                                        <li> <a href="#">Motorola</a></li>
                                                        <li> <a href="#">Nokia</a></li>
                                                        <li> <a href="#">Micromax</a></li>
                                                        <li> <a href="#">Lenova</a></li>
                                                        <li> <a href="#">Realme</a></li>
                                                        <li> <a href="#">Notebook</a></li>
                                                        <li> <a href="#">Tablet</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a class="dropdown-item nav-link nav_item" href="#"><i
                                                class="las la-headphones"></i> <span>Headphones</span></a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="#"><i
                                                class="las la-gamepad"></i> <span>Gaming</span></a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="#"><i
                                                class="las la-stopwatch"></i> <span>Watches</span></a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="#"><i
                                                class="las la-microphone"></i> <span>Home Audio &amp; Theater</span></a>
                                    </li>
                                    <li><a class="dropdown-item nav-link nav_item" href="#"><i class="las la-print"></i>
                                            <span>Printer</span></a></li>

                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-12">
                        <div class="banner-slider banner-3 owl-carousel no-pb h-100" data-dots="true" data-margin="5">
                            <div class="item" data-bg-img="{{url('public')}}/images/electronic/bg/newsletter.jpg">
                                <div class="container h-100">
                                    <div class="row h-100 align-items-center">
                                        <div class="col py-8 pl-0">
                                            <div class="animated3"> <span
                                                    class="dark-yellow d-inline-block text-white mb-0">Sale up
                                                    to!</span> <br>
                                                <h5 class="dark-red d-inline-block text-white font-w-6">30% Discount on
                                                </h5>
                                            </div>
                                            <h1 class="mt-4 animated3"><span>UA/32J</span><br>
                                                Television</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item" data-bg-img="{{url('public')}}/images/electronic/bg/newsletter.jpg">
                                <div class="container h-100">
                                    <div class="row h-100 align-items-center">
                                        <div class="col py-8 pl-0">
                                            <div class="animated3"> <span
                                                    class="dark-yellow d-inline-block text-white mb-0">Mega Sale!</span>
                                                <br>
                                                <h5 class="dark-red d-inline-block text-white font-w-6">60% Discount on
                                                </h5>
                                            </div>
                                            <h1 class="mt-4 animated3"><span>UA/32J</span><br>
                                                Exclusive</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--hero section end-->
        <!--body content start-->
        <div class="page-content">
            <!--product ad start-->
            <section class="banner-row pt-5 pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-4 col-md-6">
                            <div class="position-relative rounded overflow-hidden">
                                <!-- Background -->
                                <img class="img-fluid hover-zoom" src="{{url('public')}}/images/electronic/product-ad/01.jpg"
                                    alt="">
                                <!-- Body -->
                                <div class="position-absolute top-50 pl-5">
                                    <h6 class="text-white">Digital World</h6>
                                    <!-- Heading -->
                                    <h3 class="text-white font-w-7">Exchange <br>
                                        Deals</h3>
                                    <!-- Link --> <a class="more-link text-white" href="#">Shop Now </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6 mt-5 mt-md-0">
                            <div class="position-relative rounded overflow-hidden">
                                <!-- Background -->
                                <img class="img-fluid hover-zoom" src="{{url('public')}}/images/electronic/product-ad/02.jpg"
                                    alt="">
                                <!-- Body -->
                                <div class="position-absolute top-50 pl-5">
                                    <h6 class="text-white">Todays Deals</h6>
                                    <!-- Heading -->
                                    <h3 class="font-w-7 text-white">Appliances <br>
                                        Special</h3>
                                    <!-- Link --> <a class="more-link text-white" href="#">Shop Now </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-12 mt-5 mt-lg-0 d-md-none d-lg-block">
                            <div class="position-relative rounded overflow-hidden">
                                <!-- Background -->
                                <img class="img-fluid hover-zoom" src="{{url('public')}}/images/electronic/product-ad/03.jpg"
                                    alt="">
                                <!-- Body -->
                                <div class="position-absolute top-50 pl-5">
                                    <h6 class="text-dark">Hot Deals</h6>
                                    <!-- Heading -->
                                    <h3 class="font-w-7">Bluetooth<br>
                                        Speaker</h3>
                                    <!-- Link --> <a class="more-link text-dark" href="#">Shop Now </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--product ad end-->
            <!--product start-->
            <section class="pb-0 pt-5">
                <div class="container">
                    <div class="product-block product-block-div">
                        <div class="row justify-content-left text-left row_title">
                            <h2 class="mb-0 font-w-5 bg-dark-blue">Best Seller</h2>
                        </div>
                        <div class="row">
                            <div class="owl-carousel no-pb owl-2" data-dots="false" data-nav="true" data-items="3" data-md-items="2" data-sm-items="1">
                                @forelse ($BestSeller as $BSProduct)
                                    <div class="item">
                                        <div class="card product-card card--default">
                                            @if($BSProduct->HasDiscount())
                                                @if($BSProduct->Discount()->type == 'percentage')
                                                    <div class="sale-label">-{{$BSProduct->Discount()->amount}}%</div>
                                                @else
                                                    <div class="sale-label">-{{$BSProduct->Discount()->amount}}€</div>
                                                @endif
                                            @endif
                                            <a class="card-img-hover d-block" href="javascript:;">
                                                <img class="card-img-top" src="{{$BSProduct->ImagePath}}" alt="{{$BSProduct->LocalTitle}}">
                                            </a>
                                            <div class="card-icons">
                                                @auth
                                                    <div class="card-icons__item">
                                                        <a href="javascript:;" product-id="{{$BSProduct->id}}" class="like_item @if($BSProduct->LikedByUser()) bg-primary text-white @endif" data-toggle="tooltip" data-placement="left" title="Add to Wishlist" data-original-title="Add to wishlist">
                                                            <i class="lar la-heart"></i>
                                                        </a>
                                                    </div>
                                                @endauth
                                            </div>
                                            <div class="card-info">
                                                <div class="card-body">
                                                    <div class="product-title font-w-4"><a class="link-title" href="{{route('product.single' , [$BSProduct->slug , $BSProduct->id])}}">{{$BSProduct->LocalTitle}}</a>
                                                    </div>
                                                    <div class="mt-1">
                                                        @if($BSProduct->HasDiscount())
                                                            <span class="product-price text-dark">
                                                                <del class="text-danger">{{$BSProduct->price}}€</del>
                                                                {{$BSProduct->FinalPrice}}€
                                                            </span>
                                                        @else
                                                            <span class="product-price text-dark">
                                                                {{$BSProduct->price}} €
                                                            </span>
                                                        @endif
                                                        <div class="star-rating">
                                                            @php 
                                                                $i = 0;
                                                            @endphp
                                                            @for($i = 1; $i <= $BSProduct->Reviews->avg('rate'); $i++)
                                                            <i class="las la-star"></i>
                                                            @endfor
                                                            @for($i = 1; $i <= (5-$BSProduct->Reviews->avg('rate')); $i++)
                                                            <i class="las la-star not-active"></i>
                                                            @endfor
                                                            <span class="stars-count">({{$BSProduct->Reviews->count()}})</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer bg-transparent border-0">
                                                    <div class="product-link d-flex align-items-center justify-content-center">
                                                        <a href="#" class="btn-cart btn btn-yellow-dark mx-3">
                                                            <i class="las la-eye mr-1"></i> Quick View
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--product end-->
     
            <!--blog start-->
            <section class="pb-0 pt-5 mb-5">
                <div class="container">
                    <div class="product-block product-block-div">
                        <div class="row justify-content-left text-left row_title">
                            <h2 class="mb-0 font-w-6 bg-redish">Latest From Blog</h2>
                        </div>
                        <!-- / .row -->
                        <div class="row m-0">
                            @forelse($LatestArticles as $Post)
                                <div class="col-12 col-lg-4 mt-5">
                                    <!-- Blog Card -->
                                    <div class="card border-0 bg-transparent">
                                        <div class="position-relative overflow-hidden">
                                            <div class="position-absolute z-index-1 bottom-0 bg-white text-primary shadow-primary text-center py-1 px-2 rounded ml-3 mb-3"> {{$Post->created_at->format('d M')}}</div>
                                            <img class="card-img-top hover-zoom" src="{{$Post->ImagePath}}" alt="{{$Post->title}}">
                                        </div>
                                        <div class="card-body px-0 pb-0">
                                            <h2 class="h5 font-w-5 mt-2 mb-0">
                                                <a class="link-title" href="{{route('blog.single' , [$Post->slug,$Post->id])}}">{{$Post->title}}</a>
                                            </h2>
                                        </div>
                                    </div>
                                    <!-- End Blog Card -->
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </section>
            <!--blog end-->
            <!--testimonails start-->
            <section class="bg-pink-light testimonails custom-pb-0">
                <div class="container text-center">
                    <div class="row justify-content-center">
                        <div class="col-12 pl-10 pr-10">
                            <div class="owl-carousel owl-center owl-2" data-center="true" data-dots="false"
                                data-nav="true" data-items="1" data-md-items="1" data-sm-items="1">
                                <div class="item">
                                    <div class="card p-lg-10 bg-primary-soft border-0">
                                        <div>
                                            <img alt="Image" src="{{url('public/')}}/images/thumbnail/member2.png"
                                                class="img-fluid rounded-circle d-inline">
                                        </div>
                                        <div class="card-body pl-10 pr-10">
                                            <p class="text-dark font-w-3">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Nam fringilla auguest tristique auctor. placerat a
                                                condimentum diam mollis. Ut pulvinar neque eget massa dapibus dolor.</p>
                                            <div>
                                                <h6 class="text-primary d-inline mb-0">John Smith </h6>
                                                <br>
                                                <small class="text-muted">Happy Customer</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card p-lg-10 bg-primary-soft border-0">
                                        <div>
                                            <img alt="Image" src="{{url('public/')}}/images/thumbnail/member1.png"
                                                class="img-fluid rounded-circle d-inline">
                                        </div>
                                        <div class="card-body pl-10 pr-10">
                                            <p class="text-dark font-w-3">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Nam fringilla auguest tristique auctor. placerat a
                                                condimentum diam mollis. Ut pulvinar neque eget massa dapibus dolor.</p>
                                            <div>
                                                <h6 class="text-primary d-inline mb-0">Karla Anderson </h6>
                                                <br>
                                                <small class="text-muted">Happy Customer</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="card p-lg-10 bg-primary-soft border-0">
                                        <div>
                                            <img alt="Image" src="{{url('public/')}}/images/thumbnail/member3.png"
                                                class="img-fluid rounded-circle d-inline">
                                        </div>
                                        <div class="card-body pl-10 pr-10">
                                            <p class="text-dark font-w-3">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Nam fringilla auguest tristique auctor. placerat a
                                                condimentum diam mollis. Ut pulvinar neque eget massa dapibus dolor.</p>
                                            <div>
                                                <h6 class="text-primary d-inline mb-0">Stephen Doe </h6>
                                                <br>
                                                <small class="text-muted">Happy Customer</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--testimonails end-->
            <!-- newsletter start-->
            @include('includes.newsletter')
            <!-- newsletter end-->
        </div>
        <!--body content end-->
        @include('layout.footer')
      </div>
    @include('layout.parts')
    @include('layout.scripts')
</body>
</html>