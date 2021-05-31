  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NGHPW7N" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
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
              <ul class="header_list">
                <li><a href="#"><img src="{{url('public/icons/uk-flag.png')}}" width="20"> English</a></li>
                @auth 
                <li><a href="{{route('user.wishlist')}}"><i class="icon fa fa-heart"></i><span>My Wishlist</span></a></li>
                <li><a href="{{route('user.getProfile')}}"><i class="icon fa fa-user"></i><span>Welcome, {{auth()->user()->name}}</span></a></li>
                <li><a href="{{route('user.signout')}}"><i class="icon fa fa-sign-out-alt"></i><span>Logout</span></a></li>
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
            <div class="dropdown cart_dropdown">
               <a class="d-flex align-items-center cart-d" href="#">
                <span class="px-2 py-1 rounded" data-cart-items="{{count(userCart())}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                <div class="ml-2 d-none d-md-block cart-details">
                  <span class="text-white"><span class="label">Cart -</span> €{{userCartTotal()}}</span> 
                </div>
              </a>
              <div class="cart_box dropdown-menu dropdown-menu-right">
                <ul class="cart_list">
                  @forelse (userCart() as $NavCartItem)
                  <li>
                    {{-- <a href="#" class="item_remove"><i class="ion-ios-close-empty"></i></a>  --}}
                    <a href="{{route('product.single' , [$NavCartItem->Product->slug , $NavCartItem->Product->id])}}">
                      <img src="{{$NavCartItem->Product->ImagePath}}" alt="{{$NavCartItem->Product->title}}">
                      {{$NavCartItem->Product->title}}
                    </a>
                    <span class="cart_quantity"> {{$NavCartItem->qty}} x <span class="cart_amount">
                    <span class="price_symbole">€</span></span>{{$NavCartItem->total_price}}</span> 
                  </li>
                  @empty
                    <li>There is no items in your cart yet.</li>
                  @endforelse
                </ul>
                <div class="cart_footer">
                  <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">€</span></span>{{userCartTotal()}}</p>
                  <p class="cart_buttons"><a href="{{route('cart')}}" class="btn btn-secondary view-cart ml-2 mr-2">View Cart</a><a href="{{route('checkout')}}" class="btn btn-yellow-dark ml-2 mr-2 checkout">Checkout</a></p>
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
                  <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{route('products')}}">Shop</a> </li>
                  <li class="nav-item"><a class="nav-link" href="{{route('blog')}}">Blog</a> </li>
                  <li class="nav-item"><a class="nav-link" href="{{route('contactUs')}}">Contact Us</a> </li>
                  <li class="nav-item"><a class="nav-link" href="{{route('about')}}">About Us</a> </li>
                  @guest
                    <li class="nav-item"><a class="nav-link" href="{{route('user.getSignin')}}">Signin</a> </li>
                  @endguest
                  <li class="nav-item"><a class="nav-link text-yellow" href="#">Kugoo Scooters</a> </li>
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