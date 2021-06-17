@include('layout.header' , [
    'PageTitle' => 'Contact us'
])

<body class="bg-light-4 no-touch">
    @include('layout.tag-manager')
    <!-- page wrapper start -->
    <div class="page-wrapper">
        @include('layout.navbar')
        <!--body content start-->
        <div class="page-content">
            <section>
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-lg-7">
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
                        <div class="col-lg-5 mt-6 mt-lg-0">
                            <div class="border-0 rounded p-5 bg-dark-1 contact-info">
                                <div class="d-flex mb-4 border-bottom pb-4">
                                    <div class="mr-2"> <i class="las la-map-marker-alt ic-2x text-primary"></i></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 text-white">@lang('static.contact_1')</h6>
                                        <p class="mb-0">Lange beeldekensstraat 103 Antwerpen 2060</p>
                                    </div>
                                </div>
                                {{-- <div class="d-flex mb-4 border-bottom pb-4">
                                    <div class="mr-2"> <i class="las la-envelope ic-2x text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 text-white">@lang('static.contact_2')</h6>
                                        <a href="#">info@domain.com</a>
                                    </div>
                                </div> --}}
                                <div class="d-flex ">
                                    <div class="mr-2"> <i class="las la-mobile ic-2x text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 text-white">@lang('static.contact_3')</h6>
                                        <a href="#">+32 488 19 88 10</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @include('layout.footer')
    </div>{{url('public/images/logo3.png')}}
    @include('layout.parts')
    @include('layout.scripts')
</body>
</html>