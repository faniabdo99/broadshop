@include('layout.header' , [
    'PageTitle' => __('user.my_orders')
])
<body class="no-touch">
    @include('layout.tag-manager')
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
                                        <th>@lang('user.order')</th>
                                        <th>@lang('user.date')</th>
                                        <th>@lang('user.status')</th>
                                        <th>@lang('user.total')</th>
                                        <th>@lang('user.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse(auth()->user()->Orders as $Order)
                                        <tr>
                                            <td>{{$Order->serial_number}}</td>
                                            <td>{{$Order->created_at->format('Y/m/d')}}</td>
                                            <td>{{$Order->status}}</td>
                                            <td>{{$Order->total_amount}}€ @lang('user.for') {{$Order->Items()->count()}} @lang('user.items')</td>
                                            <td><a href="{{route('checkout.summary' , $Order->id)}}" class="btn btn-fill-out btn-sm">@lang('user.view')</a></td>
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
