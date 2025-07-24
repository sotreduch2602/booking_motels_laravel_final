@extends('admin.layouts.master')

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
                                            <td><span class="badge bg-secondary">N/A</span></td>
                                            <td><span class="badge bg-success">Paid</span></td>
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
                                            <td><span class="badge bg-warning">Pending</span></td>
                                            <td><span class="badge bg-danger">Unpaid</span></td>
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
