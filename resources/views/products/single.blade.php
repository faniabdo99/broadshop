@include('layout.header')
<body class="bg-light-4">
    <!-- page wrapper start -->
    <div class="page-wrapper">
        @include('layout.navbar')
        <!--body content start-->
        <div class="page-content">
            <!--product details start-->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <ul id="imageGallery">
                                <li data-thumb="{{$TheProduct->imagePath}}" data-src="{{$TheProduct->imagePath}}">
                                    <img class="img-fluid w-100" src="{{$TheProduct->imagePath}}" alt="{{$TheProduct->title}}" />
                                </li>
                                @foreach ($TheProduct->GalleryImages as $SingleImage)
                                    <li data-thumb="{{$SingleImage->ImagePath}}" data-src="{{$SingleImage->ImagePath}}">
                                        <img class="img-fluid w-100" src="{{$SingleImage->ImagePath}}" alt="{{$TheProduct->title}}" />
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                            <div class="product-details">
                                <h1 class="h4 mb-0 font-w-6">{{$TheProduct->local_title}}</h1>
                                <div class="star-rating mb-4">
                                    @php 
                                        $i = 0;
                                    @endphp
                                    @for($i = 1; $i <= $TheProduct->Reviews->avg('rate'); $i++)
                                    <i class="las la-star"></i>
                                    @endfor
                                    @for($i = 1; $i <= (5-$TheProduct->Reviews->avg('rate')); $i++)
                                    <i class="las la-star not-active"></i>
                                    @endfor
                                    <span class="stars-count">({{$TheProduct->Reviews->count()}} Reviews)</span>
                                </div>
                                @if($TheProduct->HasDiscount())
                                    <span class="product-price text-dark">
                                        <del class="text-danger">{{$TheProduct->price}}€</del>
                                        {{$TheProduct->FinalPrice}}€
                                    </span>
                                @else
                                    <span class="product-price text-dark">
                                        {{$TheProduct->price}}€
                                    </span>
                                @endif
                                <ul class="list-unstyled my-3">
                                    <li><small>Status: <span class="text-green"> {{$TheProduct->status}}</span></small></li>
                                    <li class="font-w-4"><small>Category :<span class="text-muted"> <a href="{{route('products' , $TheProduct->Category->slug)}}">{{$TheProduct->Category->title}}</a></span></small></li>
                                </ul>
                                <p class="mb-4 desc">{{$TheProduct->description}}</p>
                                <div class="d-sm-flex align-items-center mb-5">
                                    <div class="d-flex align-items-center mr-sm-4">
                                        <button class="btn-product btn-product-up"> <i class="las la-minus"></i></button>
                                        <input class="form-product" type="number" name="count" value="1">
                                        <button class="btn-product btn-product-down"> <i class="las la-plus"></i></button>
                                    </div>
                                    <div class="d-flex text-center ml-sm-4 mt-3 mt-sm-0">
                                        @if($TheProduct->AvailableVariations()['inventory'] > 0)
                                        @forelse($TheProduct->AvailableVariations()['variations'] as $key => $Item)
                                        <div class="form-check pl-0 mr-2">
                                            <input type="radio" value="{{$Item->color}}" class="form-check-input" id="color-filter-{{$key+1}}" name="color_code">
                                            <label class="form-check-label" for="color-filter-{{$key+1}}" data-bg-color="{{$Item->color_code}}"></label>
                                        </div>
                                        @empty
                                        @endforelse
                                        @endif
                                    </div>
                                </div>
                                @if($TheProduct->AvailableVariations()['inventory'] > 0)
                                <div class="d-sm-flex align-items-center mt-5">
                                    <button class="btn btn-primary btn-animated mr-sm-3 mb-3 mb-sm-0" id="add-to-cart-single" data-product="{{$TheProduct->id}}" data-user="{{getUserId()}}">
                                        <i class="las la-shopping-cart mr-2"></i> Add To Cart
                                    </button>
                                    @auth
                                        <a class="btn btn-animated bg-primary text-white like_item @if($TheProduct->LikedByUser()) bg-primary @endif" product-id="{{$TheProduct->id}}" data-toggle="tooltip" data-placement="left" title="Add to Wishlist" data-original-title="Add to wishlist" href="javascript:;">
                                            <i class="lar la-heart mr-2 ic-1-2x"></i> @if($TheProduct->LikedByUser()) Added To Wishlist @else Add To Wishlist @endif
                                        </a>
                                    @endauth
                                </div>
                                {{-- <button id="add-to-cart" type="submit" data-product="{{$TheProduct->id}}" data-user="{{getUserId()}}" data-action="{{route('cart.add')}}" class="d-inline-block site-btn"><i class="fas fa-eye"></i> اضف الى السلة</button>
                                <a class="@if(userCart()->count() < 1) d-none @endif site-btn sb-white" id="go-to-cart-button" href="{{route('order.cart')}}"><i class="fas fa-shopping-cart"></i> اكمال عملية الشراء</a> --}}
                                @else
                                    <p class="text-danger">Sold Out</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--product details end-->
            <!--tab start-->
            <section class="pt-0 pb-8">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab product-tab">
                                <!-- Nav tabs -->
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist"> 
                                        <a class="nav-item nav-link p-2 active ml-0" id="nav-tab1" data-toggle="tab" href="#tab3-1" role="tab" aria-selected="true">Description</a>
                                        <a class="nav-item nav-link p-2" id="nav-tab2" data-toggle="tab" href="#tab3-2" role="tab" aria-selected="false">Specification</a>
                                        <a class="nav-item nav-link p-2" id="nav-tab3" data-toggle="tab" href="#tab3-3" role="tab" aria-selected="false">Ratings and Reviews</a>
                                    </div>
                                </nav>
                                <!-- Tab panes -->
                                <div class="tab-content pt-5 p-0">
                                    <div role="tabpanel" class="tab-pane fade show active" id="tab3-1">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                {!! $TheProduct->body !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab3-2">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>Color/s</td>
                                                    <td>Yellow, Red, Blue, Green &amp; Black</td>
                                                </tr>
                                                <tr>
                                                    <td>Height</td>
                                                    <td>{{$TheProduct->hiehgt ?? 'N/A'}} CM</td>
                                                </tr>
                                                <tr>
                                                    <td>Width</td>
                                                    <td>{{$TheProduct->width ?? 'N/A'}} CM</td>
                                                </tr>
                                                <tr>
                                                    <td>Weight</td>
                                                    <td>{{$TheProduct->weight ?? 'N/A'}} KG</td>
                                                </tr>
                                                <tr>
                                                    <td>Warranty</td>
                                                    <td>6 Months</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab3-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-6">
                                                <div class="bg-light-4 text-center p-5">
                                                    <h4>Based on {{$TheProduct->Reviews->count()}} Reviews</h4>
                                                    <h5>Average</h5>
                                                    <h4>{{$TheProduct->Reviews->avg('rate') ?? 'N/A'}}</h4>
                                                    <h6>({{$TheProduct->Reviews->count()}} Reviews)</h6>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3 mt-lg-0">
                                                <div class="rating-list">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="text-nowrap mr-3">5 Star</div>
                                                        <div class="w-100">
                                                            <div class="progress" style="height: 5px;">
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div><span class="text-muted ml-3">90%</span>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="text-nowrap mr-3">4 Star</div>
                                                        <div class="w-100">
                                                            <div class="progress" style="height: 5px;">
                                                                <div class="progress-bar bg-success" role="progressbar"
                                                                    style="width: 60%;" aria-valuenow="60"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div><span class="text-muted ml-3">60%</span>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="text-nowrap mr-3">3 Star</div>
                                                        <div class="w-100">
                                                            <div class="progress" style="height: 5px;">
                                                                <div class="progress-bar bg-success" role="progressbar"
                                                                    style="width: 40%;" aria-valuenow="40"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div><span class="text-muted ml-3">40%</span>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="text-nowrap mr-3">2 Star</div>
                                                        <div class="w-100">
                                                            <div class="progress" style="height: 5px;">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    style="width: 20%;" aria-valuenow="20"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div><span class="text-muted ml-3">20%</span>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="text-nowrap mr-3">1 Star</div>
                                                        <div class="w-100">
                                                            <div class="progress" style="height: 5px;">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                    style="width: 10%;" aria-valuenow="10"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div><span class="text-muted ml-3">10%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-area mt-5">
                                            <div class="content_title">
                                                <h4>Reviews</h4>
                                            </div>
                                            <ul class="list_none comment_list">
                                                @forelse($TheProduct->Reviews as $Review)
                                                    <li class="comment_info">
                                                        <div class="d-flex">
                                                            <div class="comment_user">
                                                                <img src="{{$Review->User->ProfileImage}}" alt="{{$Review->User->name}}">
                                                            </div>
                                                            <div class="comment_content">
                                                                <div class="d-flex">
                                                                    <div class="meta_data">
                                                                        <h6><a href="#">{{$Review->User->name}}</a></h6>
                                                                        <div class="comment-time">{{$Review->created_at->format('Y/m/d')}}</div>
                                                                    </div>
                                                                </div>
                                                                <p>{{$Review->review}}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <p>There is no reviews on this product yet.</p>
                                                @endforelse
                                            </ul>
                                            <div class="section-title">
                                                <h4>Add a review</h4>
                                            </div>
                                            @auth
                                            <div class="mt-8 bg-light-4 rounded py-5">
                                                <form class="row" method="post" action="{{route('review.post')}}">
                                                    <input type="hidden" name="product_id" value="{{$TheProduct->id}}">
                                                    @csrf
                                                    <div class="messages"></div>
                                                    <div class="form-group col-sm-6">
                                                        <p>{{auth()->user()->name}}</p>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <p>{{auth()->user()->email}} (Not Shown)</p>
                                                    </div>
                                                    <div class="form-group clearfix col-12">
                                                        <select class="form-control" name="rate" required>
                                                            <option value="">Rating -- Select</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <textarea id="form_message" name="review" class="form-control" placeholder="Write Your Review" rows="4" required></textarea>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn btn-primary btn-animated mt-1">Post Review</button>
                                                    </div>
                                                </form>
                                            </div>
                                            @endauth
                                            @guest
                                                <p>Please <a href="{{route('user.getSignin')}}">Signin</a> to add a review</p>
                                            @endguest
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--tab end-->
            <!--recent product start-->
            {{-- <section class="pb-6 border-top pt-7">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8 col-md-10">
                            <div class="mb-5">
                                <h2 class="mb-0 font-w-6">Related Products</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="owl-carousel no-pb owl-2" data-dots="false" data-nav="true" data-items="4"
                                data-md-items="2" data-sm-items="1">
                                <div class="item">
                                    <div class="card product-card card--default"> <a class="card-img-hover d-block"
                                            href="product-left-image.html"> <img class="card-img-top card-img-back"
                                                src="{{url('public')}}/images/product/p2.jpg" alt="..."> <img
                                                class="card-img-top card-img-front"
                                                src="{{url('public')}}/images/product/p2_hover.jpg" alt="..."> </a>
                                        <div class="card-icons">
                                            <div class="card-icons__item"> <a href="#" data-toggle="tooltip"
                                                    data-placement="left" title=""
                                                    data-original-title="Add to wishlist"> <i class="lar la-heart"></i>
                                                </a> </div>
                                            <div class="card-icons__item"> <a href="#" data-toggle="tooltip"
                                                    data-placement="left" title=""
                                                    data-original-title="Quick View"><span data-target="#quick-view"
                                                        data-toggle="modal"> <i
                                                            class="ion-ios-search-strong"></i></span> </a> </div>
                                            <div class="card-icons__item"> <a href="#" data-toggle="tooltip"
                                                    data-placement="left" title="" data-original-title="Compare"> <i
                                                        class="las la-random"></i> </a> </div>
                                        </div>
                                        <div class="card-info">
                                            <div class="card-body">
                                                <div class="product-title font-w-5"><a class="link-title"
                                                        href="product-left-image.html">Unpaired Running Shoes</a>
                                                </div>
                                                <div class="mt-1"> <span class="product-price text-pink"><del
                                                            class="text-muted">$35.00</del> $25.00</span>
                                                    <div class="star-rating"><i class="las la-star"></i><i
                                                            class="las la-star"></i><i class="las la-star"></i><i
                                                            class="las la-star"></i><i class="las la-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-transparent border-0">
                                                <div
                                                    class="product-link d-flex align-items-center justify-content-center">
                                                    <button class="btn-cart btn btn-pink mx-3" type="button"><i
                                                            class="las la-shopping-cart mr-1"></i> Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card product-card card--default"> <a class="card-img-hover d-block"
                                            href="product-left-image.html"> <img class="card-img-top card-img-back"
                                                src="{{url('public')}}/images/product/p11.jpg" alt="..."> <img
                                                class="card-img-top card-img-front"
                                                src="{{url('public')}}/images/product/p11_hover.jpg" alt="..."> </a>
                                        <div class="card-icons">
                                            <div class="card-icons__item"> <a href="#" data-toggle="tooltip"
                                                    data-placement="left" title=""
                                                    data-original-title="Add to wishlist"> <i class="lar la-heart"></i>
                                                </a> </div>
                                            <div class="card-icons__item"> <a href="#" data-toggle="tooltip"
                                                    data-placement="left" title=""
                                                    data-original-title="Quick View"><span data-target="#quick-view"
                                                        data-toggle="modal"> <i
                                                            class="ion-ios-search-strong"></i></span> </a> </div>
                                            <div class="card-icons__item"> <a href="#" data-toggle="tooltip"
                                                    data-placement="left" title="" data-original-title="Compare"> <i
                                                        class="las la-random"></i> </a> </div>
                                        </div>
                                        <div class="card-info">
                                            <div class="card-body">
                                                <div class="product-title font-w-5"><a class="link-title"
                                                        href="product-left-image.html">Unpaired Running Shoes</a>
                                                </div>
                                                <div class="mt-1"> <span class="product-price text-pink"><del
                                                            class="text-muted">$35.00</del> $25.00</span>
                                                    <div class="star-rating"><i class="las la-star"></i><i
                                                            class="las la-star"></i><i class="las la-star"></i><i
                                                            class="las la-star"></i><i class="las la-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-transparent border-0">
                                                <div
                                                    class="product-link d-flex align-items-center justify-content-center">
                                                    <button class="btn-cart btn btn-pink mx-3" type="button"><i
                                                            class="las la-shopping-cart mr-1"></i> Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card product-card card--default"> <a class="card-img-hover d-block"
                                            href="product-left-image.html"> <img class="card-img-top card-img-back"
                                                src="{{url('public')}}/images/product/p15.jpg" alt="..."> <img
                                                class="card-img-top card-img-front"
                                                src="{{url('public')}}/images/product/p15_hover.jpg" alt="..."> </a>
                                        <div class="card-icons">
                                            <div class="card-icons__item"> <a href="#" data-toggle="tooltip"
                                                    data-placement="left" title=""
                                                    data-original-title="Add to wishlist"> <i class="lar la-heart"></i>
                                                </a> </div>
                                            <div class="card-icons__item"> <a href="#" data-toggle="tooltip"
                                                    data-placement="left" title=""
                                                    data-original-title="Quick View"><span data-target="#quick-view"
                                                        data-toggle="modal"> <i
                                                            class="ion-ios-search-strong"></i></span> </a> </div>
                                            <div class="card-icons__item"> <a href="#" data-toggle="tooltip"
                                                    data-placement="left" title="" data-original-title="Compare"> <i
                                                        class="las la-random"></i> </a> </div>
                                        </div>
                                        <div class="card-info">
                                            <div class="card-body">
                                                <div class="product-title font-w-5"><a class="link-title"
                                                        href="product-left-image.html">Unpaired Running Shoes</a>
                                                </div>
                                                <div class="mt-1"> <span class="product-price text-pink"><del
                                                            class="text-muted">$35.00</del> $25.00</span>
                                                    <div class="star-rating"><i class="las la-star"></i><i
                                                            class="las la-star"></i><i class="las la-star"></i><i
                                                            class="las la-star"></i><i class="las la-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-transparent border-0">
                                                <div
                                                    class="product-link d-flex align-items-center justify-content-center">
                                                    <button class="btn-cart btn btn-pink mx-3" type="button"><i
                                                            class="las la-shopping-cart mr-1"></i> Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card product-card card--default">
                                        <div class="hot-label">Hot</div>
                                        <a class="card-img-hover d-block" href="product-left-image.html"> <img
                                                class="card-img-top card-img-back" src="{{url('public')}}/images/product/p5.jpg"
                                                alt="..."> <img class="card-img-top card-img-front"
                                                src="{{url('public')}}/images/product/p5_hover.jpg" alt="..."> </a>
                                        <div class="card-icons">
                                            <div class="card-icons__item"> <a href="#" data-toggle="tooltip"
                                                    data-placement="left" title=""
                                                    data-original-title="Add to wishlist"> <i class="lar la-heart"></i>
                                                </a> </div>
                                            <div class="card-icons__item"> <a href="#" data-toggle="tooltip"
                                                    data-placement="left" title=""
                                                    data-original-title="Quick View"><span data-target="#quick-view"
                                                        data-toggle="modal"> <i
                                                            class="ion-ios-search-strong"></i></span> </a> </div>
                                            <div class="card-icons__item"> <a href="#" data-toggle="tooltip"
                                                    data-placement="left" title="" data-original-title="Compare"> <i
                                                        class="las la-random"></i> </a> </div>
                                        </div>
                                        <div class="card-info">
                                            <div class="card-body">
                                                <div class="product-title font-w-5"><a class="link-title"
                                                        href="product-left-image.html">Unpaired Running Shoes</a>
                                                </div>
                                                <div class="mt-1"> <span class="product-price text-pink"><del
                                                            class="text-muted">$35.00</del> $25.00</span>
                                                    <div class="star-rating"><i class="las la-star"></i><i
                                                            class="las la-star"></i><i class="las la-star"></i><i
                                                            class="las la-star"></i><i class="las la-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-transparent border-0">
                                                <div
                                                    class="product-link d-flex align-items-center justify-content-center">
                                                    <button class="btn-cart btn btn-pink mx-3" type="button"><i
                                                            class="las la-shopping-cart mr-1"></i> Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card product-card card--default"> <a class="card-img-hover d-block"
                                            href="product-left-image.html"> <img class="card-img-top card-img-back"
                                                src="{{url('public')}}/images/product/p6.jpg" alt="..."> <img
                                                class="card-img-top card-img-front"
                                                src="{{url('public')}}/images/product/p6_hover.jpg" alt="..."> </a>
                                        <div class="card-icons">
                                            <div class="card-icons__item"> <a href="#" data-toggle="tooltip"
                                                    data-placement="left" title=""
                                                    data-original-title="Add to wishlist"> <i class="lar la-heart"></i>
                                                </a> </div>
                                            <div class="card-icons__item"> <a href="#" data-toggle="tooltip"
                                                    data-placement="left" title=""
                                                    data-original-title="Quick View"><span data-target="#quick-view"
                                                        data-toggle="modal"> <i
                                                            class="ion-ios-search-strong"></i></span> </a> </div>
                                            <div class="card-icons__item"> <a href="#" data-toggle="tooltip"
                                                    data-placement="left" title="" data-original-title="Compare"> <i
                                                        class="las la-random"></i> </a> </div>
                                        </div>
                                        <div class="card-info">
                                            <div class="card-body">
                                                <div class="product-title font-w-5"><a class="link-title"
                                                        href="product-left-image.html">Unpaired Running Shoes</a>
                                                </div>
                                                <div class="mt-1"> <span class="product-price text-pink"><del
                                                            class="text-muted">$35.00</del> $25.00</span>
                                                    <div class="star-rating"><i class="las la-star"></i><i
                                                            class="las la-star"></i><i class="las la-star"></i><i
                                                            class="las la-star"></i><i class="las la-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-transparent border-0">
                                                <div
                                                    class="product-link d-flex align-items-center justify-content-center">
                                                    <button class="btn-cart btn btn-pink mx-3" type="button"><i
                                                            class="las la-shopping-cart mr-1"></i> Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
            <!--recent product end-->
            <!-- newsletter start-->
            @include('includes.newsletter')
            <!-- newsletter end-->
            <!--body content end-->
        </div>
        <!--body content end-->
        @include('layout.footer')
    </div>
    @include('layout.parts')
    @include('layout.scripts')
</body>

</html>