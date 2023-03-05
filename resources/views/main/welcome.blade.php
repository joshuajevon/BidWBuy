<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

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


</body>
</html>
