<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <x-navbar page="auction"/>

    {{-- Search --}}
    <div class="pt-5">
        <div class="pt-5">
            <div class="container pt-5">
                <h5>Search auctions:</h5>
                <form class="w-100 d-flex gap-2">
                    <input class="w-100 p-2 rounded" id="search" name="search" type="search"
                        placeholder="Type here to search...">
                    <button type="button"
                        class="btn btn-dark text-light d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

    </div>


    {{-- All auction --}}
    <div class="container py-5 d-flex flex-column gap-5">
        <h1 class="text-center fw-bolder display-4"><span class="border-bottom border-dark border-5">Our Latest
                Auction</span></h1>
        @can('isAdmin')
        <a href="/admin/auction/create-auction">Add Item</a>
        @endcan

        <div class="row">
            @foreach ($auctions as $auction)
            <div class="col-lg-4 col-12 p-3">
                <div
                    class="border p-lg-4 p-3 rounded border-dark d-flex align-items-center flex-column flex-row gap-lg-4 gap-2">
                    <h2 class="text-truncate d-inline-block d-lg-none w-100 text-center">auction 1</h2>
                    <div class="d-flex align-items-center flex-lg-column flex-row gap-lg-4 gap-1 w-100">
                        <img src="{{asset('/storage/image/'.$auction->image)}}" class="object-fit-contain rounded card-img-top" alt="auction">
                        <div class="d-flex flex-column gap-lg-2 gap-1 ps-lg-0 ps-3 w-100">
                            <h2 class="text-truncate d-lg-inline-block d-none">{{$auction->name}}</h2>
                            <p class="lead d-lg-block d-none overflow-scroll overflow-x-hidden" style="height: 120px">
                                {{$auction->description}}</p>
                            <h5><span
                                    class="badge bg-secondary text-light">{{$auction->category->CategoryName}}</span>
                            </h5>
                            <h3 class="text-currency">@currency ($auction->current_price)</h3>
                            {{-- <h4 class="fs-lg-4 fs-5">Bids: 5</h4> --}}

                            <h4 class="fs-lg-4 fs-5">Ends in: </h4>
                            <h4 class="fs-lg-4 fs-5" class="countdown" id="countdown-{{ $auction->id }}"></h4>
                            <a href="{{ route('auctionById', $auction->id) }}" id="bid" class="btn btn-dark fw-semibold p-lg-2 p-1">Bid</a>




                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $auctions->links() }}

    </div>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
    <script>
        @foreach($auctions as $auction)
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
            document.getElementById("countdown-{{ $auction->id }}").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

            // If the countdown for this auction is over, display a message
            if (distance < 0) {
                clearInterval(x_{{ $auction->id }});
                document.getElementById("countdown-{{ $auction->id }}").innerHTML = "EXPIRED";
                document.getElementById("bid").innerHTML == "EXPIRED"
                document.getElementById("bid").disabled = true;
            }
        }, 1000);
    @endforeach
    </script>

</body>
</html>
