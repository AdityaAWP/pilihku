<style>
    .menu-item {
        color: #FFFFFF;
        font-size: 18px;
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: 1.5px;
    }

    .menu-item.active {
        font-weight: bold; /* Example: Make active link bold */
    }

    .navbar .btn {
        background-color: #4e7468;
    }

    /* Center nav links in mobile view */
    @media (max-width: 991px) {
        .navbar-collapse {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .navbar-nav {
            width: 100%;
            text-align: center;
        }

        .nav-item {
            width: 100%;
        }
    }
</style>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: rgb(42, 42, 114);">
    <div class="container">
        <a class="navbar-brand mx-auto" href="{{ route('home') }}">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo" width="150" class="mt-1">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-item {{ Request::is('candidate') ? 'active' : '' }}" href="{{ route('candidate') }}">Kandidat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-item" href="#">Quiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-item {{ Request::is('voting') ? 'active' : '' }}" href="{{ route('voting') }}">Voting</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn menu-item {{ Request::is('login') ? 'active' : '' }}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>