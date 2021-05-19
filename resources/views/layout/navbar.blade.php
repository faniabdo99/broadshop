  <!--header start-->
  <header class="site-header header-5">
    <div class="header-top bg-blue pt-1">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <ul class="header_list">
              <li><a href="#"><i class="icon fa fa-truck"></i> FREE shipping for orders above 50€</a></li>
            </ul>
          </div>
          <div class="col-md-8">
            <div class="row justify-content-end">
              <div class="language-selection font-w-3">
                <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                  <div class="lng_dropdown">
                    <select name="countries" class="custome_select">
                      <option value='en'>English</option>
                      <option value='nl'>Dutchland</option>
                    </select>
                  </div>
                </div>
              </div>
              <ul class="header_list">
                @auth 
                <li><a href="{{route('user.signout')}}"><i class="icon fa fa-sign-out-alt"></i><span>Logout</span></a></li>
                <li><a href="wishlist.html"><i class="icon fa fa-heart"></i><span>My Wishlist</span></a></li>
                <li><a href="{{route('user.getProfile')}}"><i class="icon fa fa-user"></i><span>Welcome, {{auth()->user()->name}}</span></a></li>
                @endauth
                @guest
                <li><a href="{{route('user.getSignin')}}"><i class="icon fa fa-lock"></i><span>Signin</span></a></li>
                @endguest
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="py-md-4 py-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-3 d-none d-md-flex align-items-center"> <a class="navbar-brand logo d-none d-lg-block" href="{{route('home')}}"> <img class="img-fluid" src="{{url('public')}}/images/footer-logo.png" alt=""> </a> </div>
          <div class="col-md-8 col-lg-7 col-sm-10 col-10">
            <div class="right-nav align-items-center d-flex justify-content-end">
              <form class="form-inline w-100">
                <select class="custom-select rounded-left form-control d-none d-lg-inline d-md-inline">
                  <option selected>All Categories</option>
                  <option value="1">Men</option>
                  <option value="2">Women</option>
                  <option value="3">Kids</option>
                </select>
                <input class="form-control border-0 rounded-0 border-left col" type="search" placeholder="Enter Your Keyword" aria-label="Search">
                <button class="btn btn-yellow text-white col-auto rounded-right" type="submit"><i class="fa fa-search" aria-hidden="true"></i> </button>
              </form>
            </div>
          </div>
          <div class="col-md-4 col-lg-2 col-sm-2 col-2 pl-0">
            <div class="dropdown cart_dropdown"> <a class="d-flex align-items-center cart-d" href="#"> <span class="px-2 py-1 rounded" data-cart-items="2"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> </span>
              <div class="ml-2 d-none d-md-block cart-details"> <span class="text-white"><span class="label">Cart -</span> $752.00</span> </div>
              </a>
              <div class="cart_box dropdown-menu dropdown-menu-right">
                <ul class="cart_list">
                  <li> <a href="#" class="item_remove"><i class="ion-ios-close-empty"></i></a> <a href="#"><img src="{{url('public')}}/images/product-thumb/p3.jpg" alt="cart_thumb1">Variable product 001</a> <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>78.00</span> </li>
                  <li> <a href="#" class="item_remove"><i class="ion-ios-close-empty"></i></a> <a href="#"><img src="{{url('public')}}/images/product-thumb/p6.jpg" alt="cart_thumb2">Ornare sed consequat</a> <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>81.00</span> </li>
                </ul>
                <div class="cart_footer">
                  <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">$</span></span>159.00</p>
                  <p class="cart_buttons"><a href="#" class="btn btn-secondary view-cart ml-2 mr-2">View Cart</a><a href="#" class="btn btn-yellow-dark ml-2 mr-2 checkout">Checkout</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="header-wrap" class="shadow-sm">
      <div class="container">
        <div class="row m-0"> 
          <!--menu start-->
          <div class="col p-0">
            <nav class="navbar navbar-expand-lg navbar-light position-static"> <a class="navbar-brand logo d-lg-none" href="index.html"> <img class="img-fluid" src="{{url('public')}}/images/footer-logo.png" alt=""> </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item"> <a class="nav-link" href="{{route('home')}}" data-toggle="dropdown">Home</a></li>
                  <li class="nav-item dropdown position-static"> <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Categories</a>
                    <div class="dropdown-menu w-100"> 
                      <!-- Tabs -->
                      <div class="container p-0">
                        <div class="row w-100 no-gutters">
                          <div class="col-lg-8 p-lg-3">
                            <div class="row">
                              <div class="col-12 col-md-3 col-sm-6"> 
                                <!-- Heading -->
                                <div class="mb-2 font-w-5 text-link">Clothing</div>
                                <!-- Links -->
                                <ul class="list-unstyled mb-6 mb-md-0">
                                  <li> <a href="#">Western Wear</a></li>
                                  <li> <a href="#">Fitness &amp; Outdoors</a></li>
                                  <li> <a href="#">Ethnic Wear</a></li>
                                  <li> <a href="#">Beach Clothing</a></li>
                                  <li> <a href="#">Swimsuits</a></li>
                                  <li> <a href="#">Casual Dresses</a></li>
                                  <li> <a href="#">Raincoats</a></li>
                                  <li> <a href="#">Maternity</a></li>
                                  <li> <a href="#">Lingerie</a></li>
                                  <li> <a href="#">Sleep &amp; Lounge Wear</a></li>
                                </ul>
                              </div>
                              <div class="col-12 col-md-3 col-sm-6"> 
                                <!-- Heading -->
                                <div class="mb-2 font-w-5 text-link">Accessories</div>
                                <!-- Links -->
                                <ul class="list-unstyled mb-6 mb-md-0">
                                  <li> <a href="#">Caps &amp; Hats</a> </li>
                                  <li> <a href="#">Gloves &amp; Warmers</a></li>
                                  <li> <a href="#">Earmuffs</a></li>
                                  <li> <a href="#">Handkerchiefs</a></li>
                                  <li> <a href="#">Shawls</a></li>
                                  <li> <a href="#">Belts</a></li>
                                  <li> <a href="#">Suspenders</a></li>
                                  <li> <a href="#">Wallets</a></li>
                                  <li> <a href="#">Pocket Squares</a></li>
                                  <li> <a href="#">Watches</a></li>
                                </ul>
                              </div>
                              <div class="col-12 col-md-3 col-sm-6"> 
                                <!-- Heading -->
                                <div class="mb-2 font-w-5 text-link">Jwellery</div>
                                <!-- Links -->
                                <ul class="list-unstyled mb-6 mb-md-0">
                                  <li> <a href="#">Earrings</a> </li>
                                  <li> <a href="#">Chains &amp; Necklaces</a></li>
                                  <li> <a href="#">Bangles &amp; Bracelets</a></li>
                                  <li> <a href="#">Pendants</a></li>
                                  <li> <a href="#">Anklets</a></li>
                                  <li> <a href="#">Coins &amp; Bars</a></li>
                                  <li> <a href="#">Nose Rings &amp; Pins</a></li>
                                  <li> <a href="#">Beads &amp; Charms</a></li>
                                  <li> <a href="#">Shirt Accessories</a></li>
                                  <li> <a href="#">Chains</a></li>
                                </ul>
                              </div>
                              <div class="col-12 col-md-3 col-sm-6"> 
                                <!-- Heading -->
                                <div class="mb-2 font-w-5 text-link">Shoes</div>
                                <!-- Links -->
                                <ul class="list-unstyled mb-0">
                                  <li> <a href="#">Running Shoes</a> </li>
                                  <li> <a href="#">Sneakers</a></li>
                                  <li> <a href="#">Loafers &amp; Moccasins</a></li>
                                  <li> <a href="#">Boots</a></li>
                                  <li> <a href="#">Formal Shoes</a></li>
                                  <li> <a href="#">Hiking Footwear</a></li>
                                  <li> <a href="#">Casual Shoes</a></li>
                                  <li> <a href="#">Ethnic Footwear</a></li>
                                  <li> <a href="#">Fashion Slippers</a></li>
                                  <li> <a href="#">Ballet Flats</a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 d-none d-lg-block pr-2"> <img class="img-fluid rounded-bottom rounded-top" src="{{url('public')}}/images/header-img.jpg" alt="..."> </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="nav-item dropdown position-static"> <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Shop</a>
                    <div class="dropdown-menu w-100 custom-drop">
                      <div class="container p-0">
                        <div class="row w-100 no-gutters">
                          <div class="col-12 col-md-4 p-lg-3"> 
                            <!-- Heading -->
                            <div class="mb-2 font-w-5 text-link">Shop Layout</div>
                            <!-- Links -->
                            <ul class="list-unstyled mb-6 mb-md-0">
                              <li> <a href="product-grid.html">Product Grid</a> </li>
                              <li> <a href="product-grid-left-sidebar.html">Product Grid Left Sidebar</a> </li>
                              <li> <a href="product-grid-right-sidebar.html">Product Grid Right Sidebar</a> </li>
                              <li> <a href="product-list.html">Product List</a> </li>
                              <li> <a href="product-list-left-sidebar.html">Product List Left Sidebar</a> </li>
                              <li> <a href="product-list-right-sidebar.html">Product List Right Sidebar</a> </li>

                            </ul>
                          </div>
                          <div class="col-12 col-md-4 p-lg-3"> 
                            <!-- Heading -->
                            <div class="mb-2 font-w-5 text-link">Product Pages</div>
                            <!-- Links -->
                            <ul class="list-unstyled mb-6 mb-md-0">
                              <li> <a href="product-default.html">Product Default</a> </li>
                              <li> <a href="product-default-right-image.html">Product Default Right Image</a> </li>
                              <li> <a href="product-left-image.html">Product Left Image</a> </li>
                              <li> <a href="product-right-image.html">Product Right Image</a> </li>
                              <li> <a href="product-left-sidebar.html">Product Left Sidebar</a> </li>
                              <li> <a href="product-right-sidebar.html">Product Right Sidebar</a> </li>

                            </ul>
                          </div>
                          <div class="col-12 col-md-4 p-lg-3"> 
                            <!-- Heading -->
                            <div class="mb-2 font-w-5 text-link">Other Pages</div>
                            <!-- Links -->
                            <ul class="list-unstyled mb-6 mb-md-0">
                              <li> <a href="shopping-cart.html">Shopping Cart</a> </li>
                              <li> <a href="checkout.html">Checkout</a> </li>
                              <li> <a href="my-account.html">My Account</a> </li>
                              <li> <a href="wishlist.html">Wishlist</a> </li>
                              <li> <a href="compare.html">Compare</a> </li>
                              <li> <a href="order-complete.html">Order Completed</a> </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Pages</a>
                    <ul class="dropdown-menu">
                      <li> <a href="about-us.html">About Us</a> </li>
                      <li> <a href="login.html">Login</a> </li>
                      <li> <a href="signup.html">Signup</a> </li>
                      <li> <a href="forgot-password">Forgot Password</a> </li>
                      <li> <a href="coming-soon.html">Coming Soon</a> </li>
                      <li> <a href="error-404.html">404 Error</a> </li>
                      <li> <a href="faq.html">FAQ</a> </li>
                      <li> <a href="privacy-policy.html">Privacy Policy</a> </li>
                      <li> <a href="terms-and-conditions.html">Term & Conditions</a> </li>
                    </ul>
                  </li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('blog')}}">Blog</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('contactUs')}}">Contact Us</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="about-us.html">About Us</a> </li>
                  <li class="nav-item"> <a class="nav-link text-yellow" href="#">Todays Offer</a> </li>
                </ul>
              </div>
            </nav>
          </div>
          <!--menu end--> 
        </div>
      </div>
    </div>
  </header>
  <!--header end--> 