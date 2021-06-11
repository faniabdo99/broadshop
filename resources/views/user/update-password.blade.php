@include('layout.header' , [
    'PageTitle' => 'Update Your Password'
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
                    <div class="row">
                        @include('user.sidebar')
                        <div class="col-lg-9 col-12">
                            <div class="edit-profile-form">
                                <h3>Update Your Password</h3>
                                <form method="post" action="#">
                                    @csrf
                                    <label>Current Password:</label>
                                    <input class="form-control" type="password" name="current_pass" placeholder="Current Password" required>
                                    <br>
                                    <label>New Password:</label>
                                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                                    <br>
                                    <label>Confirm New Password:</label>
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="Password Confirmation" required>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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