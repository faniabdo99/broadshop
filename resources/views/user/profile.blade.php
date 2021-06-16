@include('layout.header' , [
    'PageTitle' => __('user.profile')
])
<body class="no-touch">
    <!-- page wrapper start -->
    <div class="page-wrapper">
      @include('layout.navbar')
        <!--body content start-->
        <div class="page-content">
            <!--login start-->
            <section class="bg-light">
                <div class="container">
                    <div class="row">
                        @include('user.sidebar')
                        <div class="col-9">
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="profile-card">
                                        <i class="fas fa-shopping-basket"></i>
                                        <span><b>{{auth()->user()->Orders->where('status' , 'Order received')->count()}}</b><br> @lang('user.pending_orders')</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="profile-card">
                                        <i class="fas fa-spinner"></i>
                                        <span><b>{{auth()->user()->Orders->where('status' , 'Waiting for payment')->count()}}</b><br> @lang('user.action_required')</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="profile-card">
                                        <i class="fas fa-check"></i>
                                        <span><b>{{auth()->user()->Orders->where('status' , 'Complete')->count()}}</b><br> @lang('user.completed_orders')</span>
                                    </div>
                                </div>
                            </div>
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