{{-- Header --}}
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                				<i class="align-middle" data-feather="settings"></i>
							</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<img src="{{asset('admin_assets/img/avatars/avatar-4.jpg')}}" class="avatar img-fluid rounded me-1" alt="{{Auth::user()->full_name}}" /> <span class="text-dark">{{Auth::user()->full_name}}</span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <a class="dropdown-item text-danger" onclick="event.preventDefault();
                                        this.closest('form').submit();" class="dropdown-item text-danger">
                                        Log out
                                    </a>
                                </form>
							</div>
						</li>
					</ul>
				</div>
			</nav>
