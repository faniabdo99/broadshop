@include('layout.header' , [
    'PageTitle' => __('user.update_password_title')
])
<body class="no-touch">
    @include('layout.tag-manager')
    <!-- page wrapper start -->
    <div class="page-wrapper">
      @include('layout.navbar')
        <!--body content start-->
        <div class="page-content">
            <!--login start-->
            <section class="bg-light">
                <div class="container">
                    <div class="row">
                        @include('user.sidebar')
                        <div class="col-lg-9 col-12">
                            <div class="edit-profile-form">
                                <h3>@lang('user.update_password_title')</h3>
                                <form method="post" action="#">
                                    @csrf
                                    <label>@lang('user.current_password'):</label>
                                    <input class="form-control" type="password" name="current_pass" placeholder="@lang('user.current_password')" required>
                                    <br>
                                    <label>@lang('user.new_password'):</label>
                                    <input class="form-control" type="password" name="password" placeholder="@lang('user.new_password')" required>
                                    <br>
                                    <label>@lang('user.confirm_password'):</label>
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="@lang('user.confirm_password')" required>
                                    <br>
                                    <button type="submit" class="btn btn-primary">@lang('user.submit')</button>
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