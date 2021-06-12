@include('layout.header' , [
    'PageTitle' => 'About'
])
<body class="bg-light-4">
    <!-- page wrapper start -->
    <div class="page-wrapper">
        @include('layout.navbar')
        <!--body content start-->
        <div class="page-content">
            <section>
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-12 col-lg-6 mb-6 mb-lg-0">
                            <img src="{{url('public/images/about-us.jpg')}}" class="img-fluid rounded shadow" alt="Broadshop">
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="ml-2">
                                <h2 class="font-w-5">@lang('static.about_title')</h2>
                                <p>
                                    @lang('static.about_desc_1')
                                    <br><br>
                                    @lang('static.about_desc_2')
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--our services start-->
            <section class="our-services border-top">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8 col-md-10">
                            <div class="mb-5">
                                <h2 class="mb-0 font-w-6">@lang('static.our_values')</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center mt-5">
                        <div class="col-12 col-lg-4 col-md-4 mb-5 mb-md-0">
                            <i class="fas fa-globe-europe text-primary"></i>
                            <h5 class="font-w-6">@lang('static.value_1')</h5>
                            <p>@lang('static.value_1_desc')</p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 mb-5 mb-md-0">
                            <i class="fas fa-money-bill text-primary"></i>
                            <h5 class="font-w-6">@lang('static.value_2')</h5>
                            <p>@lang('static.value_2_desc')</p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 mb-5 mb-md-0">
                            <i class="fas fa-certificate text-primary"></i>
                            <h5 class="font-w-6">@lang('static.value_3')</h5>
                            <p>@lang('static.value_3_desc')</p>
                        </div>
                    </div>
                    <div class="row text-center mt-0 mt-lg-5 mt-md-5">
                        <div class="col-12 col-lg-4 col-md-4 mb-5 mb-md-0">
                            <i class="fas fa-check text-primary"></i>
                            <h5 class="font-w-6">@lang('static.value_4')</h5>
                            <p>@lang('static.value_4_desc')</p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 mb-5 mb-md-0">
                            <i class="fas fa-truck text-primary"></i>
                            <h5 class="font-w-6">@lang('static.value_5')</h5>
                            <p>@lang('static.value_5_desc')</p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 mb-5 mb-md-0">
                            <i class="fas fa-home text-primary"></i>
                            <h5 class="font-w-6">@lang('static.value_6')</h5>
                            <p>@lang('static.value_6_desc')</p>
                        </div>
                    </div>
                </div>
            </section>
            <!--our services end-->
            <!--testimonails start-->
            <section class="bg-pink-light testimonails custom-pb-0">
                <div class="container text-center">
                    <div class="row justify-content-center">
                        <div class="col-12 pl-10 pr-10">
                            <div class="owl-carousel owl-center owl-2" data-center="true" data-dots="false"
                                data-nav="true" data-items="1" data-md-items="1" data-sm-items="1">
                                <div class="item">
                                    <div class="card p-lg-10 bg-primary-soft border-0">
                                        <div>
                                            <img alt="Image" src="{{url('public/')}}/images/about/thomas.jpg" class="img-fluid rounded-circle d-inline">
                                        </div>
                                        <div class="card-body pl-10 pr-10">
                                            <p class="text-dark font-w-3">@lang('static.testo_1')</p>
                                            <div>
                                                <h6 class="text-primary d-inline mb-0">Thomas Diallo</h6>
                                                <br>
                                                <small class="text-muted">@lang('static.happy_customer')</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card p-lg-10 bg-primary-soft border-0">
                                        <div>
                                            <img alt="Image" src="{{url('public/')}}/images/about/karla.jpg" class="img-fluid rounded-circle d-inline">
                                        </div>
                                        <div class="card-body pl-10 pr-10">
                                            <p class="text-dark font-w-3">@lang('static.testo_2')</p>
                                            <div>
                                                <h6 class="text-primary d-inline mb-0">Karla Anderson </h6>
                                                <br>
                                                <small class="text-muted">@lang('static.happy_customer')</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--testimonails end-->
            @include('includes.newsletter')
        </div>
        <!--body content end-->
        @include('layout.footer')
    </div>
    @include('layout.parts')
    @include('layout.scripts')
</body>
</html>