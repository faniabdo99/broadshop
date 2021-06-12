@include('layout.header' ,[
    'PageTitle' => __('cart.title')
])
<body class="bg-light-4">
    <!-- page wrapper start -->
    <div class="page-wrapper">
        @include('layout.navbar')
        <!--body content start-->
        <div class="page-content">
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="table-responsive">
                                @if(count($CartItems) > 0)
                                    <table class="cart-table table">
                                        <thead>
                                            <tr>
                                                <th scope="col">@lang('cart.product')</th>
                                                <th scope="col">@lang('cart.price')</th>
                                                <th scope="col">@lang('cart.quantity')</th>
                                                <th scope="col">@lang('cart.total')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($CartItems as $Cart)
                                                <tr>
                                                    <td>
                                                        <div class="cart-thumb media align-items-center">
                                                            <a href="#">
                                                                <img class="img-fluid" src="{{$Cart->Product->ImagePath}}" alt="{{$Cart->Product->title}}">
                                                            </a>
                                                            <div class="media-body ml-3">
                                                                <div class="product-title mb-2">
                                                                    <a class="link-title" href="{{route('product.single' , [$Cart->Product->slug,$Cart->Product->id])}}">{{$Cart->Product->title}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <span class="product-price text-muted">{{$Cart->Product->FinalPrice}}€</span>
                                                    </td>
                                                    <td class="text-center">X{{$Cart->qty}}</td>
                                                    <td> <span class="product-price text-dark font-w-6">{{$Cart->TotalPrice}}€</span>
                                                        <a href="{{route('cart.delete' , [$Cart->id , getUserId()])}}" class="close-link"><i class="las la-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                @else
                                    <p>@lang('cart.no_items')</p>
                                    <a class="btn btn-dark btn-animated mt-3 btn-block" href="{{route('product.home')}}">@lang('cart.shop_now')</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 pl-lg-5 mt-8 mt-lg-0">
                            <div class="border rounded p-5 bg-light-4">
                                <h4 class="text-black text-left mb-2 font-w-6">@lang('cart.cart_totals')</h4>
                                <div class="d-flex justify-content-between align-items-center border-bottom py-3"> <span
                                        class="text-muted">@lang('cart.subtotal')</span> <span class="text-dark">{{$Total}}€</span>
                                </div>
                            
                                @if($CouponDiscount)
                                <div class="d-flex justify-content-between align-items-center border-bottom py-3"> 
                                    <span class="text-muted">{{$CartItems->first()->applied_coupon}}</span> <span class="text-dark">-{{formatPrice($CouponDiscount)}}€</span>
                                </div>
                                @endif
                                <div class="d-flex justify-content-between align-items-center pt-3 mb-5"> <span
                                        class="text-dark h5">@lang('cart.total')</span> <span
                                        class="text-dark font-w-6 h5">{{$SubTotal}}€</span>
                                </div>
                                @if(count($CartItems) > 0)
                                    <a class="btn btn-primary btn-animated btn-block" href="{{route('checkout')}}">@lang('cart.proceed_to_checkout')</a>
                                @endif
                                <a class="btn btn-dark btn-animated mt-3 btn-block" href="{{route('product.home')}}">@lang('cart.continue_shopping')</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-md-flex align-items-end justify-content-between py-5 px-5 mt-5 bg-light-4">
                        <div>
                        @if(count($CartItems) > 0)
                            @auth
                            <form action="{{route('coupon.apply')}}" method="POST">
                                @csrf
                                <label class="text-black h4" for="coupon">@lang('cart.coupon')</label>
                                <p>@lang('cart.coupon_desc')</p>
                                <div class="row form-row">
                                    <div class="col">
                                        <input class="form-control" name="coupuon_code" placeholder="@lang('cart.coupon')" type="text">
                                    </div>
                                    <div class="col col-auto">
                                        <button class="btn btn-dark btn-animated">@lang('cart.coupon_cta')</button>
                                    </div>
                                </div>
                                </div>
                            </form>
                            @endauth
                            @guest
                            <p>@lang('cart.please') <a href="{{route('user.getSignin')}}">@lang('layout.signin')</a> @lang('cart.use_coupons')</p>   
                            @endguest
                        @endif
                    </div>
                </div>
            </section>
            <!--multi sec start-->
            @include('includes.newsletter')
            <!--multi sec end-->
        </div>
        <!--body content end-->
        @include('layout.footer')
    </div>
    @include('layout.parts')
    @include('layout.scripts')
</body>
</html>