@include('admin.layout.header')
<style media="screen">
.print-table{display: none;}
</style>
<style media="print">
  .print-table{display: block; width: 100%;}
  .page-container,.sidebar{display: none;}
</style>
<body class="app">
        <div class="print-table p-5">
          <p class="mb-0"><b>Order Id :</b> {{$TheOrder->serial_number}}</p>
          <p class="mb-0"><b>Total Products :</b> {{$TheOrder->Items()->sum('qty')}}</p>
          
          <table class="table table-striped">
              <thead>
                <th>Image</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Product Link</th>
              </thead>
              <tbody>
                @forelse($TheOrder->Items() as $Item)
                  <tr>
                    <td><img src="{{$Item->Product->ImagePath}}" width="50" height="50"></td>
                    <td>{{$Item->Product->title}}</td>
                    <td>{{$Item->qty}}</td>
                    <td><a href="{{route('product.single' , [$Item->Product->slug , $Item->Product->id])}}" target="_blank">Click Here</a></td>
                  </tr>
                @empty
                <p>There is no items in this order</p>
                @endforelse

              </tbody>
            </table>
        </div>
        @include('admin.layout.sidebar')
        <div class="page-container">
            @include('admin.layout.navbar')
            <main class="main-content bgc-grey-100 mb-5">
                <div id="mainContent">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h2>Order Details: <b>{{$TheOrder->serial_number}}</b></h2>
                                <div class="bgc-white p-20 bd mb-5">
                                    <h6>Order Items ({{$TheOrder->Items()->count()}})</h6>
                                    <table class="table table-striped">
                                      <thead>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Product Link</th>
                                      </thead>
                                      <tbody>
                                        @forelse($TheOrder->Items() as $Item)
                                          <tr>
                                            <td><img src="{{$Item->Product->MainImage}}" width="50" height="50"></td>
                                            <td>{{$Item->Product->title}}</td>
                                            <td>{{$Item->qty}}</td>
                                            <td><a href="{{route('product.single' , [$Item->Product->id , $Item->Product->slug])}}" target="_blank">Click Here</a></td>
                                          </tr>
                                        @empty
                                        <p>There is no items in this order</p>
                                        @endforelse

                                      </tbody>
                                    </table>
                                    <button onclick="window.print();">Print The List</button>
                                </div>
                                <div class="bgc-white p-20 bd mb-5">
                                    <h6>Customer Data</h6>
                                    <p class="mb-0"><b>First Name :</b> {{$TheOrder->first_name}}</p>
                                    <p class="mb-0"><b>Last Name :</b> {{$TheOrder->last_name}}</p>
                                    <p class="mb-0"><b>Company Name :</b> {{$TheOrder->company_name ?? 'N/A'}}</p>
                                    <p class="mb-0"><b>VAT Number :</b> {{$TheOrder->vat_number ?? 'N/A'}}</p>
                                    <p class="mb-0"><b>VAT Valid :</b> {{$TheOrder->is_vat_valid}}</p>
                                    <p class="mb-0"><b>Email :</b> {{$TheOrder->email}}</p>
                                    <p class="mb-0"><b>Phone Number :</b> {{$TheOrder->phone_number}}</p>
                                    <p class="mb-0"><b>is Registerd ?</b> @if(preg_match("/[a-z]/i",
                                        $TheOrder->user_id)) No @else Yes @endif</p>
                                </div>
                                <div class="bgc-white p-20 bd mb-5">
                                    <h6>Shipping Data</h6>
                                    <p class="mb-0"><b>City :</b> {{$TheOrder->city}}</p>
                                    <p class="mb-0"><b>Address 1 :</b> {{$TheOrder->address}}</p>
                                    <p class="mb-0"><b>Address 2 :</b> {{$TheOrder->address_2 ?? 'N/A'}}</p>
                                    <p class="mb-0"><b>ZIP Code :</b> {{$TheOrder->zip_code}}</p>
                                </div>
                                <div class="bgc-white p-20 bd mb-5">
                                    <h6>Payment Data</h6>
                                    <p class="mb-0"><b>Transaction ID :</b> {{$TheOrder->payment_id ?? 'N/A'}}</p>
                                    <p class="mb-0"><b>Status :</b> {{$TheOrder->is_paid}}</p>
                                    <p class="mb-0"><b>Method :</b> {{$TheOrder->payment_method}}</p>
                                    <p class="mb-0"><b>Total Paid :</b>{{formatPrice($TheOrder->final_total).getCurrency()['symbole']}}</p>
                                    <p class="mb-0"><b>Order Tax :</b>{{formatPrice($TheOrder->total_tax_amount).getCurrency()['symbole']}}</p>
                                    <p class="mb-0"><b>Order Shipping Cost :</b>{{formatPrice($TheOrder->total_shipping_cost + $TheOrder->total_shipping_tax).getCurrency()['symbole']}}</p>
                                </div>
                                <div class="bgc-white p-20 bd mb-5">
                                    <h6>Additional Data</h6>
                                    <p class="mb-0"><b>Order Weight :</b> {{$TheOrder->order_weight}}</p>
                                    <p class="mb-0"><b>Order Additional Notes :</b><br>
                                        {{$TheOrder->order_notes ?? 'N/A'}}
                                    </p>
                                </div>
                                <form class="mb-5" action="{{route('admin.orders.updateStatus' , $TheOrder->id)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Order Status *</label>
                                        <select name="order_status" class="form-control" required>
                                            <option value="">Choose Order Status</option>
                                            <option value="Order received">Order received</option>
                                            <option value="Waiting for payment">Waiting for payment</option>
                                            <option value="Payment received">Payment received</option>
                                            <option value="Processing">Processing order</option>
                                            <option value="Products sent">Order shipped</option>
                                            <option value="Complete">Complete</option>
                                            <option value="Cancelled">Cancelled</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                      <label>Tracink Link *</label>
                                      <input name="tracking_link" type="url" class="form-control" placeholder="Enter The Tracink Link Here" />
                                    </div>
                                    <p>Take Note, After Updating the Status an Email Will Be Sent to {{$TheOrder->email}}</p>
                                    <button type="submit" class="btn btn-success">Update Order Status</button>
                                </form>
                                {{-- <a href="{{route('invoice.generate.get' , $TheOrder->id)}}" class="btn btn-primary">Generate Invoice</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    @include('admin.layout.scripts')
</body>

</html>
