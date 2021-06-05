@include('layout.header')
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
                            <h3>Order #{{$TheOrder->serial_number}}</h3>
                            <br>
                            <table class="table table-striped">
                                <tr>
                                    <th>Serial Number</th>
                                    <td>{{$TheOrder->serial_number}}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{$TheOrder->status}}</td>
                                </tr>
                                <tr>
                                    <th>Order Weight</th>
                                    <td>{{$TheOrder->order_weight}}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>{{$TheOrder->total_amount}}€</td>
                                </tr>
                                <tr>
                                    <th>Is Paid</th>
                                    <td>{{ucfirst($TheOrder->is_paid)}}</td>
                                </tr>
                                <tr>
                                    <th>Payment Method</th>
                                    <td>{{$TheOrder->PaymentMethodText}}</td>
                                </tr>
                                <tr>
                                    <th>Shipping Cost</th>
                                    <td>{{$TheOrder->total_shipping_cost}}€</td>
                                </tr>
                                <tr>
                                    <th>First Name</th>
                                    <td>{{$TheOrder->first_name}}</td>
                                </tr>
                                <tr>
                                    <th>Last Name</th>
                                    <td>{{$TheOrder->last_name}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$TheOrder->email}}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td>{{$TheOrder->phone_number}}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{$TheOrder->city}}</td>
                                </tr>
                                <tr>
                                    <th>Primary Address</th>
                                    <td>{{$TheOrder->address}}</td>
                                </tr>
                                @if($TheOrder->address_2)
                                    <tr>
                                        <th>Secondary Address</th>
                                        <td>{{$TheOrder->address_2}}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <th>ZIP Code</th>
                                    <td>{{$TheOrder->zip_code}}</td>
                                </tr>
                                @if($TheOrder->order_notes)
                                    <tr>
                                        <th>Order Notes</th>
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