@include('layout.header')

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
                            <img src="{{url('public/images/logo3.png')}}" class="img-fluid rounded shadow" alt="...">
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="ml-2">
                                <h2 class="font-w-5">About Our Fashion Store</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est
                                    tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis
                                    justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id
                                    nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum
                                    metus feugiat sem, quis fermentum turpis eros eget velit.</p>
                                <p>
                                    Donec ac tempus ante. Fusce ultricies massa massa. Mauris vel tellus non nunc mattis
                                    lobortis. </p>
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
                                <h2 class="mb-0 font-w-6">Our Services</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row text-center mt-5">
                        <div class="col-12 col-lg-4 col-md-4 mb-5 mb-md-0">
                            <i class="las la-palette text-primary"></i>
                            <h5 class="font-w-6">Graphic</h5>
                            <p>Fusce ac odio odio. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus.</p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 mb-5 mb-md-0">
                            <i class="las la-life-ring text-primary"></i>
                            <h5 class="font-w-6">Support</h5>
                            <p>Fusce ac odio odio. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus.</p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 mb-5 mb-md-0">
                            <i class="las la-bullhorn text-primary"></i>
                            <h5 class="font-w-6">Marketing</h5>
                            <p>Fusce ac odio odio. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus.</p>
                        </div>
                    </div>
                    <div class="row text-center mt-0 mt-lg-5 mt-md-5">
                        <div class="col-12 col-lg-4 col-md-4 mb-5 mb-md-0">
                            <i class="las la-globe-africa text-primary"></i>
                            <h5 class="font-w-6">Web Design</h5>
                            <p>Fusce ac odio odio. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus.</p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 mb-5 mb-md-0">
                            <i class="las la-camera text-primary"></i>
                            <h5 class="font-w-6">Photography</h5>
                            <p>Fusce ac odio odio. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus.</p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 mb-5 mb-md-0">
                            <i class="las la-tshirt text-primary"></i>
                            <h5 class="font-w-6">Fashion</h5>
                            <p>Fusce ac odio odio. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus.</p>
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
                                            <img alt="Image" src="assets/images/thumbnail/member2.png"
                                                class="img-fluid rounded-circle d-inline">
                                        </div>
                                        <div class="card-body pl-10 pr-10">
                                            <p class="text-dark font-w-3">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Nam fringilla auguest tristique auctor. placerat a
                                                condimentum diam mollis. Ut pulvinar neque eget massa dapibus dolor.</p>
                                            <div>
                                                <h6 class="text-primary d-inline mb-0">John Smith </h6>
                                                <small class="text-muted">- Happy Customer</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card p-lg-10 bg-primary-soft border-0">
                                        <div>
                                            <img alt="Image" src="assets/images/thumbnail/member1.png"
                                                class="img-fluid rounded-circle d-inline">
                                        </div>
                                        <div class="card-body pl-10 pr-10">
                                            <p class="text-dark font-w-3">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Nam fringilla auguest tristique auctor. placerat a
                                                condimentum diam mollis. Ut pulvinar neque eget massa dapibus dolor.</p>
                                            <div>
                                                <h6 class="text-primary d-inline mb-0">Karla Anderson </h6>
                                                <small class="text-muted">- Happy Customer</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="card p-lg-10 bg-primary-soft border-0">
                                        <div>
                                            <img alt="Image" src="assets/images/thumbnail/member3.png"
                                                class="img-fluid rounded-circle d-inline">
                                        </div>
                                        <div class="card-body pl-10 pr-10">
                                            <p class="text-dark font-w-3">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Nam fringilla auguest tristique auctor. placerat a
                                                condimentum diam mollis. Ut pulvinar neque eget massa dapibus dolor.</p>
                                            <div>
                                                <h6 class="text-primary d-inline mb-0">Stephen Doe </h6>
                                                <small class="text-muted">- Happy Customer</small>
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


            <!--our services start-->
            <section class="our-team border-bottom">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8 col-md-10">
                            <div class="mb-5">
                                <h2 class="mb-0 font-w-6">Our Team</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col-12 col-lg-3 col-md-6">
                            <img src="assets/images/thumbnail/member1.png" alt="Image">
                            <h5 class="font-w-5">John Smith</h5>
                            <span>Creative Director</span>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a class="text-muted ic-2x" href="#"><i
                                            class="la la-facebook"></i></a> </li>
                                <li class="list-inline-item"><a class="text-muted ic-2x" href="#"><i
                                            class="la la-dribbble"></i></a> </li>
                                <li class="list-inline-item"><a class="text-muted ic-2x" href="#"><i
                                            class="la la-instagram"></i></a> </li>
                                <li class="list-inline-item"><a class="text-muted ic-2x" href="#"><i
                                            class="la la-twitter"></i></a> </li>
                                <li class="list-inline-item"><a class="text-muted ic-2x" href="#"><i
                                            class="la la-linkedin"></i></a> </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-3 col-md-6">
                            <img src="assets/images/thumbnail/member2.png" alt="Image">
                            <h5 class="font-w-5">Karla Anderson </h5>
                            <span>Junior Developer</span>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a class="text-muted ic-2x" href="#"><i
                                            class="la la-facebook"></i></a> </li>
                                <li class="list-inline-item"><a class="text-muted ic-2x" href="#"><i
                                            class="la la-dribbble"></i></a> </li>
                                <li class="list-inline-item"><a class="text-muted ic-2x" href="#"><i
                                            class="la la-instagram"></i></a> </li>
                                <li class="list-inline-item"><a class="text-muted ic-2x" href="#"><i
                                            class="la la-twitter"></i></a> </li>
                                <li class="list-inline-item"><a class="text-muted ic-2x" href="#"><i
                                            class="la la-linkedin"></i></a> </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-3 col-md-6">
                            <img src="assets/images/thumbnail/member3.png" alt="Image">
                            <h5 class="font-w-5">Stephen Doe </h5>
                            <span>Junior Designer</span>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a class="text-muted ic-2x" href="#"><i
                                            class="la la-facebook"></i></a> </li>
                                <li class="list-inline-item"><a class="text-muted ic-2x" href="#"><i
                                            class="la la-dribbble"></i></a> </li>
                                <li class="list-inline-item"><a class="text-muted ic-2x" href="#"><i
                                            class="la la-instagram"></i></a> </li>
                                <li class="list-inline-item"><a class="text-muted ic-2x" href="#"><i
                                            class="la la-twitter"></i></a> </li>
                                <li class="list-inline-item"><a class="text-muted ic-2x" href="#"><i
                                            class="la la-linkedin"></i></a> </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-3 col-md-6">
                            <img src="assets/images/thumbnail/member1.png" alt="Image">
                            <h5 class="font-w-5">Sarha Smith</h5>
                            <span>Junior Artist</span>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a class="text-muted ic-2x" href="#"><i
                                            class="la la-facebook"></i></a> </li>
                                <li class="list-inline-item"><a class="text-muted ic-2x" href="#"><i
                                            class="la la-dribbble"></i></a> </li>
                                <li class="list-inline-item"><a class="text-muted ic-2x" href="#"><i
                                            class="la la-instagram"></i></a> </li>
                                <li class="list-inline-item"><a class="text-muted ic-2x" href="#"><i
                                            class="la la-twitter"></i></a> </li>
                                <li class="list-inline-item"><a class="text-muted ic-2x" href="#"><i
                                            class="la la-linkedin"></i></a> </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </section>

            <!--our services end-->



            <!--blog start-->

            <section>
                <div class="container">
                    <div class="row justify-content-center text-center mb-5">
                        <div class="col-12 col-md-10 col-lg-8">
                            <div>
                                <h2 class="mb-0 font-w-6">Latest From Blog</h2>
                            </div>
                        </div>
                    </div>
                    <!-- / .row -->
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <!-- Blog Card -->
                            <div class="card border-0 bg-transparent">
                                <div class="position-relative rounded overflow-hidden">
                                    <div
                                        class="position-absolute z-index-1 bg-white text-pink text-center py-1 px-3 my-4">
                                        12 Jul</div>
                                    <img class="card-img-top hover-zoom" src="assets/images/blog/01.jpg" alt="Image">
                                </div>
                                <div class="card-body px-0 pb-0">
                                    <div> <a class="d-inline-block link-title btn-link text-small" href="#">Shoes,</a>
                                        <a class="d-inline-block link-title btn-link text-small" href="#">Dresses,</a>
                                        <a class="d-inline-block link-title btn-link text-small" href="#">Womens</a>
                                    </div>
                                    <h2 class="h5 font-w-5 mt-2 mb-0"> <a class="link-title"
                                            href="blog-single.html">Powerful and flexible premium Ecommerce themes</a>
                                    </h2>
                                </div>
                                <div></div>
                            </div>
                            <!-- End Blog Card -->
                        </div>
                        <div class="col-12 col-lg-4 mt-5 mt-lg-0">
                            <!-- Blog Card -->
                            <div class="card border-0 bg-transparent">
                                <div class="position-absolute z-index-1 bg-white text-pink text-center py-1 px-3 my-4">
                                    09 Mar</div>
                                <video id="clip1" class="rounded" width="100%" muted="" autoplay preload="" loop
                                    poster="assets/images/blog/video-image.jpg" style="object-fit: cover; min-height:240px;z-index: -100;">
                                    <source src="assets/images/blog/fashion-videos.mp4" type="video/mp4">
                                </video>
                                <div class="card-body px-0 pb-0">
                                    <div> <a class="d-inline-block link-title btn-link text-small"
                                            href="#">Clothing,</a> <a
                                            class="d-inline-block link-title btn-link text-small" href="#">Footwear,</a>
                                        <a class="d-inline-block link-title btn-link text-small"
                                            href="#">Accessories</a> </div>
                                    <h2 class="h5 font-w-5 mt-2"> <a class="link-title" href="blog-single.html">Premium
                                            template with unlimited colours, and fully Customizable</a> </h2>
                                </div>
                                <div></div>
                            </div>
                            <!-- End Blog Card -->
                        </div>
                        <div class="col-12 col-lg-4 mt-5 mt-lg-0">
                            <!-- Blog Card -->
                            <div class="card border-0 bg-transparent">
                                <div class="position-relative rounded overflow-hidden bg-light-4">
                                    <div
                                        class="position-absolute z-index-1 bg-white text-pink text-center py-1 px-3 my-4">
                                        27 Feb</div>
                                    <div class="loader-container">
                                        <div class="rectangle-1"></div>
                                        <div class="rectangle-2"></div>
                                        <div class="rectangle-3"></div>
                                        <div class="rectangle-4"></div>
                                        <div class="rectangle-5"></div>
                                        <div class="rectangle-6"></div>
                                        <div class="rectangle-5"></div>
                                        <div class="rectangle-4"></div>
                                        <div class="rectangle-3"></div>
                                        <div class="rectangle-2"></div>
                                        <div class="rectangle-1"></div>
                                    </div>
                                    <audio controls autoplay style="object-fit: cover; min-width:350px">
                                        <source src="assets/images/blog/audio.mp3" type="audio/mpeg">
                                    </audio>
                                </div>
                                <div class="card-body px-0 pb-0">
                                    <div> <a class="d-inline-block link-title btn-link text-small"
                                            href="#">Sleepwear,</a> <a
                                            class="d-inline-block link-title btn-link text-small" href="#">Jwellery,</a>
                                        <a class="d-inline-block link-title btn-link text-small" href="#">Fashion</a>
                                    </div>
                                    <h2 class="h5 font-w-5 mt-2"> <a class="link-title" href="blog-single.html">Awesome
                                            template with lot's of features on the board!</a> </h2>
                                </div>
                                <div></div>
                            </div>
                            <!-- End Blog Card -->
                        </div>
                    </div>
                </div>
            </section>

            <!--blog end-->


            <!--multi sec start-->

            <section class="bg-pink py-9 position-relative overflow-hidden">
                <div class="container">
                    <div class="row justify-content-center text-center mb-1">
                        <div class="col-lg-6 col-md-10">
                            <div class="mb-4">
                                <h2 class="mb-0">Be the first and get weekly updates</h2>
                            </div>
                            <div class="subscribe-form">
                                <form id="mc-form" class="row align-items-center no-gutters mb-3">
                                    <div class="col">
                                        <input value="" name="EMAIL" class="email form-control input-2 bg-white"
                                            id="mc-email" placeholder="Email Address" required type="email">
                                    </div>
                                    <div class="col-auto">
                                        <input class="btn dark-btn overflow-auto" name="subscribe" value="Subscribe"
                                            type="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--multi sec end-->

        </div>
        <!--body content end-->
        @include('layout.footer')
    </div>
    @include('layout.parts')
    @include('layout.scripts')
</body>
</html>