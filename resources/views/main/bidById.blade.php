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
    <x-navbar page="auction" />

    <div class="pt-5">
        <div class="py-5">
            <div class="container py-5 d-flex flex-column gap-4">
                    <a href="/auction" class="btn btn-dark d-flex justify-content-center align-items-center fw-semibold" style="width: fit-content;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                        </svg>Go back
                    </a>

                    <div
                        class="border p-lg-4 p-3 rounded border-dark d-flex align-items-center flex-lg-column flex-row gap-lg-4 gap-0">
                        <img src="{{asset('/storage/image/'.$auction->image)}}" class="col-lg-6 col-4 object-fit-contain" style="width: 50vw; border-radius:50px"
                            alt="auction">
                        <div class="col-lg-12 col-8 d-flex flex-column gap-lg-2 gap-1 ps-lg-0 ps-3">
                            <h2 class="text-truncate">{{$auction->name}}</h2>
                            <p class="lead d-lg-block d-none overflow-scroll overflow-x-hidden" style="max-height: 200px">
                                {{$auction->description}}
                            </p>
                            <h5 class=""><span class="badge bg-secondary text-light">{{$auction->category->CategoryName}}</span>
                            </h5>
                            <h3 class="text-currency">@currency ($auction->current_price)</h3>

                            <h4 class="fs-lg-4 fs-5">Number users bid: {{ $userCount }}</h4>

                            <h4 class="fs-lg-4 fs-5">Ends in: </h4>
                            <h4 class="fs-lg-4 fs-5" class="countdown" id="countdown-{{ $auction->id }}"></h4>

                            {{-- <h4 class="fs-lg-4 fs-5">Stock: {{$auction->quantity}}</h4> --}}

                            <p>Users who have joined the bidding:</p>
                            <ul>
                                @foreach($users as $user)
                                    <li>{{ $user->name }} - Rp. @currency($user->amount)</li>
                                @endforeach
                            </ul>

                            @guest

                            {{-- Button trigger modal --}}
                            <a href="{{ route('register') }}" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                class="btn btn-dark text-light fw-semibold p-lg-2 p-1">
                                Bid
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
                                            Please Register / Login before Bid!
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

                            <form action="{{ route('submitBid', $auction->id) }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="amount">Bid Amount</label>
                                    <br/>
                                    <input type="number" id="countdown-{{ $auction->id }}" name="amount" id="amount" class="text-dark fw-semibold p-3" step="0.01" required>
                                </div>

                                <button type="submit" class="btn btn-dark text-light fw-semibold p-lg-2 p-1">Submit Bid</button>
                            </form>

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            @endauth


                        </div>
                    </div>
            </div>
        </div>
    </div>

    <x-footer />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
    <script>
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
                document.getElementById("countdown-{{ $auction->id }}").disabled = true;
            }
        }, 1000);
    </script>

</body>
</html>
