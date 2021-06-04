@include('layout.header')
<body class="bg-light-4">
    <!-- page wrapper start -->
    <div class="page-wrapper">
        @include('layout.navbar')
        <!--hero section start-->
        <section class="bg-light py-6">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <h1 class="h2 mb-0">Broadshop Products @if($TheCategory) : {{$TheCategory->title}} @endif</h1>
                    </div>
                    {{-- <div class="col-md-6 mt-3 mt-md-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-md-end bg-transparent p-0 m-0">
                                <li class="breadcrumb-item"><a class="link-title" href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a class="link-title" href="#">Shop</a></li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Shop Grid Left
                                    Sidebar</li>
                            </ol>
                        </nav>
                    </div> --}}
                </div>
                <!-- / .row -->
            </div>
            <!-- / .container -->
        </section>
        <!--hero section end-->
        <!--body content start-->
        <div class="page-content">
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 order-lg-1">
                            <div class="row">
                                @forelse($AllProducts as $Product)
                                    <div class="col-lg-4 col-md-6 mb-5">
                                        <div class="card product-card card--default rounded-0">
                                            @if($Product->HasDiscount())
                                                @if($Product->Discount()->type == 'percentage')
                                                    <div class="sale-label">-{{$Product->Discount()->amount}}%</div>
                                                @else
                                                    <div class="sale-label">-{{$Product->Discount()->amount}}€</div>
                                                @endif
                                            @endif
                                            <a class="card-img-hover d-block" href="{{route('product.single' , [$Product->slug,$Product->id])}}"> 
                                                <img class="card-img-back" src="{{$Product->ImagePath}}" alt="{{$Product->title}}">
                                                <img class="card-img-front" src="{{$Product->ImagePath}}" alt="{{$Product->title}}"> 
                                            </a>
                                            <div class="card-icons">
                                                @auth
                                                    <div class="card-icons__item">
                                                        <a href="javascript:;" product-id="{{$Product->id}}" class="like_item @if($Product->LikedByUser()) bg-primary text-white @endif" data-toggle="tooltip" data-placement="left" title="Add to Wishlist" data-original-title="Add to wishlist">
                                                            <i class="lar la-heart"></i>
                                                        </a>
                                                    </div>
                                                @endauth
                                            </div>
                                            <div class="card-info">
                                                <div class="card-body">
                                                    <div class="product-title font-w-5">
                                                        <a class="link-title" href="{{route('product.single' , [$Product->slug,$Product->id])}}">{{$Product->title}}</a>
                                                    </div>
                                                    <div class="mt-1">
                                                        @if($Product->HasDiscount())
                                                            <span class="product-price text-dark">
                                                                <del class="text-danger">{{$Product->price}}€</del>
                                                                {{$Product->FinalPrice}}€
                                                            </span>
                                                        @else
                                                            <span class="product-price text-dark">
                                                                {{$Product->price}} €
                                                            </span>
                                                        @endif
                                                        <div class="star-rating">
                                                            @php 
                                                                $i = 0;
                                                            @endphp
                                                            @for($i = 1; $i <= $Product->Reviews->avg('rate'); $i++)
                                                            <i class="las la-star"></i>
                                                            @endfor
                                                            @for($i = 1; $i <= (5-$Product->Reviews->avg('rate')); $i++)
                                                            <i class="las la-star not-active"></i>
                                                            @endfor
                                                            <span class="stars-count">({{$Product->Reviews->count()}})</span>
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
                        <div class="col-lg-3 col-md-12 sidebar mt-8 mt-lg-0">
                            <div>
                                <div class="widget widget-categories mb-4 border rounded p-4">
                                    <h5 class="widget-title mb-3">Categories</h5>
                                    <ul class="list-unstyled">
                                        @forelse ($AllCategories as $Category)
                                        <li> <a href="{{route('products' , $Category->slug)}}">{{$Category->title}} ({{$Category->Product->count()}})</a></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                                <div class="widget mb-4">
                                    <div class="position-relative rounded overflow-hidden">
                                        <!-- Background -->
                                        <img class="img-fluid hover-zoom" src="{{url('public')}}/images/product-ad/side-banner.jpg"
                                            alt="">
                                        <!-- Body -->
                                        <div class="position-absolute top-50 pl-5 side-banner">
                                            <h6 class="text-dark">Todays Deals</h6>
                                            <!-- Heading -->
                                            <h4 class="font-w-6 text-dark">Accessories <br>
                                                Special</h4>
                                            <!-- Link --> <a class="more-link" href="#">Shop Now </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--multi sec start-->

            <section class="bg-pink py-9 position-relative overflow-hidden">
                <div class="container">
                    <div class="row justify-content-center text-center mb-1">
                        <div class="col-lg-6 col-md-10">
                            <div class="mb-4">
                                <h2 class="mb-0">Be the first and get weekly updates</h2>
                            </div>
                            <div class="subscribe-form">
                                <form id="mc-form" class="row align-items-center no-gutters mb-3">
                                    <div class="col">
                                        <input value="" name="EMAIL" class="email form-control input-2 bg-white"
                                            id="mc-email" placeholder="Email Address" required type="email">
                                    </div>
                                    <div class="col-auto">
                                        <input class="btn dark-btn overflow-auto" name="subscribe" value="Subscribe"
                                            type="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--multi sec end-->
        </div>
        <!--body content end-->
        @include('layout.footer')
    </div>
    @include('layout.parts')
    @include('layout.scripts')
</body>

</html>
