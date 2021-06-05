@include('layout.header')
<body class="bg-light-4">
    <!-- page wrapper start -->
    <div class="page-wrapper">
        @include('layout.navbar')
        <!--body content start-->
        <div class="page-content">
            <section class="text-center pb-11">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-4 font-w-6">Thank you for purchasing, Your order is completed!</h4>
                            <p>We have mailed you a recepit, one of our team will contact you withing 24 hours</p>
                            <a class="btn btn-primary btn-animated" href="{{route('home')}}">Back</a>
                            <a class="btn btn-dark btn-animated" href="{{route('products')}}">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!--body content end-->
        @include('layout.footer')
    </div>
    @include('layout.parts')
    @include('layout.scripts')
</body>
</html>
