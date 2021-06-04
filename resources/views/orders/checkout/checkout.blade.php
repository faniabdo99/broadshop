@include('layout.header')

<body class="bg-light-4">
    <!-- page wrapper start -->
    <div class="page-wrapper">
        @include('layout.navbar')
        <!--body content start-->
        <div class="page-content">
            <section class="checkout-page">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-12">
                            <div class="checkout-form box-shadow white-bg">
                                <h4 class="mb-4 font-w-6">Billing Details</h4>
                                <form class="row" action="{{route('checkout.post')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="total_shipping_cost" value="{{getShippingValue()}}">
                                    <input type="hidden" name="order_weight" value="{{$OrderWeight}}">
                                    <input type="hidden" name="total_amount" value="{{$SubTotal}}">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Checkout Type</label>
                                            <select class="form-control" name="type">
                                                <option value="Personal">Personal</option>
                                                <option value="Company">Company</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="company-feilds" class="col-md-12 d-none">
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input type="text" class="form-control" placeholder="Company Name">
                                        </div>
                                        <div class="form-group">
                                            <label>VAT Number</label>
                                            <input type="text" class="form-control" placeholder="VAT Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" name="first_name" id="fname" class="form-control" placeholder="Your firstname">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" id="fname" class="form-control" placeholder="Your lastname">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>E-mail Address</label>
                                            <input type="text" name="email" id="email" class="form-control" value="{{auth()->user()->email ?? ''}}" placeholder="State Province">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" name="phone_number" id="phone" class="form-control" value="{{auth()->user()->phone ?? ''}}" placeholder="Please enter your phone number">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="address" id="address" class="form-control" placeholder="Enter Your Address">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="address_2" id="address_2" class="form-control" placeholder="Second Address">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Town/City</label>
                                            <input type="text" name="city" id="towncity" class="form-control" placeholder="Town or City">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-md-0">
                                            <label>Zip/Postal Code</label>
                                            <input type="text" name="zip_code" id="zippostalcode" class="form-control" placeholder="Zip / Postal">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mt-3">
                                            <label>Additional Notes</label>
                                            <textarea class="form-control" name="order_notes" id="notes" rows="6" placeholder="Do you have any notes to share?"></textarea>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 mt-5 mt-lg-0">
                            <div class="border bg-light-4 p-3 p-lg-5">
                                <div class="mb-7">
                                    <h6 class="mb-3 font-w-6">Your Order</h6>
                                    <ul class="list-unstyled">
                                        @forelse($CartItems as $CartItem)
                                            <li class="mb-3 border-bottom pb-3 d-flex">
                                                <span class="mr-auto"> {{$CartItem->qty}} x {{$CartItem->Product->title}} </span>
                                                <span>{{$CartItem->TotalPrice}} €</span>
                                            </li>
                                        @empty
                                            <li>There is no items in your cart</li>
                                        @endforelse
                               
                                        <li class="mb-3 border-bottom pb-3 d-flex">
                                            <span class="mr-auto"> Shipping</span>
                                            <span>{{getShippingValue()}} €</span>
                                        </li>
                                        <li class="mb-3 border-bottom pb-3 d-flex">
                                            <span class="mr-auto"> Subtotal</span>
                                            <span>{{$Total}} €</span>
                                        </li>
                                        @if($CouponDiscount)
                                            <li class="mb-3 border-bottom pb-3 d-flex text-success">
                                                <span class="mr-auto"> Coupon: {{$CartItems->first()->applied_coupon}}</span>
                                                <span>-{{$CouponDiscount}} €</span>
                                            </li>
                                        @endif
                                        <li class="d-flex">
                                            <span class="mr-auto"><strong class="cart-total"> Total:</strong></span>
                                            <strong class="cart-total">{{$SubTotal}} €</strong>
                                        </li>
                                    </ul>
                                </div>
                                <div class="cart-detail my-5">
                                    <h6 class="mb-3 font-w-6">Payment Method</h6>
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="credit-card" name="payment_method" value="creditcard" class="custom-control-input">
                                            <label class="custom-control-label" for="credit-card">Credit Card</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="bank-transfer" name="payment_method" value="banktransfer" class="custom-control-input">
                                            <label class="custom-control-label" for="bank-transfer">Bank Transfer</label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="accepted_toc" class="custom-control-input" id="accepted_toc">
                                            <label class="custom-control-label" for="accepted_toc">I have read and <a href="{{route('toc')}}" target="_blank">accept the terms</a> and conditions</label>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-animated btn-block">Proceed to Payment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!--body content end-->
        <!--multi sec start-->
        @include('includes.newsletter')
        <!--multi sec end-->
        @include('layout.footer')
    </div>
    @include('layout.parts')
    @include('layout.scripts')
    <script>
        $('select[name="type"]').change(function(){
            if($(this).val() == 'Company'){
                $('#company-feilds').removeClass('d-none');
            }else{
                $('#company-feilds').addClass('d-none');
            }
        });
    </script>
</body>

</html>
