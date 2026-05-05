<nav id="top-navbar">
    <div class="d-flex align-items-center">
        <button type="button" id="sidebarCollapse" class="btn btn-light d-lg-none me-3">
            <i class="fa-solid fa-bars"></i>
        </button>
        <h5 class="mb-0 fw-semibold text-muted d-none d-md-block">Welcome back, {{ auth()->user()->name }}</h5>
    </div>
    <div class="d-flex align-items-center">
        <div class="dropdown">
            <button class="btn btn-light position-relative me-3 rounded-circle" style="width: 40px; height: 40px; padding: 0;">
                <i class="fa-solid fa-bell"></i>
                <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
            </button>
        </div>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown">
                @if(auth()->user()->profile_image)
                    <img src="{{ asset('uploads/profile/'.auth()->user()->profile_image) }}" alt="User" class="rounded-circle me-2 object-fit-cover" width="35" height="35">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=4f46e5&color=fff" alt="User" class="rounded-circle me-2 object-fit-cover" width="35" height="35">
                @endif
                <div class="d-none d-sm-block">
                    <div class="fw-semibold text-dark" style="font-size: 14px;">{{ auth()->user()->name }}</div>
                    <div class="text-muted" style="font-size: 12px;">{{ auth()->user()->email }}</div>
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3" aria-labelledby="userDropdown">
                <li>
                    <a class="dropdown-item py-2" href="{{ route('admin.profile.edit') }}">
                        <i class="fa-solid fa-user me-2"></i> My Profile
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item py-2 text-danger border-0 bg-transparent">
                            <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
