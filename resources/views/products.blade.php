<!DOCTYPE html>
<html>
<head>
    <title>Table Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     
<div class="container">
    <div class="card mt-3 mb-3">
        <div class="card-header text-center">
            <h4>Table Products</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-primary"  style="background-color: rgb(10, 134, 138)">Import product Data</button>
            </form>
  
            <table class="table table-bordered mt-3">
                <tr>
                    <th colspan="3">
                        List Of products
                    </th>
                </tr>
                <tr style="background-color: rgb(170, 198, 199)">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Desc</th>
                    <th>price</th>
                    <th>Sale Price</th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->desc }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->sale_price }}</td>
                </tr>
                @endforeach
                <tr>
                    <th>
                        <a class="btn btn-danger " href="{{ route('products.export') }}">Export product Data</a>

                    </th>
                </tr>
            </table>
  
        </div>
    </div>
</div>

</body>
</html>