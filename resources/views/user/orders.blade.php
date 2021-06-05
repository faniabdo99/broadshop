@include('layout.header')
<body>
    <!-- page wrapper start -->
    <div class="page-wrapper">
        @include('layout.navbar')
        <!--body content start-->
        <div class="page-content">
          <section class="bg-light">
              <div class="container">
                    <div class="row">
                        @include('user.sidebar')
                        <div class="col-lg-9 col-md-8 mt-5 mt-lg-0 mt-md-0">
                          <div class="table-responsive bg-white">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse(auth()->user()->Orders as $Order)
                                        <tr>
                                            <td>{{$Order->serial_number}}</td>
                                            <td>{{$Order->created_at->format('Y/m/d')}}</td>
                                            <td>{{$Order->status}}</td>
                                            <td>{{$Order->total_amount}}€ for {{$Order->Items()->count()}} items</td>
                                            <td><a href="{{route('checkout.summary' , $Order->id)}}" class="btn btn-fill-out btn-sm">View</a></td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!--body content end-->
        @include('layout.footer')
    </div>
    <!-- page wrapper end -->
    @include('layout.parts')
    @include('layout.scripts')
</body>
</html>
