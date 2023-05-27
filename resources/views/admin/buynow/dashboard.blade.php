<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="bg-body-secondary">
    <x-navbar page="dashboard"/>

    <div class="pt-5">
        <div class="pt-5">
            <div class="pt-5">
                <div class="container min-vh-100 d-flex flex-column gap-4">
                    <nav class="nav nav-pills nav-fill">
                        <a href="/admin/product/" class="nav-link bg-dark text-light fw-semibold">Buy Now</a>
                        <a href="/admin/auction/" class="nav-link fw-semibold text-dark">Auction</a>
                        <a href="/admin/product/list-dashboard/" class="nav-link fw-semibold text-dark">Payment</a>
                    </nav>

                    <table class="table table-sm table-dark table-hover table-striped text-center">
                        <thead>
                          <tr>
                            <th scope="col" class="p-2">Id</th>
                            <th scope="col" class="p-2">Product Name</th>
                            <th scope="col" class="p-2">Price</th>
                            <th scope="col" class="p-2">Quantity</th>
                            <th scope="col" class="p-2">Category</th>
                            <th scope="col" class="p-2">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                              <th scope="row" class="p-2">{{$product->id}}</th>
                              <td class="p-2">{{ $product->name }}</td>
                              <td class="p-2">{{ $product->price }}</td>
                              <td class="p-2">{{ $product->quantity }}</td>
                              <td class="p-2">{{ $product->category->CategoryName }}</td>
                              <td class="p-2 d-flex justify-content-center gap-2">
                                  <a href="{{route('edit', $product->id)}}" class="btn btn-success">Edit</a>
                                  <form action="{{route('delete', $product->id)}}" method="POST" class="d-inline">
                                      @csrf
                                      @method('delete')
                                      <button class="btn btn-danger">Delete</button>
                                  </form>
                              </td>

                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>
</html>
