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
    <x-navbar page="create-category" />

    <div class="py-5">
        <div class="py-5">
            <div class="container py-5">
        <h1 class="text-center">Create Category</h1>
        <form action="{{route('storeCategory')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">Category Name</label>
              <input type="text" class="form-control @error('CategoryName') is-invalid @enderror" id="exampleInputName" name="CategoryName" value="{{old('CategoryName')}}">
            </div>

            @error('CategoryName')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Slug </label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="exampleInputName" name="slug" value="{{old('slug')}}">
              </div>

              @error('slug')
                  <div class="alert alert-danger" role="alert">{{$message}}</div>
              @enderror

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
