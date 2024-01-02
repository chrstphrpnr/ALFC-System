
<link rel="stylesheet" href="{{ asset('assets/bootstrap-v4.0.0.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.0.1/remixicon.css">

<style>
    @media (min-width: 992px) { /* Adjust to the lg breakpoint */
    #navbarNavDropdown {
        display: none !important; /* Force hides the menu on larger screens */
    }
    }

    /* Custom styles for the dropdown menu */
    .nav-item .dropdown-menu-right {
        right: 0; /* Align the right edge of the dropdown menu with the right edge of its parent */
        left: auto; /* Ensure that the left property does not interfere */
    }

    /* Optional: Add additional styling for the dropdown items */
    .nav-item .dropdown-menu a.dropdown-item {
        white-space: nowrap; /* Prevents text from wrapping */
        padding: 10px 20px; /* Adjust padding as needed */
    }

    /* Optional: Style adjustments for the dropdown toggle */
    .nav-item .dropdown-toggle::after {
        margin-left: 0.5em; /* Adjust space between text and dropdown arrow */
    }

    /* Custom styles for the dropdown menu */
    .dropdown-menu {
        right: 50px; /* Align the right edge of the dropdown menu with the right edge of its parent */
        left: auto; /* Ensure that the left property does not interfere */
    }

    /* Optional: Add additional styling for the dropdown items */
    .dropdown-menu a.dropdown-item {
        white-space: nowrap; /* Prevents text from wrapping */
        padding: 10px 20px; /* Adjust padding as needed */
    }

    /* Optional: Style adjustments for the dropdown toggle */
    .nav-link.dropdown-toggle::after {
        margin-left: 0.5em; /* Adjust space between text and dropdown arrow */
    }

</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a class="navbar-brand" href="#">
        <img src="{{ asset('assets/images/ALFC Logo nav.png') }}" alt="ALFC Logo">
    </a>

    <!------------------------ MOBILE VIEW ------------------------>

    <!-- Group the toggler and notification bell together -->
    <div class="d-flex order-lg-1 ml-auto">
 
        <!-- Notification bell (hidden on larger screens) -->
        <a class="nav-link d-lg-none dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ri-notification-line"></i>
            </a>

            <div class="dropdown-menu " aria-labelledby="notificationDropdown">
                <a class="dropdown-item" href="#">Notification 1</a>
                <a class="dropdown-item" href="#">Notification 2</a>
                <a class="dropdown-item" href="#">Notification 3</a>
                <!-- Add more dropdown items here -->
            </div>
        
        <!-- User dropdown (hidden on larger screens) -->
        <div class="nav-item dropdown d-lg-none">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ri-user-line"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Logout</a>
            </div>
        </div>

        <!-- Hamburger toggle button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

        <!-- Mobile Menu Items -->
        <div class="collapse navbar-collapse d-lg-none" id="navbarNavDropdown">
            <!-- Nested Dropdown for Marketing Arms -->
            <div class="dropdown">
                <a class="dropdown-toggle dropdown-item" href="#" id="marketingArmsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('assets/images/nav profile.png') }}" alt="Profile Icon"> Marketing Arms
                </a>
                <div class="dropdown-menu " aria-labelledby="marketingArmsDropdown">
                    <!-- Dropdown items for Marketing Arms -->
                    <a class="dropdown-item" href="#">Sub-item 1</a>
                    <a class="dropdown-item" href="#">Sub-item 2</a>
                    <a class="dropdown-item" href="#">Sub-item 2</a>
                    <!-- Add more sub-items as needed -->
                </div>
            </div>

            <!-- Other Main Menu Items -->
            <a class="dropdown-item" href="#">
                <img src="{{ asset('assets/images/nav dashboard.png') }}" alt="Dashboard Icon"> Insurances
            </a>
            <a class="dropdown-item" href="#">
                <img src="{{ asset('assets/images/nav application.png') }}" alt="Application Icon"> Clients
            </a>
            <a class="dropdown-item" href="#">
                <img src="{{ asset('assets/images/nav application.png') }}" alt="Dashboard Icon"> Dashboard
            </a>
        </div>
    <!------------------------ END MOBILE VIEW ------------------------>


    <!------------------------ WEB VIEW ------------------------------->

    <!-- Nav items for large screens -->
    <div class="collapse navbar-collapse justify-content-center">
        <ul class="navbar-nav d-none d-lg-flex">
            <!-- Dropdown for Marketing Arms -->
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="marketingArmsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Marketing Arms
                </a>
                <div class="dropdown-menu" aria-labelledby="marketingArmsDropdown">
                    <a href="#" class="dropdown-item">Option 1</a>
                    <a href="#" class="dropdown-item">Option 2</a>
                    <a href="#" class="dropdown-item">Option 3</a>
                    <!-- Add more dropdown options here -->
                </div>
            </li>
            
            <!-- Other nav items -->
            <li class="nav-item">
                <a href="#" class="nav-link">Insurances</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Clients</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Dashboard</a>
            </li>
        </ul>
    </div>


    <!-- Notification icon for large screens and user dropdown -->
    <ul class="navbar-nav d-none d-lg-flex ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ri-notification-line"></i>
            </a>

            <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                <a class="dropdown-item" href="#">Notification 1</a>
                <a class="dropdown-item" href="#">Notification 2</a>
                <a class="dropdown-item" href="#">Notification 3</a>
                <!-- Add more dropdown items here -->
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ri-user-line"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Logout</a>
            </div>
        </li>
    </ul>
    <!------------------------ END WEB VIEW ---------------------------->



</nav>

