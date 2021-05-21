@include('admin.layout.header')

<body class="app">
    <div>
        @include('admin.layout.sidebar')
        <div class="page-container">
            @include('admin.layout.navbar')
            <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="mT-30">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>Title</th>
                                            <th>Color</th>
                                            <th>Color Code</th>
                                            <th>Inventory</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </thead>
                                        <tbody>
                                            @forelse($AllVariations as $Variation)
                                                <tr>
                                                    <td>{{$Variation->Product->title}}</td>
                                                    <td>{{$Variation->color}}</td>
                                                    <td style="background-color:{{$Variation->color_code}};"></td>
                                                    <td>{{$Variation->inventory}}</td>
                                                    <td>{{$Variation->status}}</td>
                                                    <td><a href="{{route('admin.products.deleteVariation' , $Variation->id)}}" class="btn btn-danger">Delete</a></td>
                                                </tr>
                                            @empty
                                                There is no data yet.
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <h2>Add New Product Variation</h2>
                                <div class="bgc-white p-20 bd">
                                    <h6 class="c-grey-900">Main Data</h6>
                                    <div class="mT-30">
                                        <form action="{{route('admin.products.postVariation' , $TheProduct->id)}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label>Color</label>
                                                <input type="text" class="form-control" name="color" placeholder="Please Enter the Color" value="{{ old('color') ?? ''}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Color Code</label>
                                                <input type="text" class="form-control" name="color_code" placeholder="Please Enter the Color Code in HEX Format" value="{{ old('color_code') ?? ''}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Count in Inventory</label>
                                                <input type="number" class="form-control" name="inventory" placeholder="Please Enter a Number" value="{{ old('inventory') ?? '0'}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status" required>
                                                        <option selected value="Available">Available</option>
                                                        <option value="Pre-order">Pre-order</option>
                                                        <option value="Sold Out">Sold out</option>
                                                        <option value="Invisible">Invisible</option>
                                                        <option value="Customers only">Only visible for logged in customers</option>
                                                        <option value="0">Do not display product status</option>
                                                </select>
                                            </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    </div>
    @include('admin.layout.scripts')
</body>
</html>
