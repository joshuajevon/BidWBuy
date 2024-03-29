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
<body>
    <x-navbar page="buynow" />

    <div class="pt-5">
        <div class="py-5">
            <div class="container py-5 d-flex flex-column gap-4">
                    <a href="/buy-now" class="btn btn-dark d-flex justify-content-center align-items-center fw-semibold" style="width: fit-content;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                        </svg>Go back
                    </a>

                    <div
                        class="border p-lg-4 p-3 rounded border-dark d-flex align-items-center flex-lg-column flex-row gap-lg-4 gap-0">
                        <img src="{{asset('/storage/image/'.$product->image)}}" class="col-lg-6 col-4 object-fit-contain" style="width: 40vw; border-radius:50px"
                            alt="product">
                        <div class="col-lg-12 col-8 d-flex flex-column gap-lg-2 gap-1 ps-lg-0 ps-3">
                            <h2 class="text-truncate">{{$product->name}}</h2>
                            <p class="lead d-lg-block d-none overflow-scroll overflow-x-hidden" style="max-height: 200px">
                                {{$product->description}}
                            </p>
                            <h5 class=""><span class="badge bg-secondary text-light">{{$product->category->CategoryName}}</span>
                            </h5>
                            <h3 class="text-currency">@currency ($product->price)</h3>

                            <h4 class="fs-lg-4 fs-5">Stock: {{$product->quantity}}</h4>

                            @guest
                            {{-- Button trigger modal --}}
                            <a href="{{ route('register') }}" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                class="btn btn-dark text-light fw-semibold p-3">
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
                                                class="btn btn-success py-lg-2 rounded text-light fw-semibold">
                                                Register
                                            </a>
                                            <a href="{{ route('login') }}"
                                                class="btn btn-primary py-lg-2 rounded text-light fw-semibold">
                                                Login
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endguest

                            @auth
                            <a href="{{ route('addToCart', $product->id) }}"
                                class="btn btn-dark rounded text-light fw-semibold p-3">Add To
                                Cart</a>
                            @endauth
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <x-footer />
</body>
</html>
