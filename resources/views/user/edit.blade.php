@include('layout.header' , [
    'PageTitle' => __('user.edit_title')
])
<body class="no-touch">
    @include('layout.tag-manager')
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NGHPW7N" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
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
                        <div class="col-9">
                            <div class="edit-profile-form">
                                <h3>@lang('user.edit_title')</h3>
                                <form method="post" action="#" enctype="multipart/form-data">
                                    @csrf
                                    <label>@lang('user.name'):</label>
                                    <input class="form-control" type="text" placeholder="@lang('user.name')" name="name" value="{{auth()->user()->name}}" required>
                                    <br>
                                    <label>@lang('user.email'):</label>
                                    <input class="form-control" type="email" placeholder="@lang('user.email')" name="email" value="{{auth()->user()->email}}" required>
                                    <br>
                                    <label>@lang('user.image'):</label>
                                    <input class="form-control" type="file" name="image">
                                    <br>
                                    <label>@lang('user.phone'):</label>
                                    <input class="form-control" type="text" placeholder="@lang('user.phone')" name="phone" value="{{auth()->user()->phone}}">
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