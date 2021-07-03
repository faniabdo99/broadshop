@include('layout.header' , [
    'PageTitle' => __('user.profile')
])
<body class="no-touch">
    @include('layout.tag-manager')
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
                                    <a href="{{route('user.getOrders')}}">
                                        <div class="profile-card">
                                            <i class="fas fa-spinner"></i>
                                            <span class="text-dark"><b>{{auth()->user()->Orders->where('status' , 'Waiting for payment')->count()}}</b><br> @lang('user.action_required')</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="profile-card">
                                        <i class="fas fa-check"></i>
                                        <span><b>{{auth()->user()->Orders->where('status' , 'Complete')->count()}}</b><br> @lang('user.completed_orders')</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5 p-3">
                                <div class="profile-contact-form">
                                    <h3>@lang('static.contact_title')</h3>
                                    <p>@lang('static.contact_description')</p>
                                    <form class="row" method="post" action="{{route('contactUs.post')}}">
                                        @csrf
                                        <div class="form-group col-md-12">
                                            <label>@lang('static.name') <span class="text-danger">*</span></label>
                                            <input id="form_name1" type="text" name="name" class="form-control" placeholder="Name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>@lang('static.email') <span class="text-danger">*</span></label>
                                            <input id="form_email" type="email" name="email" class="form-control" placeholder="Email" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>@lang('static.phone') <span class="text-danger">*</span></label>
                                            <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Phone" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>@lang('static.message') <span class="text-danger">*</span></label>
                                            <textarea id="form_message" name="message" class="form-control" placeholder="Message" rows="4" required ></textarea>
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <button type="submit" class="btn btn-primary btn-animated"><span>@lang('static.submit')</span></button>
                                        </div>
                                    </form>
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