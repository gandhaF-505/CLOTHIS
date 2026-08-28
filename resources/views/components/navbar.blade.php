<nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            Clothis
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Products
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Process
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Dashboard
                    </a>
                </li>

            </ul>

            <div class="d-flex gap-2">

                <a href="#" class="btn btn-outline-dark btn-sm">
                    Login
                </a>

                <a href="#" class="btn btn-dark btn-sm">
                    Get Started
                </a>

            </div>

        </div>

    </div>
</nav>