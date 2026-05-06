<nav id="top-navbar">
    <div class="d-flex align-items-center">
        <button type="button" id="sidebarCollapse" class="btn btn-light d-lg-none me-3">
            <i class="fa-solid fa-bars"></i>
        </button>
        <h5 class="mb-0 fw-semibold text-muted d-none d-md-block">Welcome back, {{ auth()->user()->name }}</h5>
    </div>
    <div class="d-flex align-items-center">
        @php
            $unreadEnquiries = \App\Models\Enquiry::where('is_read', false)->latest()->take(5)->get();
            $unreadCount = \App\Models\Enquiry::where('is_read', false)->count();
        @endphp
        <div class="dropdown">
            <button class="btn btn-light position-relative me-3 rounded-circle" style="width: 40px; height: 40px; padding: 0;" id="notifDropdown" data-bs-toggle="dropdown">
                <i class="fa-solid fa-bell"></i>
                @if($unreadCount > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
                        {{ $unreadCount > 9 ? '9+' : $unreadCount }}
                    </span>
                @endif
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3 p-0" aria-labelledby="notifDropdown" style="width: 300px;">
                <li class="p-3 border-bottom d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 fw-bold">Notifications</h6>
                    @if($unreadCount > 0)
                        <span class="badge bg-primary-soft text-primary">{{ $unreadCount }} New</span>
                    @endif
                </li>
                <div class="overflow-auto" style="max-height: 350px;">
                    @forelse($unreadEnquiries as $notif)
                    <li>
                        <a class="dropdown-item p-3 border-bottom d-flex align-items-start" href="{{ route('admin.enquiries.show', $notif->id) }}">
                            <div class="bg-primary-soft text-primary rounded-circle p-2 me-3">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="min-w-0">
                                <div class="fw-bold text-dark text-truncate" style="font-size: 13px;">New Inquiry: {{ $notif->name }}</div>
                                <div class="text-muted text-truncate" style="font-size: 12px;">{{ Str::limit($notif->message, 50) }}</div>
                                <div class="text-muted mt-1" style="font-size: 11px;">{{ $notif->created_at->diffForHumans() }}</div>
                            </div>
                        </a>
                    </li>
                    @empty
                    <li class="p-4 text-center text-muted">
                        <i class="fa-solid fa-bell-slash mb-2 d-block opacity-25" style="font-size: 1.5rem;"></i>
                        <span style="font-size: 13px;">No new notifications</span>
                    </li>
                    @endforelse
                </div>
                <li>
                    <a class="dropdown-item py-2 text-center text-primary fw-bold border-top" href="{{ route('admin.enquiries.index') }}" style="font-size: 12px;">
                        View All Enquiries
                    </a>
                </li>
            </ul>
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
