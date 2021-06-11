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
                                <h2 class="font-w-5">About Broadshop</h2>
                                <p>
                                    Welcome to Broadsshop, your number one source for kitchen equipments and electric scooters. We're dedicated to giving you the very best of our products, with a focus on quality, price and enviroment
                                    Founded in 2019, Broadshop has come a long way from its beginnings in a Antwerpen. When we first started out, our passion for helping others to be more eco-friendly, providing the best equipment for affordable price drove us to do intense research and find the best products for the best prices.
                                    <br>
                                    We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.
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
                                <h2 class="mb-0 font-w-6">Our Values</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center mt-5">
                        <div class="col-12 col-lg-4 col-md-4 mb-5 mb-md-0">
                            <i class="fas fa-globe-europe text-primary"></i>
                            <h5 class="font-w-6">Eco-Friendly</h5>
                            <p>Environment-first thinking is what drives us to keep looking for the best products</p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 mb-5 mb-md-0">
                            <i class="fas fa-money-bill text-primary"></i>
                            <h5 class="font-w-6">Affordable Prices</h5>
                            <p>Everyone needs to find high-quality items with the best prices, and that's what we do in Broadshop</p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 mb-5 mb-md-0">
                            <i class="fas fa-certificate text-primary"></i>
                            <h5 class="font-w-6">2 Years Guarantee</h5>
                            <p>2 Years of real guarantee for any product you buy from Braodshop, shop with an ease of mind!</p>
                        </div>
                    </div>
                    <div class="row text-center mt-0 mt-lg-5 mt-md-5">
                        <div class="col-12 col-lg-4 col-md-4 mb-5 mb-md-0">
                            <i class="fas fa-check text-primary"></i>
                            <h5 class="font-w-6">High Quality</h5>
                            <p>Our inspectors take a real responsibility for checking each item quality, any product you buy from Braodshop is 100% guaranteed</p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 mb-5 mb-md-0">
                            <i class="fas fa-truck text-primary"></i>
                            <h5 class="font-w-6">Fast Delivery</h5>
                            <p>We partnered with many big shipping companies to deliver the best and fastest experience for our clients!</p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 mb-5 mb-md-0">
                            <i class="fas fa-home text-primary"></i>
                            <h5 class="font-w-6">From The Neighborhood</h5>
                            <p>We proudly serve our neighborhood! we started here and we will always have many feelings for this city!</p>
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
                                            <p class="text-dark font-w-3">Love it! Broadshop has a wide variatey of products that fit everyone needs.</p>
                                            <div>
                                                <h6 class="text-primary d-inline mb-0">Thomas Diallo</h6>
                                                <br>
                                                <small class="text-muted">Happy Customer</small>
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
                                            <p class="text-dark font-w-3">What is amaizing is how Broadshop solve the hardest equation ever, affordable prices and high quality!</p>
                                            <div>
                                                <h6 class="text-primary d-inline mb-0">Karla Anderson </h6>
                                                <br>
                                                <small class="text-muted">Happy Customer</small>
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