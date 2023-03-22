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

<body class="bg-body-secondary pt-5">
    <x-navbar page="register" />

        <div class="pt-5">
            <div class="py-5">
                <div class="container d-flex w-100 justify-content-center align-items-center py-5">
                    <form method="POST" action="{{ route('register') }}"
                        class="border border-dark border-1 rounded p-5 col-lg-7 col-12 d-flex flex-column gap-4">
                        @csrf

                        <h1 class="text-center fw-bolder">Register</h1>

                        <!-- Name -->
                        <div class="d-flex flex-column">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2 mb-0" />
                        </div>

                        <!-- Email Address -->
                        <div class="d-flex flex-column">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 mb-0" />
                        </div>

                        <!-- Password -->
                        <div class="d-flex flex-column">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2 mb-0" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="d-flex flex-column">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 mb-0" />
                        </div>

                        <!-- Phone Number -->
                        <div class="d-flex flex-column">
                            <x-input-label for="phoneNumber" :value="__('Phone Number')" />
                            <x-text-input id="phoneNumber" class="block mt-1 w-full" type="number" name="phoneNumber"
                                :value="old('phoneNumber')" required autocomplete="phoneNumber" />
                            <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2 mb-0" />
                        </div>

                        <!-- Date of Birth -->
                        <div class="d-flex flex-column">
                            <x-input-label for="dob" :value="__('Date of Birth')" />
                            <x-text-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')"
                                required autocomplete="dob" />
                            <x-input-error :messages="$errors->get('dob')" class="mt-2 mb-0" />
                        </div>

                        <!-- Gender -->
                        <div class="d-flex flex-column">
                            <x-input-label for="gender" :value="__('Gender')" />
                            <div class="">
                                <div class="male">
                                    <input id="male" class="block mt-1 w-full" type="radio" name="gender" value="male"
                                        @if(old('gender')=="male" ) checked @endif />
                                    <label for="male">Male</label>
                                </div>

                                <div class="female">
                                    <input id="female" class="block mt-1 w-full" type="radio" name="gender"
                                        value="female" @if(old('gender')=="female" ) checked @endif />
                                    <label for="female">Female</label>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('gender')" class="mt-2 mb-0" />
                        </div>

                        <!-- Address -->
                        <div class="d-flex flex-column">
                            <x-input-label for="address" :value="__('Address')" />
                            <textarea id="address" class="block mt-1 w-full rounded " type="area" name="address"
                                :value="old('address')" required autocomplete="address">
                                </textarea>
                            <x-input-error :messages="$errors->get('address')" class="mt-2 mb-0" />
                        </div>

                        <x-primary-button class="btn btn-dark text-light mt-4 w-100 p-2 fw-semibold">
                            {{ __('Register') }}
                        </x-primary-button>

                        <a class="cursor-pointer" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </form>
                </div>
        </div>
    </div>

    <x-footer />
</body>

</html>
