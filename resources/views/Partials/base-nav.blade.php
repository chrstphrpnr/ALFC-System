<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('assets/ALFC Logo nav.png') }}" alt="Your Image Alt Text">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <!-- Show dropdown items on smaller screens -->

                <div class="dropdown-menu d-block d-lg-none">
                <a class="dropdown-item" href="#">
                        <img src="{{ asset('assets/nav profile.png') }}" alt="Icon" >
                         Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <img src="{{ asset('assets/nav dashboard.png') }}" alt="Icon" >
                        Dashboard
                    </a>
                    <a class="dropdown-item" href="#">
                        <img src="{{ asset('assets/nav application.png') }}" alt="Icon" >
                        Application Forms
                    </a>
                    <a class="dropdown-item" href="#">
                        <img src="{{ asset('assets/nav logout.png') }}" alt="Icon" >
                        Logout
                    </a>
                </div>

            <!-- Show image and dropdown toggle on larger screens -->
            <li class="nav-item dropdown d-none d-lg-block">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('assets/menu.png') }}" alt="Your Image Alt Text">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">
                        <img src="{{ asset('assets/nav profile.png') }}" alt="Icon" >
                         Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <img src="{{ asset('assets/nav dashboard.png') }}" alt="Icon" >
                        Dashboard
                    </a>
                    <a class="dropdown-item" href="#">
                        <img src="{{ asset('assets/nav application.png') }}" alt="Icon" >
                        Application Forms
                    </a>
                    <a class="dropdown-item" href="#">
                        <img src="{{ asset('assets/nav logout.png') }}" alt="Icon" >
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <!-- Show dropdown content on smaller screens -->

</nav>