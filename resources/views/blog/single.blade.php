@include('layout.header' , [
    'PageTitle' => $ThePost->title
])

<body class="bg-light-4">
    <!-- page wrapper start -->
    <div class="page-wrapper">
        @include('layout.navbar')
        <!--body content start-->
        <div class="page-content">
            <!--blog start-->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Blog Card -->
                            <div class="card border-0 bg-transparent">
                                <div class="position-relative rounded overflow-hidden">
                                    <div
                                        class="position-absolute z-index-1 bg-white text-pink text-center py-2 px-3 my-4 blog-info rounded-right">
                                        <i class="las la-calendar-check"></i> {{$ThePost->created_at->format('d M')}}
                                    </div>
                                    <img src="{{$ThePost->ImagePath}}" alt="">
                                </div>
                                <div class="card-body pt-5 px-0">
                                    <h1 class="font-w-6 mb-3 line-h-normal link-title">{{$ThePost->title}}</h1>
                                    <p>{{$ThePost->description}}</p>
                                    {!! $ThePost->body !!}
                                </div>
                                <div class="d-md-flex justify-content-between mt-2 mb-8 border-top border-bottom py-4">
                                    <div class="d-flex align-items-center">
                                        <ul class="list-inline social-icons">
                                            <li class="list-inline-item"><a class="bg-white p-2 link-title ic-1-1x"
                                                    href="#"><i class="la la-facebook"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a class="bg-white p-2 link-title ic-1-1x"
                                                    href="#"><i class="la la-dribbble"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a class="bg-white p-2 link-title ic-1-1x"
                                                    href="#"><i class="la la-instagram"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a class="bg-white p-2 link-title ic-1-1x"
                                                    href="#"><i class="la la-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a class="bg-white p-2 link-title ic-1-1x"
                                                    href="#"><i class="la la-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="owl-carousel no-pb" data-dots="false" data-items="3" data-md-items="2"
                                    data-sm-items="2" data-margin="30" data-autoplay="true">
                                    @forelse($OtherPosts as $SinglePost)
                                        <div class="item">
                                            <div class="card border-0 bg-transparent">
                                                <div class="position-relative rounded overflow-hidden">
                                                    <div class="position-absolute z-index-1 bg-white text-pink text-center py-1 px-3 my-4">{{$SinglePost->created_at->format('d M')}}</div>
                                                    <img class="card-img-top hover-zoom" src="{{$SinglePost->ImagePath}}" alt="Image">
                                                </div>
                                                <div class="card-body px-0 pb-0">
                                                    <h2 class="h5 font-w-5 mt-2 mb-0">
                                                        <a class="link-title" href="{{route('blog.single' , [$SinglePost->slug,$SinglePost->id])}}">{{$SinglePost->title}}</a>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                                <!-- End Blog Card -->
                            </div>
                        </div>
                    </div>
            </section>

            <!--blog end-->

            <!--multi sec start-->

            @include('includes.newsletter')
            <!--multi sec end-->

        </div>
        <!--body content end-->
        @include('layout.footer')
    </div>
    @include('layout.parts')
    @include('layout.scripts')
</body>

</html>
