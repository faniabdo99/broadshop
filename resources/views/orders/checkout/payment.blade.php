@include('layout.header' , [
'PageTitle' => __('checkout.title')
])
<body class="bg-light-4 no-touch">
    @include('layout.tag-manager')
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
                                <h4 class="mb-4 font-w-6">@lang('checkout.billing_details')</h4>
                                <form class="row" action="{{route('checkout.payment.post' , $TheOrder->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="total_shipping_cost" value="{{getShippingValue($Total)}}">
                                    <input type="hidden" name="order_weight" value="{{$OrderWeight}}">
                                    <input type="hidden" name="total_amount" value="{{$Total}}">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>@lang('checkout.checkout_type')*</label>
                                            <select class="form-control" name="type" required>
                                                <option @if($TheOrder->type == 'Indivisual') selected @endif value="Indivisual">@lang('checkout.indivisual')</option>
                                                <option @if($TheOrder->type == 'Company') selected @endif value="Company">@lang('checkout.company')</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="company-feilds" class="col-md-12 d-none">
                                        <div class="form-group">
                                            <label>@lang('checkout.company_name')*</label>
                                            <input type="text" name="company_name" class="form-control" value="{{$TheOrder->company_name}}" placeholder="@lang('checkout.company_name')">
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('checkout.vat_number')*</label>
                                            <input type="text" class="form-control" name="vat_number" value="{{$TheOrder->vat_number}}" placeholder="@lang('checkout.vat_number')">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('checkout.f_name')*</label>
                                            <input type="text" name="first_name" value="{{$TheOrder->first_name}}" id="fname" class="form-control" placeholder="@lang('checkout.f_name')" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('checkout.l_name')*</label>
                                            <input type="text" name="last_name" value="{{$TheOrder->last_name}}" id="fname" class="form-control" placeholder="@lang('checkout.l_name')" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('checkout.email')</label>
                                            <input type="text" name="email" id="email" class="form-control" value="{{auth()->user()->email ?? ''}}" placeholder="@lang('checkout.email')">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('checkout.phone')*</label>
                                            <input type="text" name="phone_number" id="phone" class="form-control" value="{{auth()->user()->phone ?? ''}}" placeholder="@lang('checkout.phone')" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>@lang('checkout.shipping_address')*</label>
                                            <input type="text" name="address" id="address" value="{{$TheOrder->address}}" class="form-control" placeholder="@lang('checkout.shipping_address')" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="address_2" id="address_2" value="{{$TheOrder->address_2}}" class="form-control" placeholder="@lang('checkout.second_address')">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <select class="form-control" name="country" id="country" required>
                                                <option @if($TheOrder->country == 'Belgium') selected @endif value="Belgium">Belgium</option>
                                                <option @if($TheOrder->country == 'Netherlands') selected @endif value="Netherlands">Netherlands</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>House Number*</label>
                                            <input type="text" name="house_number" id="house_number" value="{{$TheOrder->house_number}}" class="form-control" placeholder="House Number" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-md-0">
                                            <label>Bus Number</label>
                                            <input type="text" name="bus_number" id="bus_number" value="{{$TheOrder->bus_number}}" class="form-control" placeholder="Bus Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('checkout.town')*</label>
                                            <input type="text" name="city" id="towncity" value="{{$TheOrder->city}}" class="form-control" placeholder="@lang('checkout.town')" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-md-0">
                                            <label>@lang('checkout.zip_code')*</label>
                                            <input type="text" name="zip_code" id="zippostalcode" value="{{$TheOrder->zip_code}}" class="form-control" placeholder="@lang('checkout.zip_code')" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mt-3">
                                            <label>@lang('checkout.add_notes')</label>
                                            <textarea class="form-control" name="order_notes" id="notes" rows="6" placeholder="@lang('checkout.add_notes')">{{$TheOrder->order_notes}}</textarea>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 mt-5 mt-lg-0">
                            <div class="border bg-light-4 p-3 p-lg-5">
                                <div class="mb-7">
                                    <h6 class="mb-3 font-w-6">@lang('checkout.your_order')</h6>
                                    <ul class="list-unstyled">
                                        @forelse($OrderItems as $OrderItem)
                                        <li class="mb-3 border-bottom pb-3 d-flex">
                                            <span class="mr-auto"> {{$OrderItem->qty}} x {{$OrderItem->Product->title}}
                                            </span>
                                            <span>{{$OrderItem->TotalPrice}} €</span>
                                        </li>
                                        @empty
                                        <li>@lang('layout.cart_empty')</li>
                                        @endforelse
                                        <li class="mb-3 border-bottom pb-3 d-flex">
                                            <span class="mr-auto"> @lang('checkout.shipping')</span>
                                            <span>{{getShippingValue($SubTotal)}} €</span>
                                        </li>
                                        {{-- <li class="mb-3 border-bottom pb-3 d-flex">
                                            <span class="mr-auto"> @lang('layout.subtotal')</span>
                                            <span>{{$Total}} €</span>
                                        </li> --}}
                                        <li class="d-flex">
                                            <span class="mr-auto"><strong class="cart-total"> @lang('checkout.total')</strong></span>
                                            <strong class="cart-total">{{$SubTotal}} €</strong>
                                        </li>
                                    </ul>
                                </div>
                                <div class="cart-detail my-5">
                                    <h6 class="mb-3 font-w-6">@lang('checkout.payment_method')</h6>
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="credit-card" name="payment_method" value="creditcard" class="custom-control-input">
                                            <label class="custom-control-label" for="credit-card">Credit Card</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="bancontact" name="payment_method" value="bancontact"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="bancontact">Bancontact</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="ideal" name="payment_method" value="ideal"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="ideal">iDEAL</label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="accepted_toc" class="custom-control-input" id="accepted_toc" required>
                                            <label class="custom-control-label" for="accepted_toc">@lang('checkout.terms')</label>
                                        </div>
                                    </div>
                                </div>
                                <button
                                    class="btn btn-primary btn-animated btn-block">@lang('checkout.porceed_to_payment')</button>
                                </form>
                                <p class="text-primary mt-4"><i class="fas fa-truck"></i> @lang('products.delivery_notice')</p>
                                <p class="text-success mt-4"><i class="fas fa-lock"></i> Secure Payments By Mollie</p>
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
        $('select[name="type"]').change(function () {
            if ($(this).val() == 'Company') {
                $('#company-feilds').removeClass('d-none');
            } else {
                $('#company-feilds').addClass('d-none');
            }
        });
    </script>
</body>
</html>
