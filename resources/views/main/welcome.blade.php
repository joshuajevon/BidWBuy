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

        .text-currency {
            font-size: 1.75rem;
        }

        @media (max-width: 991px) {
            .card-img-top {
                max-width: 250px;
                width: 50%;
                max-height: 250px;
                height: auto;
            }

            .text-currency {
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
    <div class="py-5">
        <div class="container py-5 d-flex flex-column gap-5">
            <h1 class="text-center fw-bolder display-4"><span class="border-bottom border-dark border-5">Our Latest
                    Products</span></h1>
            @can('isAdmin')
                <a class="text-light text-decoration-none" href="/admin/product/create-product">
                    <button type="button"
                        class="btn btn-primary p-lg-2 px-lg-3 px-2 p-1 d-flex justify-content-center align-items-center gap-2 fw-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>Add Item
                    </button>
                </a>
            @endcan

            <div class="row">
                {{-- Show 3 produk terbaru --}}
                @foreach ($products as $product)
                    <div class="col-lg-4 col-12 p-3">
                        <div
                            class="border p-lg-4 p-3 rounded border-dark d-flex align-items-center flex-column flex-row gap-lg-4 gap-2">
                            <h2 class="text-truncate d-inline-block d-lg-none w-100 text-center">Product 1</h2>
                            <div class="d-flex align-items-center flex-lg-column flex-row gap-lg-4 gap-1 w-100">
                                <img src="{{ asset('/storage/image/' . $product->image) }}"
                                    class="object-fit-contain rounded card-img-top" alt="product">
                                <div class="d-flex flex-column gap-lg-2 gap-1 ps-lg-0 ps-3 w-100">
                                    <h2 class="text-truncate d-lg-inline-block d-none">{{ $product->name }}</h2>
                                    <p class="lead d-lg-block d-none overflow-scroll overflow-x-hidden"
                                        style="height: 120px">
                                        {{ $product->description }}</p>
                                    <h5><span
                                            class="badge bg-secondary text-light">{{ $product->category->CategoryName }}</span>
                                    </h5>

                                    <h3 class="text-currency">@currency ($product->price)</h3>

                                    <a href="{{ route('productById', $product->id) }}"
                                        class="btn btn-outline-dark fw-semibold p-lg-2 p-1">View</a>
                                    @guest

                                        <!-- Button trigger modal -->

                                        <a href="{{ route('register') }}" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"
                                            class="btn btn-dark text-light fw-semibold p-lg-2 p-1">
                                            Add To Cart
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            class="btn btn-dark rounded text-light fw-semibold p-lg-2 p-1">Add To
                                            Cart</a>
                                    @endauth

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
    <div class="bg-body-secondary py-5">
        <div class="container py-5 d-flex flex-column gap-5 ">
            <h1 class="text-center fw-bolder display-4"><span class="border-bottom border-dark border-5">Live
                    Auctions</span></h1>
            @can('isAdmin')
                <a class="text-light text-decoration-none" href="/admin/product/create-product">
                    <button type="button"
                        class="btn btn-primary p-lg-2 px-lg-3 px-2 p-1 d-flex justify-content-center align-items-center gap-2 fw-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>Add Item
                    </button>
                </a>
            @endcan

            <div class="row">
                {{-- Show 3 auction terbaru --}}

                @foreach ($auctions as $auction)
                    <div class="col-lg-4 col-12 p-3">
                        <div
                            class="border p-lg-4 p-3 rounded border-dark d-flex align-items-center flex-lg-column flex-row gap-lg-4 gap-0">
                            <img src="./assets/home-page/product.png" class="col-lg-6 col-4 object-fit-contain"
                                alt="product">
                            <div class="col-lg-12 col-8 d-flex flex-column gap-lg-2 gap-1 ps-lg-0 ps-3">
                                <h2 class="text-truncate">{{ $auction->name }}</h2>
                                <p class="lead d-lg-block d-none overflow-scroll overflow-x-hidden"
                                    style="height: 150px">
                                    {{ $auction->description }}</p>
                                <h5 class=""><span class="badge bg-secondary text-light">
                                        {{ $auction->category->CategoryName }}</span></h5>
                                <h3 class="fs-lg-3 fs-4"> @currency ($auction->current_price) </h3>
                                {{-- <h4 class="fs-lg-4 fs-5">Bids: 5</h4> --}}

                                <h4 class="fs-lg-4 fs-5">Ends in: </h4>
                                <h4 class="fs-lg-4 fs-5" class="countdown" id="countdown-{{ $auction->id }}"></h4>


                                <a href="{{ route('auctionById', $auction->id) }}" id="bid"
                                    class="btn btn-dark fw-semibold p-lg-2 p-1">Bid</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <a href="/auction" class="btn btn-dark py-3 rounded text-center text-light fw-semibold">View
                    All
                    Auctions</a>
            </div>
        </div>
    </div>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script>
        @foreach ($auctions as $auction)
            // Set the date and time of the event for this product
            var countDownDate_{{ $auction->id }} = new Date("{{ $auction->end_date }}").getTime();

            // Update the countdown every 1 second for this auction
            var x_{{ $auction->id }} = setInterval(function() {

                // Get the current date and time
                var now = new Date().getTime();

                // Calculate the time remaining
                var distance = countDownDate_{{ $auction->id }} - now;

                // Calculate days, hours, minutes, and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the countdown for this auction
                document.getElementById("countdown-{{ $auction->id }}").innerHTML = days + "d " + hours + "h " +
                    minutes + "m " + seconds + "s ";

                // If the countdown for this auction is over, display a message
                if (distance < 0) {
                    clearInterval(x_{{ $auction->id }});
                    document.getElementById("countdown-{{ $auction->id }}").innerHTML = "EXPIRED";
                    document.getElementById("addToCart-{{ $auction->id }}").innerHTML = "EXPIRED";
                }
            }, 1000);
        @endforeach
    </script>

</body>


</html>
