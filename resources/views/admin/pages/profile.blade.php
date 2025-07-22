@extends('admin.layouts.master')

@section('main-content')
    {{-- Main Content --}}
    <main class="content">
        <div class="container-fluid p-0">
            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Profile</h1>
            </div>
            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Profile Details</h5>
                        </div>
                        <div class="card-body text-center">
                            <img
                                src="img/avatars/avatar-4.jpg"
                                alt="{{ Auth::user()->full_name }}"
                                class="img-fluid rounded-circle mb-2"
                                width="128"
                                height="128"
                            />
                            <h5 class="card-title mb-2">{{ Auth::user()->full_name }}</h5>

                            <div>
                                <a class="btn btn-primary btn-sm" href="#"
                                    >Follow</a
                                >
                                <a class="btn btn-primary btn-sm" href="#"
                                    ><span data-feather="message-square"></span>
                                    Message</a
                                >
                            </div>
                        </div>

                        <hr class="my-0" />
                        <div class="card-body">
                            <h5 class="h6 card-title">About</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-1">
                                    <span
                                        data-feather="mail"
                                        class="feather-sm me-1 mb-1"
                                    ></span>
                                    Email
                                    <a class="block" href="#">{{ Auth::user()->email }}</a>
                                </li>

                                <li class="mb-1">
                                    <span
                                        data-feather="phone"
                                        class="feather-sm me-1 mb-1"
                                    ></span>
                                    Phone
                                    <a class="block" href="#">{{ Auth::user()->phone }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-xl-9">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Profile Information</h5>
                        </div>
                        <div class="card-body h-100">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" placeholder="{{ Auth::user()->full_name }}">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input name="email" type="text" class="form-control" placeholder="{{ Auth::user()->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="phone">Phone Number</label>
                                <input name="phone" type="text" class="form-control" placeholder="{{ Auth::user()->phone }}">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Update Password</h5>
                        </div>
                        <div class="card-body h-100">
                            <div class="mb-3">
                                <label for="name">Current Password</label>
                                <input name="name" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email">New Password</label>
                                <input name="email" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email">Confirm Password</label>
                                <input name="email" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-3">Update Password</h5>
                            <div class="mb-3">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</div>
                            <button class="btn btn-danger">Delete account</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
