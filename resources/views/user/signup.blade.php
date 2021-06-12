@include('layout.header' , [
    'PageTitle' => __('user.signup')
])
<body>
    <!-- page wrapper start -->
    <div class="page-wrapper">
        @include('layout.navbar')
        <!--body content start-->
        <div class="page-content">
            <!--login start-->
            <section class="bg-light register">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-10 col-lg-7 col-md-9 shadow p-6 bg-white">
                            <div class="col-lg-12 col-md-12 p-0">
                                <div class="mb-6">
                                    <h2 class="font-w-6">@lang('user.signup')</h2>
                                    <p>@lang('user.signup_text')</p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 ml-auto mr-auto p-0">
                                <div class="register-form text-center">
                                    <form method="post" action="{{route('user.postSignup')}}">
                                        @csrf
                                        <div class="messages"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control" placeholder="@lang('user.name')" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control" placeholder="@lang('user.email')" required>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="phone" class="form-control" placeholder="@lang('user.phone')" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control" placeholder="@lang('user.password')" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="password" name="password_confirmation" class="form-control" placeholder="@lang('user.pass_conf')" required >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-12">
                                                <div class="remember-checkbox clearfix mb-5">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="agree" class="custom-control-input" id="customCheck1" required>
                                                        <label class="custom-control-label" for="customCheck1">@lang('checkout.terms')</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary">@lang('user.signup')</button>
                                                <span class="mt-4 d-block">@lang('user.have_an_account') <a href="{{route('user.getSignin')}}">@lang('user.signin')</a></span>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="another_login"><span> @lang('user.or')</span></div>
                                    <ul class="login-btn list_none text-center">
                                        {{-- <li><a href="#" class="btn facebook-btn"><i class="ion-social-facebook"></i>Facebook</a></li> --}}
                                        <li><a href="{{route('login.social' , 'google')}}" class="btn google-btn"><i class="fab fa-google"></i>@lang('user.signup_google')</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--login end-->
        </div>
        <!--body content end-->
    @include('layout.footer')
    </div>
    @include('layout.parts')
    @include('layout.scripts')
</body>
</html>
