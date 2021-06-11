@include('layout.header' , [
    'PageTitle' => 'Contact us'
])

<body class="bg-light-4">
    <!-- page wrapper start -->
    <div class="page-wrapper">
        @include('layout.navbar')

        <!--hero section start-->

        <section class="bg-light py-6">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="h2 mb-0">Contact Us</h1>
                    </div>
                    <div class="col-md-6 mt-3 mt-md-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-md-end bg-transparent p-0 m-0">
                                <li class="breadcrumb-item"><a class="link-title" href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Contact Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- / .row -->
            </div>
            <!-- / .container -->
        </section>
        <!--hero section end-->
        <!--body content start-->
        <div class="page-content">
            <section>
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-lg-7">
                            <form class="row" method="post" action="{{route('contactUs.post')}}">
                                @csrf
                                <div class="form-group col-md-12">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input id="form_name1" type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email Address <span class="text-danger">*</span></label>
                                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Phone Number <span class="text-danger">*</span></label>
                                    <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Phone" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Message <span class="text-danger">*</span></label>
                                    <textarea id="form_message" name="message" class="form-control" placeholder="Message" rows="4" required ></textarea>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <button type="submit" class="btn btn-primary btn-animated"><span>Submit</span></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-5 mt-6 mt-lg-0">
                            <div class="border-0 rounded p-5 bg-dark-1 contact-info">
                                <div class="d-flex mb-4 border-bottom pb-4">
                                    <div class="mr-2"> <i class="las la-map-marker-alt ic-2x text-primary"></i></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 text-white">We are located here for you</h6>
                                        <p class="mb-0">The Store / Company Location</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-4 border-bottom pb-4">
                                    <div class="mr-2"> <i class="las la-envelope ic-2x text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 text-white">We're here for you! Just get answers</h6>
                                        <a href="#">info@domain.com</a>
                                    </div>
                                </div>
                                <div class="d-flex ">
                                    <div class="mr-2"> <i class="las la-mobile ic-2x text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 text-white">Have any questions? Reach us by phone</h6>
                                        <a href="#">1-800-222-000</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @include('layout.footer')
    </div>
    @include('layout.parts')
    @include('layout.scripts')
</body>
</html>