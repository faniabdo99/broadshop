@include('layout.header' , [
    'PageTitle' => 'Thank You'
])
<body class="bg-light-4 no-touch">
    @include('layout.tag-manager')
    <!-- page wrapper start -->
    <div class="page-wrapper">
        @include('layout.navbar')
        <!--body content start-->
        <div class="page-content">
            <section class="text-center pb-11">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            @if($TheOrder->is_paid == 'paid')
                                <h4 class="mb-4 font-w-6">@lang('checkout.thank_you_title')</h4>
                                <p>@lang('checkout.thank_you_mailed')</p>
                            @else
                                <h4 class="mb-4 font-w-6">Payment failed! Please try again.</h4>
                            @endif
                            @if($TheOrder->is_paid == 'paid')
                                <a class="btn btn-primary btn-animated" href="{{route('home')}}">@lang('layout.home')</a>
                                <a class="btn btn-dark btn-animated" href="{{route('products')}}">@lang('checkout.continue_shopping')</a>
                            @else
                                <a class="btn btn-dark btn-animated" href="{{route('checkout')}}">@lang('checkout.title')</a>
                            @endif
                            
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
