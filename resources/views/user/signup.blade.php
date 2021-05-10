@include('layout.header')
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
                                    <h2 class="font-w-6">Create New Account</h2>
                                    <p>Welcome to Broadshop, Please create a new account below</p>
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
                                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-12">
                                                <div class="remember-checkbox clearfix mb-5">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="agree" class="custom-control-input" id="customCheck1" required>
                                                        <label class="custom-control-label" for="customCheck1">I agree to the term of use and privacy policy</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary">Create Account</button>
                                                <span class="mt-4 d-block">Have An Account ? <a href="login.html">Sign In!</a></span>
                                            </div>
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
    @include('layout.footer')
    </div>
    @include('layout.parts')
    @include('layout.scripts')
</body>

</html>
