@include('layout.header' , [
    'PageTitle' => __('user.wishlist_title')
])
<body class="no-touch">
    @include('layout.tag-manager')
    <!-- page wrapper start -->
    <div class="page-wrapper">
        @include('layout.navbar')
        <!--body content start-->
        <div class="page-content">
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="cart-table table">
                                    <thead>
                                        <tr>
                                            <th scope="col">@lang('user.product')</th>
                                            <th scope="col">@lang('user.status')</th>
                                            <th scope="col">@lang('user.price')</th>
                                            <th scope="col">@lang('user.actions')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse(auth()->user()->Wishlist as $Item)
                                            @if($Item->Product->status != 'Available')
                                            @else
                                                <tr>
                                                    <td>
                                                        <div class="cart-thumb media align-items-center">
                                                            <a href="{{route('product.single' , [$Item->Product->slug,$Item->Product->id])}}">
                                                                <img class="img-fluid" src="{{$Item->Product->ImagePath}}" alt="{{$Item->Product->LocalTitle}}">
                                                            </a>
                                                            <div class="media-body ml-3">
                                                                <div class="product-title mb-2">
                                                                    <a class="link-title" href="{{route('product.single' , [$Item->Product->slug,$Item->Product->id])}}">{{$Item->Product->LocalTitle}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span class="product-price text-muted">{{$Item->Product->status}}</span></td>
                                                    <td><span class="product-price text-muted">{{$Item->Product->FinalPrice}}€</span></td>
                                                    <td>
                                                        <a class="btn-cart btn btn-pink mx-3" href="{{route('product.single' , [$Item->Product->slug,$Item->Product->id])}}">@lang('user.view_product')</a>
                                                        <a href="javascript:;" product-id="{{$Item->Product->id}}" class="btn-cart btn btn-pink mx-3 like_item" data-toggle="tooltip" data-placement="left" title="@lang('user.remove_from_wishlist')" data-original-title="@lang('user.remove_from_wishlist')">@lang('user.remove')</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @empty
                                            <p>@lang('user.empty_wishlist')</p>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--multi sec start-->
            @include('includes.newsletter')
            <!--multi sec end-->
        </div>
        <!--footer start-->
        @include('layout.footer')
        <!--footer end-->
    </div>
    <!-- page wrapper end -->
    @include('layout.parts')
    @include('layout.scripts')
</body>

</html>
