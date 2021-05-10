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
                    <div class="row">
                        @include('user.sidebar')
                        <div class="col-9">
                            <div class="edit-profile-form">
                                <h3>Edit Your Profile</h3>
                                <form method="post" action="#" enctype="multipart/form-data">
                                    @csrf
                                    <label>Name:</label>
                                    <input class="form-control" type="text" placeholder="Name" name="name" value="{{auth()->user()->name}}" required>
                                    <br>
                                    <label>Email:</label>
                                    <input class="form-control" type="email" placeholder="Email" name="email" value="{{auth()->user()->email}}" required>
                                    <br>
                                    <label>Image:</label>
                                    <input class="form-control" type="file" name="image">
                                    <br>
                                    <label>Phone:</label>
                                    <input class="form-control" type="text" placeholder="Phone Number" name="phone" value="{{auth()->user()->phone}}">
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