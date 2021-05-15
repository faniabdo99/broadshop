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
                  <h3 class="mb-0">Newsletter List</h3>
                </div>
              </div>
            </div>
              <!-- Projects table -->
              <table class="table data-table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Form Location</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($AllNewsletter as $Single)
                  <tr>
                      <td>{{$Single->email}}</td>
                      <td>{{$Single->form_location}}</td>
                      <td>{{$Single->created_at->format('Y-m-d')}}</td>
                      <td><a class="btn btn-danger" href="{{route('admin.newsletter.delete' , $Single->id)}}">Delete</a></td>
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