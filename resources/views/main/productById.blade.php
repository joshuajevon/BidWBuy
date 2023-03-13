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
            <div class="row">
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
                            <a href="" class="btn btn-dark py-lg-3 rounded text-center text-light fw-semibold">View</a>
                        </div>
                    </div>
                </div>
            </div>


</body>
</html>
