<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">

        <a class="sidebar-link" href="{{ route('client.pages.home') }}">
            <i class="align-middle" data-feather="arrow-left"></i> <span class="align-middle">Back to home</span>
        </a>

        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Hotelier Dashboard</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                User Dashboard
            </li>

            <li class="sidebar-item {{ $title === 'profileView' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.pages.profile') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                </a>
            </li>



            <li class="sidebar-item {{ $title === 'bookingView' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.pages.booking') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Booking</span>
                </a>
            </li>

            <li class="sidebar-item {{ $title === 'reviewView' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.pages.review') }}">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Review</span>
                </a>
            </li>

            <li class="sidebar-header">
                Admin Dashboard
            </li>

            <li class="sidebar-item {{ $title === 'analyticView' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.pages.analytic') }}">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Analytics</span>
                </a>
            </li>

            <li class="sidebar-item {{ $title === 'dashboardView' ? 'active' : '' }} ">
                <a class="sidebar-link" href="{{ route('admin.pages.dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
