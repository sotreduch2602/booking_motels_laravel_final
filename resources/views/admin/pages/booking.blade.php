@extends('admin.layouts.master')


@section('sidebar')
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="index.html">
                <span class="align-middle">Dashboard</span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Pages
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="index.html">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="pages-profile.html">
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="pages-sign-in.html">
            <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Sign In</span>
        </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="pages-sign-up.html">
            <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Sign Up</span>
        </a>
                </li>

                <li class="sidebar-item active">
                    <a class="sidebar-link" href="pages-blank.html">
            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
        </a>
                </li>

                <li class="sidebar-header">
                    Tools & Components
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="ui-buttons.html">
            <i class="align-middle" data-feather="square"></i> <span class="align-middle">Buttons</span>
        </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="ui-forms.html">
            <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Forms</span>
        </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="ui-cards.html">
            <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Cards</span>
        </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="ui-typography.html">
            <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Typography</span>
        </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="icons-feather.html">
            <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Icons</span>
        </a>
                </li>

                <li class="sidebar-header">
                    Plugins & Addons
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="charts-chartjs.html">
            <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Charts</span>
        </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="maps-google.html">
            <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
        </a>
                </li>
            </ul>

            <div class="sidebar-cta">
                <div class="sidebar-cta-content">
                    <strong class="d-inline-block mb-2">Upgrade to Pro</strong>
                    <div class="mb-3 text-sm">
                        Are you looking for more components? Check out our premium version.
                    </div>
                    <div class="d-grid">
                        <a href="upgrade-to-pro.html" class="btn btn-primary">Upgrade to Pro</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endsection

@section('main-content')
    {{-- Main Content --}}
    <main class="content">
            <div class="container-fluid p-0">
                <h1 class="h3 mb-3">Booking List</h1>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Empty card</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Room Number</th>
                                            <th>Room Type</th>
                                            <th>Check-in</th>
                                            <th>Check-out</th>
                                            <th>Total Price</th>
                                            <th>Status</th>
                                            <th>Payment Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>101</td>
                                            <td>Deluxe Room</td>
                                            <td>2025-07-21</td>
                                            <td>2025-07-25</td>
                                            <td>$400</td>
                                            <td>Confirmed</td>
                                            <td>Completed</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary">View</button>
                                                <button class="btn btn-sm btn-danger">Cancel</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>102</td>
                                            <td>Standard Room</td>
                                            <td>2025-07-22</td>
                                            <td>2025-07-26</td>
                                            <td>$200</td>
                                            <td>Pending</td>
                                            <td>Unpaid</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary">View</button>
                                                <button class="btn btn-sm btn-danger">Cancel</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </main>
@endsection

