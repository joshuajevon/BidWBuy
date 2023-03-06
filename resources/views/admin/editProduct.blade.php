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

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="/">View</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="/create-book">Create</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/create-category">Create Category</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

    <div class="m-5">
        <h1 class="text-center">Edit Book</h1>
        <form action="{{route('update', $product->id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input value="{{$product->name}}" type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" name="name">
              </div>

              @error('name')
                  <div class="alert alert-danger" role="alert">{{$message}}</div>
              @enderror

              <div class="mb-3">
                  <label for="exampleInputName" class="form-label">slug</label>
                  <input value="{{$product->slug}}" type="text" value="{{old('slug')}}" class="form-control @error('slug') is-invalid @enderror" id="exampleInputName" name="slug">
                </div>

                @error('slug')
                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                @enderror

                <div class="mb-3">
                  <label for="exampleInputName" class="form-label">description</label>
                  <input value="{{$product->description}}" type="area" value="{{old('description')}}" class="form-control @error('description') is-invalid @enderror" id="exampleInputName" name="description">
                </div>

                @error('description')
                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                @enderror

              <div class="mb-3">
                  <label for="exampleInputStock" class="form-label">price</label>
                  <input value="{{$product->price}}" type="text" value="{{old('price')}}" class="form-control @error('price') is-invalid @enderror" id="exampleInputStock" name="price">
              </div>

              @error('price')
                  <div class="alert alert-danger" role="alert">{{$message}}</div>
              @enderror

              <div class="mb-3">
                  <label for="exampleInputAuthor" class="form-label">quantity</label>
                  <input value="{{$product->quantity}}" type="number" value="{{old('quantity')}}" class="form-control @error('quantity') is-invalid @enderror" id="exampleInputAuthor" name="quantity">
              </div>

              @error('quantity')
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
                    @foreach ($product as $p)
                    <input class="form-control type="text" value="{{$product->category->id}}">
                        <option value="{{$p->category->id}}">{{$p->category->CategoryName}}</option>
                    @endforeach
                </select>
            </div> --}}

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
