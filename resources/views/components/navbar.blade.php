<nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('home.index') }}">
            CLOTHIS
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarContent"
            aria-controls="navbarContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('home.index') ? 'active' : '' }}"
                        href="{{ route('home.index') }}"
                    >
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}"
                        href="{{ route('products.index') }}"
                    >
                        Products
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('orders.*') ? 'active' : '' }}"
                        href="{{ route('orders.index') }}"
                    >
                        Pesanan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.index') }}#about">
                        About
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.index') }}#contact">
                        Contact
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>

<style>
    .navbar {
        padding: 18px 0;
    }

    .navbar-brand {
        font-size: 22px;
        letter-spacing: 1px;
    }

    .navbar .nav-link {
        color: #555;
        margin-left: 18px;
    }

    .navbar .nav-link:hover,
    .navbar .nav-link.active {
        color: #111;
    }
</style>
