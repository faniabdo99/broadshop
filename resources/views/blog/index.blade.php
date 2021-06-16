@include('layout.header' , [
    'PageTitle' => __('blog.page_title')
])
<body class="bg-light-4 no-touch">
    <!-- page wrapper start -->
    <div class="page-wrapper">
        @include('layout.navbar')
        <!--body content start-->
        <div class="page-content">
            <!--blog start-->
            <section>
                <div class="container">
                    <div class="row">
                        @forelse($AllPosts as $Post)
                            <div class="col-12 col-lg-4 col-md-6">
                                <!-- Blog Card -->
                                <div class="card border-0 bg-transparent">
                                    <div class="position-relative rounded overflow-hidden">
                                        <div class="position-absolute z-index-1 bg-white text-pink text-center py-1 px-3 my-4">{{$Post->created_at->format('d M')}}</div>
                                        <img class="card-img-top hover-zoom" src="{{$Post->ImagePath}}" alt="{{$Post->title}}">
                                    </div>
                                    <div class="card-body px-0 pb-0">
                                        <h2 class="h5 font-w-5 mt-2 mb-0"> <a class="link-title"
                                                href="{{route('blog.single' , [$Post->slug , $Post->id])}}">{{$Post->title}}</a>
                                        </h2>
                                    </div>
                                </div>
                                <!-- End Blog Card -->
                            </div>
                        @empty
                            <p>Er zijn momenteel geen blogartikelen beschikbaar articles</p>
                        @endforelse
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