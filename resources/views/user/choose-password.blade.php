@include('layout.header' , [
    'PageTitle' => __('user.reset_password_title')
])
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
                                <h4 class="text-center mb-3 font-w-5">@lang('user.reset_password_title')</h4>
                                <form method="post" action="{{route('reset.postChoosePassword')}}">
                                  @csrf                       
                                  <input hidden type="number" name="user_id" value="{{$TheUser->id}}">
                                  <input hidden type="text" name="user_code" value="{{md5($TheUser->code)}}">
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                                <input type="password" name="password" class="form-control" placeholder="@lang('user.new_password')" required>
                                          </div>
                                          <div class="form-group">
                                                <input type="password" name="password_confirmation" class="form-control" placeholder="@lang('user.confirm_password')" required>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                          <button type="submit" class="btn btn-primary">@lang('user.reset_password_title')</button>
                                      </div>
                                  </div>
                                </form>
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