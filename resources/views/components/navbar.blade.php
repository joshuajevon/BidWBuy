<nav class="navbar navbar-expand-lg bg-dark py-4 fixed-top">
    <div class="container">
        <a class="navbar-brand h1 mb-0 text-light fw-bold d-flex align-items-center gap-2" href="/">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-watch"
                viewBox="0 0 16 16">
                <path d="M8.5 5a.5.5 0 0 0-1 0v2.5H6a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5-.5V5z" />
                <path
                    d="M5.667 16C4.747 16 4 15.254 4 14.333v-1.86A5.985 5.985 0 0 1 2 8c0-1.777.772-3.374 2-4.472V1.667C4 .747 4.746 0 5.667 0h4.666C11.253 0 12 .746 12 1.667v1.86a5.99 5.99 0 0 1 1.918 3.48.502.502 0 0 1 .582.493v1a.5.5 0 0 1-.582.493A5.99 5.99 0 0 1 12 12.473v1.86c0 .92-.746 1.667-1.667 1.667H5.667zM13 8A5 5 0 1 0 3 8a5 5 0 0 0 10 0z" />
            </svg>
            BidWBuy</a>
        <button class="navbar-toggler text-light border-light" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="navbar-nav ms-auto d-flex gap-3">
                @if($page === "home")
                <a class="nav-link active border-bottom border-light fw-bold text-light" aria-current="page"
                    href="/">Home</a>
                @else
                <a class="nav-link text-light" aria-current="page" href="/">Home</a>
                @endif

                @if($page === "auction")
                <a class="nav-link active border-bottom border-light fw-bold text-light text-light"
                    href="/auction">Auction</a>
                @else
                <a class="nav-link text-light" aria-current="page" href="/auction">Auction</a>
                @endif

                @if($page === "buynow")
                <a class="nav-link active border-bottom border-light fw-bold text-light text-light" href="/buy-now">Buy
                    Now</a>
                @else
                <a class="nav-link text-light" aria-current="page" href="/buy-now">Buy Now</a>
                @endif

                @auth
                <a class="nav-link text-light" href="/cart">
                    <span class="position-relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-cart" viewBox="0 0 16 16">
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 11 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ count((array) session('cart')) }}
                            <span class="visually-hidden">Items in cart</span>
                        </span>
                    </span>

                </a>
                @endauth

                @guest
                <a href="/register" class="btn btn-light">Register</a>
                <a href="/login" class="btn btn-light">Login</a>
                @endguest

                @auth
                <span class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light d-flex align-items-center gap-1"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                        <p class="text-truncate m-0" style="max-width: 150px">
                            {{Auth::user()->name}}
                        </p>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/profile">Profile</a>
                        @if(Auth::user()->isAdmin)
                            <a class="dropdown-item" href="/admin/product">Dashboard</a>
                        @else
                            <a class="dropdown-item" href="/user-dashboard">Dashboard</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item">Logout</button>
                        </form>
                    </div>
                </span>
                @endauth
            </div>
        </div>
</nav>
