<div id="cookies-disclaimer">
    <p>@lang('layout.cookies_disclaimer_title')</p>
    <a href="javascript:;" id="agree-cookies-usage">@lang('layout.cookies_disclaimer_cta')</a>
</div>
<!--footer start-->
<footer class="py-7 bg-dark-grey">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5"> 
                <a class="footer-logo text-white h2 mb-0" href="{{route('home')}}">
                    <img class="img-fluid" src="{{url('public')}}/images/logo3.png" alt="Broadshop Logo">
                </a>
                <p class="my-3 text-muted pr-6">@lang('layout.about_us')</p>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a class="text-muted ic-2x" href="https://www.facebook.com/broadshop.be" target="_blank"><i class="la la-facebook"></i></a></li>
                    <li class="list-inline-item"><a class="text-muted ic-2x" href="https://www.instagram.com/broadshop.be" target="_blank"><i class="la la-instagram"></i></a></li>
                </ul>
            </div>
            <div class="col-12 col-lg-7 mt-6 mt-lg-0">
                <div class="row">
                    <div class="col-12 col-sm-4 navbar-white">
                        <h6 class="mb-4 text-white font-w-5 txt-transform">@lang('layout.quick_links')</h6>
                        <ul class="navbar-nav list-unstyled mb-0">
                            <li class="mb-3 nav-item"><a class="nav-link text-muted font-w-4" href="#">@lang('layout.kugoo_scooters')</a></li>
                            <li class="mb-3 nav-item"><a class="nav-link text-muted font-w-4" href="{{route('about')}}">@lang('layout.about')</a></li>
                            <li class="mb-3 nav-item"><a class="nav-link text-muted font-w-4" href="{{route('products')}}">@lang('layout.shop')</a></li>
                            <li class="mb-3 nav-item"><a class="nav-link text-muted font-w-4" href="{{route('blog')}}">@lang('layout.blog')</a></li>
                            <li class="nav-item"><a class="nav-link text-muted font-w-4" href="{{route('contactUs')}}">@lang('layout.contact')</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-8 mt-6 mt-sm-0 navbar-white">
                        <h6 class="mb-4 text-white font-w-5 txt-transform">@lang('layout.address')</h6>
                        <p>Lange beeldekensstraat 103 Antwerpen 2060</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2498.8640256850704!2d4.424285415759473!3d51.22158047958916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTHCsDEzJzE3LjciTiA0wrAyNSczNS4zIkU!5e0!3m2!1sen!2seg!4v1622763403322!5m2!1sen!2seg" class="border-0 w-100" height="200" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-6 light-border">
        <div class="row text-muted align-items-center">
            <div class="col-md-7 font-w-4"><small>@lang('layout.copywrites')</small>
            </div>
            <div class="col-md-5 text-md-right mt-3 mt-md-0">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a href="#">
                            <img class="img-fluid" src="{{url('public')}}/images/pay-icon/01.png" alt="">
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <img class="img-fluid" src="{{url('public')}}/images/pay-icon/02.png" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--footer end-->
<div id="notofication"></div>