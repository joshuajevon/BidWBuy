<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BidWBuy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

         <style>
        .card-img-top {
            height: 250px;
            widows: 100%;
        }
        .text-currency{
            font-size: 1.75rem;
        }

        @media (max-width: 991px) {
            .card-img-top {
                max-width: 250px;
                width: 50%;
                max-height: 250px;
                height: auto;
            }
            .text-currency{
                font-size: 1.25rem;
            }
        }
    </style>
</head>

<body>
    <x-navbar page="home" />

    {{-- Hero --}}
    <div class="bg-body-secondary">
        <div class="container d-flex justify-content-center align-items-center gap-5 vh-100 flex-column flex-lg-row">
            <div class="order-lg-1 order-2 d-flex flex-column gap-4">
                <div>
                    <h1 class="fw-bolder display-5">BidWBuy</h1>
                    <p class="lead">Experience the essence of luxury with our exceptional collection of watches. Our
                        exclusive store offers a carefully curated selection of the world's finest timepieces, featuring
                        unparalleled craftsmanship and design.</p>
                </div>

                <figure>
                    <blockquote class="blockquote">
                        <p>Everyone looks at your watch and it represents who you are, your values and your personal
                            style.</p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        <cite title="Source Title">Kobe Bryant</cite>
                    </figcaption>
                </figure>
            </div>
            <img src="./assets/home-page/watch.png" class="w-lg-50 w-75 order-1 order-lg-2" alt="watch">
        </div>
    </div>

    {{-- Our Latest Product --}}
    <div>
        <div class="container py-5 d-flex flex-column gap-5">
            <h1 class="text-center fw-bolder display-4"><span class="border-bottom border-dark border-5">Our Latest
                    Products</span></h1>
            @can('isAdmin')
                <a href="/admin/create-product">Add Item</a>
            @endcan

            <div class="row">
                {{-- Show 3 produk terbaru --}}
                @foreach ($products as $product)
                <div class="col-lg-4 col-12 p-3">
                <div
                    class="border p-lg-4 p-3 rounded border-dark d-flex align-items-center flex-column flex-row gap-lg-4 gap-2">
                    <h2 class="text-truncate d-inline-block d-lg-none w-100 text-center">Product 1</h2>
                    <div class="d-flex align-items-center flex-lg-column flex-row gap-lg-4 gap-1 w-100">
                        <img src="{{asset('/storage/image/'.$product->image)}}" class="object-fit-contain rounded card-img-top" alt="product">
                        <div class="d-flex flex-column gap-lg-2 gap-1 ps-lg-0 ps-3 w-100">
                            <h2 class="text-truncate d-lg-inline-block d-none">{{$product->name}}</h2>
                            <p class="lead d-lg-block d-none overflow-scroll overflow-x-hidden" style="height: 120px">
                                {{$product->description}}</p>
                            <h5><span
                                    class="badge bg-secondary text-light">{{$product->category->CategoryName}}</span>
                            </h5>
                            <h3 class="text-currency">@currency ($product->price)</h3>
                            <a href="{{route('productById', $product->id)}}" class="btn btn-outline-dark fw-semibold p-lg-2 p-1">View</a>
                            @guest

                            <!-- Button trigger modal -->

                            <a href="{{ route('register') }}" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                class="btn btn-dark text-light fw-semibold p-lg-2 p-1">
                                Add To Cart
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Warning</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Please Register / Login before Add The Product to Cart!
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ route('register') }}"
                                                class="btn btn-success py-lg-2 rounded text-center text-light fw-semibold">
                                                Register
                                            </a>
                                            <a href="{{ route('login') }}"
                                                class="btn btn-primary py-lg-2 rounded text-center text-light fw-semibold">
                                                Login
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endguest

                            @auth
                            <a href="{{ route('addToCart', $product->id) }}"
                                class="btn btn-dark py-lg-3 rounded text-center text-light fw-semibold">Add To
                                Cart</a>
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
            </div>
                @endforeach

            </div>
            <a href="/buy-now" class="btn btn-dark py-3 rounded text-center text-light fw-semibold">View
            All
            Products</a>
        </div>
    </div>

    {{-- Live Auction --}}
    <div class="bg-body-secondary">
        <div class="container py-5 d-flex flex-column gap-5 ">
            <h1 class="text-center fw-bolder display-4"><span class="border-bottom border-dark border-5">Live Auctions</span></h1>
            <a href="/create-product">Add Item</a>

            <div class="row">
                {{-- Show 3 auction terbaru --}}
                {{-- @foreach ($products as $product)
                <div class="col-lg-4 col-12 p-3">
                    <div
                        class="border p-lg-4 p-3 rounded border-dark d-flex align-items-center flex-lg-column flex-row gap-lg-4 gap-0">
                        <img src="{{asset('/storage/image/'.$product->image)}}" class="col-lg-6 col-4 object-fit-contain"
                            alt="product">
                        <div class="col-lg-12 col-8 d-flex flex-column gap-lg-2 gap-1 ps-lg-0 ps-3">
                            <h2 class="text-truncate">{{$product->name}}</h2>
                            <p class="lead d-lg-block d-none overflow-scroll overflow-x-hidden" style="height: 150px">
                                {{$product->description}}</p>
                            <h5 class=""><span class="badge bg-secondary text-light">{{$product->category_id}}</span>
                            </h5>
                            <h3 class="fs-lg-3 fs-4">Rp{{$product->price}}</h3>
                            <h4 class="fs-lg-4 fs-5">Stock: {{$product->quantity}}</h4>
                            <a href="" class="btn btn-dark py-lg-3 rounded text-center text-light fw-semibold">View</a>

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
                @endforeach --}}

                <div class="col-lg-4 col-12 p-3">
                    <div
                        class="border p-lg-4 p-3 rounded border-dark d-flex align-items-center flex-lg-column flex-row gap-lg-4 gap-0">
                        <img src="./assets/home-page/product.png" class="col-lg-6 col-4 object-fit-contain" alt="product">
                        <div class="col-lg-12 col-8 d-flex flex-column gap-lg-2 gap-1 ps-lg-0 ps-3">
                            <h2 class="text-truncate">GMT Master II 126715CHNR</h2>
                            <p class="lead d-lg-block d-none overflow-scroll overflow-x-hidden" style="height: 150px">
                                Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Earum nesciunt accusantium ad eos maiores et veritatis beatae tenetur neque quae,
                                placeat dolor officia sed a voluptatem incidunt temporibus doloremque sit!</p>
                            <h5 class=""><span class="badge bg-secondary text-light">Rolex</span></h5>
                            <h3 class="fs-lg-3 fs-4">Rp100.000.000</h3>
                            <h4 class="fs-lg-4 fs-5">Bids: 5</h4>
                            <h4 class="fs-lg-4 fs-5">Ends in: 00:00:00</h4>
                            <a href="" class="btn btn-dark py-lg-3 rounded text-center text-light fw-semibold">View</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12 p-3">
                    <div
                        class="border p-lg-4 p-3 rounded border-dark d-flex align-items-center flex-lg-column flex-row gap-lg-4 gap-0">
                        <img src="./assets/home-page/product.png" class="col-lg-6 col-4 object-fit-contain" alt="product">
                        <div class="col-lg-12 col-8 d-flex flex-column gap-lg-2 gap-1 ps-lg-0 ps-3">
                            <h2 class="text-truncate">GMT Master II 126715CHNR</h2>
                            <p class="lead d-lg-block d-none overflow-scroll overflow-x-hidden" style="height: 150px">
                                Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Earum nesciunt accusantium ad eos maiores et veritatis beatae tenetur neque quae,
                                placeat dolor officia sed a voluptatem incidunt temporibus doloremque sit!</p>
                            <h5 class=""><span class="badge bg-secondary text-light">Rolex</span></h5>
                            <h3 class="fs-lg-3 fs-4">Rp100.000.000</h3>
                            <h4 class="fs-lg-4 fs-5">Bids: 5</h4>
                            <h4 class="fs-lg-4 fs-5">Ends in: 00:00:00</h4>
                            <a href="" class="btn btn-dark py-lg-3 rounded text-center text-light fw-semibold">View</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12 p-3">
                    <div
                        class="border p-lg-4 p-3 rounded border-dark d-flex align-items-center flex-lg-column flex-row gap-lg-4 gap-0">
                        <img src="./assets/home-page/product.png" class="col-lg-6 col-4 object-fit-contain" alt="product">
                        <div class="col-lg-12 col-8 d-flex flex-column gap-lg-2 gap-1 ps-lg-0 ps-3">
                            <h2 class="text-truncate">GMT Master II 126715CHNR</h2>
                            <p class="lead d-lg-block d-none overflow-scroll overflow-x-hidden" style="height: 150px">
                                Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Earum nesciunt accusantium ad eos maiores et veritatis beatae tenetur neque quae,
                                placeat dolor officia sed a voluptatem incidunt temporibus doloremque sit!</p>
                            <h5 class=""><span class="badge bg-secondary text-light">Rolex</span></h5>
                            <h3 class="fs-lg-3 fs-4">Rp100.000.000</h3>
                            <h4 class="fs-lg-4 fs-5">Bids: 5</h4>
                            <h4 class="fs-lg-4 fs-5">Ends in: 00:00:00</h4>
                            <a href="" class="btn btn-dark py-lg-3 rounded text-center text-light fw-semibold">View</a>
                        </div>
                    </div>
                </div>
            </div>

            <a href="" class="btn btn-dark py-3 rounded text-center text-light fw-semibold">View
                All
                Auctions</a>
        </div>
    </div>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>
