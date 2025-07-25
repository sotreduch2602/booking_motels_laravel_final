@extends('admin.layouts.master')

@section('main-content')
    {{-- Main Content --}}
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="mb-3 col-md-4 col-xl-3">
                    <h1 class="h3 d-inline align-middle">Profile</h1>
                </div>
                @if (session('msg'))
                    <div class="mb-3 col-md-8 col-xl-9 bg-success bg-opacity-25">
                        <h1 class="h3 d-inline align-middle">
                            <span>{{ session('msg') }}</span>
                        </h1>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Profile Details</h5>
                        </div>
                        <div class="card-body text-center">
                            <img
                                src="{{asset('admin_assets/img/avatars/avatar-4.jpg')}}"
                                alt="{{ Auth::user()->full_name }}"
                                class="img-fluid rounded-circle mb-2"
                                width="128"
                                height="128"
                            />
                            <h5 class="card-title mb-2">{{ Auth::user()->full_name }}</h5>
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
                    <form method="post" action="{{ route('admin.pages.profile.update') }}">
                        @csrf
                        @method('patch')
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Profile Information</h5>
                            </div>
                            <div class="card-body h-100">
                                <div class="mb-3">
                                    <label for="full_name">Full Name</label>
                                    <input id="full_name" name="full_name" type="text" class="form-control mb-1" placeholder="{{ Auth::user()->full_name }}" autofocus autocomplete="name">
                                    <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input name="email" type="text" class="form-control" placeholder="{{ Auth::user()->email }}" autofocus autocomplete="email">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="mb-3">
                                    <label for="phone">Phone Number</label>
                                    <input name="phone" type="text" class="form-control" placeholder="{{ Auth::user()->phone }}" autofocus autocomplete="phone">
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                </div>
                                <div class="mb-3">
                                    <button id="save" type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Update Password</h5>
                            </div>
                            <div class="card-body h-100">
                                <div class="mb-3">
                                    <label for="update_password_current_password">Current Password</label>
                                    <input class="form-control"  id="update_password_current_password" name="current_password" type="password" autocomplete="current-password">
                                    <span class="text-danger">{{ $errors->updatePassword->first('current_password') }}</span>
                                </div>
                                <div class="mb-3">
                                    <label for="update_password_password">New Password</label>
                                    <input class="form-control" id="update_password_password" name="password" type="password" autocomplete="new-password">
                                    <span class="text-danger">{{ $errors->updatePassword->first('password') }}</span>
                                </div>
                                <div class="mb-3">
                                    <label for="update_password_password_confirmation">Confirm Password</label>
                                    <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
                                    <span class="text-danger">{{ $errors->updatePassword->first('password_confirmation') }}</span>
                                </div>
                                <div class="mb-3">
                                    <button id="save" type='submit' class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-3">Delete Account</h5>
                            <div class="mb-3">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</div>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                Delete account
                            </button>
                            <span class="text-danger">{{ $errors->userDeletion->first('password') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 " id="deleteModalLabel">Are you sure you want to delete your account?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</div>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            placeholder="Password"
                            class="form-control w-3/4 "
                        >
                        <span class="text-danger">{{ $errors->userDeletion->first('password') }}</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete Account</button>
                    </div>
                    </div>
                </div>
            </div>
        </form>

    </main>
@endsection
