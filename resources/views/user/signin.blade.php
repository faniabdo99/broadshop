@include('layout.header')
<body>
    <!-- page wrapper start -->
    <div class="page-wrapper">
      @include('layout.navbar')
        <!--body content start-->
        <div class="page-content">
            <!--login start-->
            <section class="bg-light">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6 col-md-8 col-sm-11">
                            <div class="shadow p-6 login bg-white">
                                <h4 class="text-center mb-3 font-w-5">Customer Signin</h4>
                                <form method="post" action="{{route('user.postSignin')}}">
                                  @csrf                       
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
                                              <input type="password" name="password" class="form-control" placeholder="Password" required>
                                          </div>
                                      </div>
                                  </div>
                                    <div class="form-group mt-4 mb-5">
                                        <div class="remember-checkbox d-flex align-items-center justify-content-between">
                                            <div class="checkbox">
                                                <input type="checkbox" id="check2" name="remember" value="1">
                                                <label for="check2">Remember me</label>
                                            </div>
                                            <a href="{{route('user.getReset')}}">Forgot Password?</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                          <button type="submit" class="btn btn-primary">Signin</button>
                                      </div>
                                  </div>
                                </form>
                                <div class="another_login"><span> or</span></div>
                                <ul class="login-btn list_none text-center">
                                    <li><a href="#" class="btn facebook-btn"><i
                                                class="ion-social-facebook"></i>Facebook</a></li>
                                    <li><a href="#" class="btn google-btn"><i
                                                class="ion-social-googleplus"></i>Google</a></li>
                                </ul>
                                <div class="d-flex align-items-center text-center justify-content-center mt-4">
                                    <span class="text-muted mr-1">Don't have an account?</span>
                                    <a href="{{route('user.getSignup')}}">Sign Up</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--login end-->
        </div>
        <!--body content end-->
        <!--footer start-->
        @include('layout.footer')
        <!--footer end-->
    </div>
    <!-- page wrapper end -->
    @include('layout.parts')
    @include('layout.scripts')
</body>
</html>