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
              <a href="{{route('admin.categories.getNew')}}" class="btn btn-sm btn-neutral">Add New</a>
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
                  <h3 class="mb-0">Categories List</h3>
                </div>
              </div>
            </div>
              <!-- Projects table -->
              <table class="table align-items-center table-flush data-table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Creator</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($AllCategories as $Single)
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="Image placeholder" src="{{$Single->ImageSrc}}">
                          </a>
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{$Single->title}}</span>
                          </div>
                        </div>
                      </th>
                      <td>
                        <span class="badge badge-dot mr-4">
                          @if($Single->active)
                            <i class="bg-success"></i>
                            <span class="status">Active</span>
                          @else
                            <i class="bg-danger"></i>
                            <span class="status">Deleted</span>
                          @endif
                        </span>
                      </td>
                      <td>
                        <div class="media align-items-center">
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="Image placeholder" src="{{$Single->User->ImagePath}}">
                          </a>
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{$Single->User->name}}</span>
                          </div>
                        </div>
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  @empty
                  @endforelse
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('admin.layout.scripts')
</body>
</html>