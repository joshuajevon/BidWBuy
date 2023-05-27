<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BidWBuy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>

<body class="bg-body-secondary">
    <x-navbar page="cart" />

    <div class="pt-5 min-vh-100">
        <div class="py-5">
            <div class="py-5 d-flex flex-column gap-5">
                <h1 class="text-center fw-bolder display-4"><span
                        class="border-bottom border-dark border-5">Payment</span></h1>

                <div class="container p-5 bg-light d-flex flex-column gap-4 rounded">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table id="cart" class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th class="text-center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                    <tr data-id="{{ $id }}">
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-3 hidden-xs"><img
                                                        src="{{ asset('/storage/image/') }}/{{ $details['image'] }}"
                                                        width="100" height="100" class="img-responsive" /></div>
                                                <div class="col-sm-9">
                                                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price">@currency ($details['price'] )</td>
                                        <td data-th="Quantity">
                                            {{ $details['quantity'] }}
                                        </td>
                                        <td data-th="Subtotal" class="text-center">@currency($details['price'] * $details['quantity'])
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-right">
                                    <h3><strong>Total @currency($total)</strong></h3>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right d-flex flex-column justify-content-start align-items-start gap-4">
                                    <h1 class="display-6 fw-bolder">Choose Payment Method</h1>
                                    <div class="d-flex flex-column justify-content-start align-items-start gap-4">
                                        <div class="form-check d-flex justify-content-center align-items-center gap-4">
                                            <input class="form-check-input" type="radio" name="radioPayment" value=""
                                                id="ovo" checked>
                                            <label class="form-check-label" for="ovo">
                                                <img src="{{ asset('/assets/payment/ovo.png') }}" alt="ovo">
                                            </label>
                                        </div>
                                        <div class="form-check d-flex justify-content-center align-items-center gap-4">
                                            <input class="form-check-input" type="radio" name="radioPayment" value=""
                                                id="bca">
                                            <label class="form-check-label" for="bca">
                                                <img src="{{ asset('/assets/payment/bca.png') }}" alt="bca">
                                            </label>
                                        </div>
                                        <div class="form-check d-flex justify-content-center align-items-center gap-4">
                                            <input class="form-check-input" type="radio" name="radioPayment" value=""
                                                id="mandiri">
                                            <label class="form-check-label" for="mandiri">
                                                <img src="{{ asset('/assets/payment/mandiri.png') }}" alt="mandiri">
                                            </label>
                                        </div>
                                        <div class="form-check d-flex justify-content-center align-items-center gap-4">
                                            <input class="form-check-input" type="radio" name="radioPayment" value=""
                                                id="gopay">
                                            <label class="form-check-label" for="gopay">
                                                <img src="{{ asset('/assets/payment/gopay.png') }}" alt="gopay">
                                            </label>
                                        </div>




                                    </div>

                                    <div>
                                        <a href="{{ url('/') }}" class="btn btn-danger"> <i
                                                class="fa fa-arrow-left"></i>
                                            Cancel</a>
                                        <a type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">Pay</a>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure want to checkout?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">No</button>

                                                    <a type="button" href="{{ url('/payment  ') }}"
                                                        class="btn btn-success">Yes</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-footer />


    <script type="text/javascript">
        $(".cart_update").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('updateCart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".cart_remove").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Do you really want to remove?")) {
                $.ajax({
                    url: '{{ route('deleteCart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
