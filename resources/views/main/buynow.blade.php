<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <title>BidWBuy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <x-navbar page="buynow" />

    {{-- All Product --}}
        <div class="container py-5 d-flex flex-column gap-5">
            <h1 class="text-center fw-bolder display-4"><span class="border-bottom border-dark border-5">Our Latest
                    Products</span></h1>
            @can('isAdmin')
                <a href="/admin/create-product">Add Item</a>
            @endcan

            <div class="row">
                @foreach ($products as $product)
                <div class="col-lg-4 col-12 p-3">
                    <div
                        class="border p-lg-4 p-3 rounded border-dark d-flex align-items-center flex-lg-column flex-row gap-lg-4 gap-0">
                        <img src="{{asset('/storage/image/'.$product->image)}}" class="col-lg-6 col-4 object-fit-contain" style="width: 20vw"
                            alt="product">
                        <div class="col-lg-12 col-8 d-flex flex-column gap-lg-2 gap-1 ps-lg-0 ps-3">
                            <h2 class="text-truncate">{{$product->name}}</h2>
                            <p class="lead d-lg-block d-none overflow-scroll overflow-x-hidden" style="height: 150px">
                                {{$product->description}}</p>
                            <h5 class=""><span class="badge bg-secondary text-light">{{$product->category->CategoryName}}</span>
                            </h5>
                            <h3 class="fs-lg-3 fs-4">Rp{{$product->price}}</h3>
                            <h4 class="fs-lg-4 fs-5">Stock: {{$product->quantity}}</h4>
                            <a href="{{route('productById', $product->id)}}">View</a>
                            @guest

                            <!-- Button trigger modal -->

                                <a href="{{ route('register') }}" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-dark py-lg-3 rounded text-center text-light fw-semibold">
                                    Add To Cart
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Warning</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        Please Register / Login before Add The Product to Cart!
                                        </div>
                                        <div class="modal-footer">
                                        <a href="{{ route('register') }}" class="btn btn-success py-lg-2 rounded text-center text-light fw-semibold">
                                            Register
                                        </a>
                                        <a href="{{ route('login') }}" class="btn btn-primary py-lg-2 rounded text-center text-light fw-semibold">
                                            Login
                                        </a>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                            @endguest

                            @auth
                                <a href="{{ route('addToCart', $product->id) }}" class="btn btn-dark py-lg-3 rounded text-center text-light fw-semibold">Add To Cart</a>
                            @endauth

                            @can('isAdmin')
                            <a href="{{route('edit', $product->id)}}" class="btn btn-success">Edit</a>
                            <form action="{{route('delete', $product->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                            @endcan
                        </div>
                    </div>
                </div>
                {{-- {{ $products->links() }} --}}
                @endforeach



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>
</html>
