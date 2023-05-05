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
<body class="bg-body-secondary">
    <x-navbar page="dashboard"/>

    <div class="pt-5">
        <div class="pt-5">
            <div class="pt-5">
                <div class="container min-vh-100 d-flex flex-column gap-4">
                    <table class="table table-sm table-dark table-hover table-striped text-center">
                        <thead>
                          <tr>
                              <th scope="col" class="p-2">Name</th>
                              <th scope="col" class="p-2">Quantity</th>
                              <th scope="col" class="p-2">Price</th>
                              <th scope="col" class="p-2">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($dashboards as $d)
                            @if (Auth::user()->id === $d->user_id)

                            <tr>
                              <td class="p-2">{{$d->product_name}}</td>
                              <td class="p-2">{{$d->quantity}}</td>
                              <td class="p-2"> @currency($d->price)</td>
                              <td class="p-2">
                                @if (str_contains($d->payment_status, 'paid'))
                                    <div>
                                        Unverified
                                    </div>
                                    @elseif (str_contains($d->payment_status, 'accepted'))
                                    <div>
                                        Verified
                                    </div>
                                    @elseif (str_contains($d->payment_status, 'rejected'))
                                    <div>
                                        Rejected
                                    </div>
                                    @endif
                            </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>
</html>
