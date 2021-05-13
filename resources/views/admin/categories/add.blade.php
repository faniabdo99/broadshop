@include('admin.layout.header')

<body>
    <!-- Sidenav -->
    @include('admin.layout.sidebar')
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        @include('admin.layout.navbar')
        <!-- Header -->
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-12">
                            <!-- notifications start -->
                            @include('admin.layout.errors')
                            <!-- notifications end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">New Category</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.categories.postNew')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">Title</label>
                                    <input class="form-control" name="title" type="text" value="{{old('title') ?? '' }}" placeholder="Please enter category title" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Slug</label>
                                    <input class="form-control" name="slug" type="text" value="{{old('slug') ?? '' }}" placeholder="Please enter category slug" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Description</label>
                                    <textarea class="form-control" name="description" rows="4" placeholder="Please enter category description">{{old('description') ?? '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Image</label>
                                    <input class="form-control" name="image" type="file">
                                </div>
                                <div class="form-group">
                                    <input class="mr-3" type="checkbox" value="1" name="is_important" id="important"><label for="important">Promote Category ?</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit New Category</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layout.scripts')
</body>

</html>
