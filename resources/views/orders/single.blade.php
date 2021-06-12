@include('layout.header' , [
    'PageTitle' => __('checkout.order') .' #'.$TheOrder->serial_number
])
<body>
    <!-- page wrapper start -->
    <div class="page-wrapper">
      @include('layout.navbar')
        <!--body content start-->
        <div class="page-content">
            <!--login start-->
            <section class="bg-light">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 bg-white p-5">
                            <h3>@lang('checkout.order') #{{$TheOrder->serial_number}}</h3>
                            <br>
                            <table class="table table-striped">
                                <tr>
                                    <th>@lang('checkout.serial_number')</th>
                                    <td>{{$TheOrder->serial_number}}</td>
                                </tr>
                                <tr>
                                    <th>@lang('checkout.status')</th>
                                    <td>{{$TheOrder->status}}</td>
                                </tr>
                                <tr>
                                    <th>@lang('checkout.weight')</th>
                                    <td>{{$TheOrder->order_weight}}</td>
                                </tr>
                                <tr>
                                    <th>@lang('checkout.total')</th>
                                    <td>{{$TheOrder->total_amount}}€</td>
                                </tr>
                                <tr>
                                    <th>@lang('checkout.is_paid')</th>
                                    <td>{{ucfirst($TheOrder->is_paid)}}</td>
                                </tr>
                                <tr>
                                    <th>@lang('checkout.payment_method')</th>
                                    <td>{{$TheOrder->PaymentMethodText}}</td>
                                </tr>
                                <tr>
                                    <th>@lang('checkout.shipping')</th>
                                    <td>{{$TheOrder->total_shipping_cost}}€</td>
                                </tr>
                                <tr>
                                    <th>@lang('checkout.f_name')</th>
                                    <td>{{$TheOrder->first_name}}</td>
                                </tr>
                                <tr>
                                    <th>@lang('checkout.l_name')</th>
                                    <td>{{$TheOrder->last_name}}</td>
                                </tr>
                                <tr>
                                    <th>@lang('checkout.email')</th>
                                    <td>{{$TheOrder->email}}</td>
                                </tr>
                                <tr>
                                    <th>@lang('checkout.phone')</th>
                                    <td>{{$TheOrder->phone_number}}</td>
                                </tr>
                                <tr>
                                    <th>@lang('checkout.shipping_address')</th>
                                    <td>{{$TheOrder->city}}</td>
                                </tr>
                                <tr>
                                    <th>@lang('checkout.second_address')</th>
                                    <td>{{$TheOrder->address}}</td>
                                </tr>
                                @if($TheOrder->address_2)
                                    <tr>
                                        <th>@lang('checkout.town')</th>
                                        <td>{{$TheOrder->address_2}}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <th>@lang('checkout.zip_code')</th>
                                    <td>{{$TheOrder->zip_code}}</td>
                                </tr>
                                @if($TheOrder->order_notes)
                                    <tr>
                                        <th>@lang('checkout.add_notes')</th>
                                        <td>{{$TheOrder->order_notes}}</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!--login end-->
        </div>
        <!--body content end-->
        <!--footer start-->
        @include('layout.footer')
        <!--footer end-->
    </div>
    <!-- page wrapper end -->
    @include('layout.parts')
    @include('layout.scripts')
</body>
</html>