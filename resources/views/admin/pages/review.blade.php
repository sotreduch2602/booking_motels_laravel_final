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
                                {{-- <h5 class="card-title mb-0">Empty card</h5> --}}
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Hotel</th>
                                            <th>Rating</th>
                                            <th>Comment</th>
                                            <th>Created at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <td>Ten holter</td>
                                            <td>Ten holter</td>
                                            <td>Ten holter</td>
                                            <td>Ten holter</td>
                                            <td>
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </main>
@endsection
