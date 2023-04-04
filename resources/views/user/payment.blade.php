<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <form class="m-5" action="{{route('storeShop')}}" method="POST">
        @csrf
        @php $total = 0 @endphp
        @if(session('cart'))
        @foreach(session('cart') as $id => $details)
        @php $total += $details['price'] * $details['quantity'] @endphp

        <div class="col-sm-3 hidden-xs"><img src="{{ asset('/storage/image/') }}/{{ $details['image'] }}" width="100" height="100" class="img-responsive" /></div>

        <div class="mb-3">
            <label for="" class="form-label">Product Name</label>
            <input readonly="true" value="{{ $details['name'] }}" type="test" class="form-control" id="exampleInputEmail1" name="product_name">
        </div>


        <div class="mb-3">
            <label for="" class="form-label">Quantity</label>
            <input readonly="true" type="number" value="{{ $details['quantity'] }}" class="form-control" name="quantity"/>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Price</label>
            <input readonly="true" type="number" value="{{ $details['price'] * $details['quantity']  }}" class="form-control" name="price"/>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        @endforeach
        @endif
        
        <a href="/cart" class="btn btn-danger">Back</a>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
