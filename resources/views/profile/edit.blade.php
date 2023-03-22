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
    <x-navbar page="profile" />

    <div class="py-5">
        <div class="pt-5">
            <div class="container py-5 d-flex justify-content-center">
                <div class="bg-light rounded py-lg-5 col-lg-8 col-12">
                    <div class="px-lg-5">
                        <div>
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="px-lg-5">
                        <div>
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="px-lg-5">
                        <div>
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
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

