<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BidWBuy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Yeseva+One&display=swap"
        rel="stylesheet">

    {{-- CSS --}}
    <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
    <x-navbar />

    <div class="bg-body-secondary">
        <div class="container d-flex justify-content-center align-items-center gap-5 vh-100">
            <div>
                <h1>BidWBuy</h1>
                <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam illum cumque, nihil
                    atque consectetur sed unde nesciunt tempore dicta itaque repudiandae, sit deserunt illo mollitia
                    porro tenetur optio pariatur sapiente?</p>
            </div>
            <img src="./assets/home-page/watch.png" alt="watch">
        </div>
    </div>

    <div>
        <div class="container py-5 d-flex flex-column gap-5">
            <h1 class="text-center fw-bolder display-4">Our Products</h1>
            <div>
                <a href="/create-product">Add Item</a>

                @foreach ($products as $product)
                <div class="m-5">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('/storage/image/'.$product->image)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h2 class="card-title">{{$product->name}}</h2>
                            <p class="card-text">{{$product->description}}</p>
                            <h3 class="card-title">{{$product->price}}</h3>
                            <h3 class="card-title">{{$product->quantity}}</h3>
                            <h4 class="card-title">{{$product->category_id}}</h4>

                            @can('isAdmin')
                            <a href="{{route('edit', $product->id)}}" class="btn btn-success">Edit</a>
                            <form action="{{route('delete', $product->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                {{-- kalo put patch delete hrs tambahain kek atas --}}
                                <button class="btn btn-danger">Delete</button>
                            </form>
                            @endcan
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>
