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

    <x-navbar page="edit-auction" />

    <div class="py-5">
        <div class="py-5">
            <div class="container py-5">
            <h1 class="text-center">Edit Auction</h1>
            <form action="{{route('updateAuction', $auction->id )}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Name</label>
                    <input value="{{$auction->name}}" type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" name="name">
                </div>

                @error('name')
                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                @enderror

                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">description</label>
                    <input value="{{$auction->description}}" type="area" value="{{old('description')}}" class="form-control @error('description') is-invalid @enderror" id="exampleInputName" name="description">
                </div>

                @error('description')
                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                @enderror

                <div class="mb-3">
                    <label for="exampleInputStock" class="form-label">current price</label>
                    <input value="{{$auction->current_price}}" type="text" value="{{old('current_price')}}" class="form-control @error('current_price') is-invalid @enderror" id="exampleInputStock" name="current_price">
                </div>

                @error('current_price')
                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                @enderror

                <div class="mb-3">
                    <label for="exampleInputAuthor" class="form-label">end date</label>
                    <input value="{{$auction->end_date}}" type="date" value="{{old('end_date')}}" class="form-control @error('end_date') is-invalid @enderror" id="exampleInputAuthor" name="end_date">
                </div>

                @error('end_date')
                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                @enderror

                <div class="mb-3">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile" name="image">
                </div>

                @error('image')
                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                @enderror


                {{-- <div class="mb-3">
                    <label for="exampleInputAuthor" class="form-label">Category</label>
                    <select class="form-select" aria-label="Default select example" name="CategoryName">
                        @foreach ($auction as $p)
                        <input class="form-control type="text" value="{{$auction->category->id}}">
                            <option value="{{$p->category->id}}">{{$p->category->CategoryName}}</option>
                        @endforeach
                    </select>
                </div> --}}

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        <div/>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
