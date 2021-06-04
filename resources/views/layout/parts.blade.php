

<!-- Quick View Modal -->
<div class="modal fade view-modal" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 pb-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                        aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-12"> <img class="img-fluid rounded"
                            src="{{url('public')}}/images/product/large/01.jpg" alt="" /> </div>
                    <div class="col-lg-7 col-12 mt-5 mt-lg-0">
                        <div class="product-details">
                            <h3 class="mb-0">Women Sweater</h3>
                            <div class="star-rating mb-4"><i class="las la-star"></i><i class="las la-star"></i><i
                                    class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i>
                            </div>
                            <span class="product-price h4">$25.00 <del class="text-muted h6">$35.00</del></span>
                            <ul class="list-unstyled my-4">
                                <li class="mb-2">Availibility: <span class="text-muted"> In Stock</span> </li>
                                <li>Categories :<span class="text-muted"> Women's</span> </li>
                            </ul>
                            <p class="mb-4">Nulla eget sem vitae eros pharetra viverra Nam vitae luctus ligula
                                suscipit risus nec eleifend Pellentesque eu quam sem, ac malesuada</p>
                            <div class="d-sm-flex align-items-center mb-5">
                                <div class="d-flex align-items-center mr-sm-4">
                                    <button class="btn-product btn-product-up"> <i class="las la-minus"></i>
                                    </button>
                                    <input class="form-product" type="number" name="form-product" value="1">
                                    <button class="btn-product btn-product-down"> <i class="las la-plus"></i>
                                    </button>
                                </div>
                                <select class="custom-select mt-3 mt-sm-0" id="inputGroupSelect01">
                                    <option selected>Size</option>
                                    <option value="1">XS</option>
                                    <option value="2">S</option>
                                    <option value="3">M</option>
                                    <option value="3">L</option>
                                    <option value="3">XL</option>
                                    <option value="3">XXL</option>
                                </select>
                                <div class="d-flex text-center ml-sm-4 mt-3 mt-sm-0">
                                    <div class="form-check pl-0 mr-3">
                                        <input type="radio" class="form-check-input" id="color-filter01"
                                            name="Radios">
                                        <label class="form-check-label" for="color-filter01"
                                            data-bg-color="#3cb371"></label>
                                    </div>
                                    <div class="form-check pl-0 mr-3">
                                        <input type="radio" class="form-check-input" id="color-filter02"
                                            name="Radios" checked>
                                        <label class="form-check-label" for="color-filter02"
                                            data-bg-color="#4876ff"></label>
                                    </div>
                                    <div class="form-check pl-0 mr-3">
                                        <input type="radio" class="form-check-input" id="color-filter03"
                                            name="Radios">
                                        <label class="form-check-label" for="color-filter03"
                                            data-bg-color="#0a1b2b"></label>
                                    </div>
                                    <div class="form-check pl-0">
                                        <input type="radio" class="form-check-input" id="color-filter04"
                                            name="Radios">
                                        <label class="form-check-label" for="color-filter04"
                                            data-bg-color="#f94f15"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-sm-flex align-items-center mt-5">
                                <button class="btn btn-primary btn-animated mr-sm-4 mb-3 mb-sm-0"><i
                                        class="las la-shopping-cart mr-1"></i>Add To Cart</button>
                                <a class="btn btn-animated btn-dark" href="#"> <i class="lar la-heart mr-1"></i>Add
                                    To Wishlist</a> </div>
                            <div class="d-sm-flex align-items-center border-top pt-4 mt-5">
                                <h6 class="mb-sm-0 mr-sm-4">Share It:</h6>
                                <ul class="list-inline">
                                    <li class="list-inline-item"><a class="bg-white shadow-sm rounded p-2"
                                            href="#"><i class="la la-facebook"></i></a> </li>
                                    <li class="list-inline-item"><a class="bg-white shadow-sm rounded p-2"
                                            href="#"><i class="la la-dribbble"></i></a> </li>
                                    <li class="list-inline-item"><a class="bg-white shadow-sm rounded p-2"
                                            href="#"><i class="la la-instagram"></i></a> </li>
                                    <li class="list-inline-item"><a class="bg-white shadow-sm rounded p-2"
                                            href="#"><i class="la la-twitter"></i></a> </li>
                                    <li class="list-inline-item"><a class="bg-white shadow-sm rounded p-2"
                                            href="#"><i class="la la-linkedin"></i></a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--back-to-top start-->
<div class="scroll-top"><a class="smoothscroll" href="#top"><i class="las la-angle-up"></i></a></div>
<!--back-to-top end-->
<!-- notifications start -->
@if(session()->has('success'))
    <div class="notification success-notification">
        <div class="notification-icon">
            <i class="fas fa-check"></i>
        </div>
        <div class="notification-content">
            <b>Success</b>
            <p>{{session('success')}}</p>
        </div>
    </div>
@endif
@if ($errors->any())
    <div class="notification danger-notification">
        <div class="notification-icon">
            <i class="fas fa-times"></i>
        </div>
        <div class="notification-content">
            <b>Error</b>
            @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
    </div>
@endif
<!-- notifications end -->
<div id="noto" class="notification success-notification d-none">
    <div class="notification-icon">
        <i class="fas fa-check"></i>
    </div>
    <div class="notification-content">
        <b>Success</b>
        <p>Test</p>
    </div>
</div>