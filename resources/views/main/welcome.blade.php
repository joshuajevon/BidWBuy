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
                <div class="card" style="width: 18rem;">
                    <img src="./assets/home-page/product1.png" class="card-img-top" alt="product">
                    <div class="card-body">
                        <p class="fw-light">ROLEX &#x2022 2023</p>
                        <p class="fw-semibold fs-4">Daytona 116509 Blue</p>
                        <p class="fw-bold fs-5">IDR 735.000.000</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>
