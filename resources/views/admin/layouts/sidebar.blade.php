<div id="sidebar" style="height: 100vh; overflow-y: auto; overflow-x: hidden;">
    <div class="sidebar-header" style="justify-content: center;">
        @php
            $setting = \App\Models\Setting::first();
        @endphp
        @if($setting && $setting->logo)
            <img src="{{ asset('uploads/settings/' . $setting->logo) }}" alt="Logo" style="max-height: 45px; max-width: 100%;">
        @else
            <img src="{{ asset('uploads/logo.png') }}" alt="Logo" class="rounded-circle me-2" width="200">
        @endif
    </div>
    <div class="py-4">
        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-gauge-high"></i>
            <span>Dashboard</span>
        </a>

        {{-- Management Section --}}
        @canany(['view-brands', 'view-categories', 'view-subcategories', 'view-childcategories', 'view-products', 'view-solutions', 'view-enquiries', 'view-newsletters'])
            <div class="px-4 pt-3 pb-2">
                <small class="text-uppercase text-muted fw-bold" style="font-size: 10px; letter-spacing: 1px;">Management</small>
            </div>

            @can('view-brands')
                <a href="{{ route('admin.brands.index') }}" class="nav-link {{ request()->routeIs('admin.brands.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-copyright"></i>
                    <span>Brands</span>
                </a>
            @endcan

            @can('view-categories')
                <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-layer-group"></i>
                    <span>Categories</span>
                </a>
            @endcan

            @can('view-subcategories')
                <a href="{{ route('admin.subcategories.index') }}" class="nav-link {{ request()->routeIs('admin.subcategories.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-list-ul"></i>
                    <span>Subcategories</span>
                </a>
            @endcan

            @can('view-childcategories')
                <a href="{{ route('admin.childcategories.index') }}" class="nav-link {{ request()->routeIs('admin.childcategories.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-sitemap"></i>
                    <span>Child Categories</span>
                </a>
            @endcan

            @can('view-products')
                <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-box"></i>
                    <span>Products</span>
                </a>
            @endcan

            @can('view-solutions')
                <a href="{{ route('admin.solutions.index') }}" class="nav-link {{ request()->routeIs('admin.solutions.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-lightbulb"></i>
                    <span>Solutions</span>
                </a>
            @endcan

            @can('view-enquiries')
                <a href="{{ route('admin.enquiries.index') }}" class="nav-link {{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-envelope"></i>
                    <span>Enquiries</span>
                    @php $unreadCount = \App\Models\Enquiry::where('is_read', false)->count(); @endphp
                    @if($unreadCount > 0)
                        <span class="badge bg-danger rounded-pill ms-auto">{{ $unreadCount }}</span>
                    @endif
                </a>
            @endcan

            @can('view-newsletters')
                <a href="{{ route('admin.newsletters.index') }}" class="nav-link {{ request()->routeIs('admin.newsletters.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-paper-plane"></i>
                    <span>Newsletter</span>
                </a>
            @endcan
        @endcanany

        {{-- Access Control Section --}}
        @canany(['view-users', 'view-roles', 'view-permissions'])
            <div class="px-4 pt-3 pb-2">
                <small class="text-uppercase text-muted fw-bold" style="font-size: 10px; letter-spacing: 1px;">Access Control</small>
            </div>

            @can('view-users')
                <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users"></i>
                    <span>Users</span>
                </a>
            @endcan

            @can('view-roles')
                <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-shield"></i>
                    <span>Roles</span>
                </a>
            @endcan

            @can('view-permissions')
                <a href="{{ route('admin.permissions.index') }}" class="nav-link {{ request()->routeIs('admin.permissions.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-key"></i>
                    <span>Permissions</span>
                </a>
            @endcan
        @endcanany

        {{-- Settings Section --}}
        <div class="px-4 pt-3 pb-2">
            <small class="text-uppercase text-muted fw-bold" style="font-size: 10px; letter-spacing: 1px;">Settings</small>
        </div>
       
        @can('edit-settings')
            <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="fa-solid fa-gear"></i>
                <span>General Settings</span>
            </a>
        @endcan

        @can('manage-system')
            <a href="{{ route('admin.system.index') }}" class="nav-link {{ request()->routeIs('admin.system.*') ? 'active' : '' }}">
                <i class="fa-solid fa-terminal"></i>
                <span>System Management</span>
            </a>
        @endcan

        @can('edit-profile')
            <a href="{{ route('admin.profile.edit') }}" class="nav-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                <i class="fa-solid fa-user"></i>
                <span>Profile</span>
            </a>
        @endcan

        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="nav-link text-danger border-0 bg-transparent w-100 text-start">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</div>
