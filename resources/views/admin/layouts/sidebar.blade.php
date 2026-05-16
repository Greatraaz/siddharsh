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
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-gauge-high"></i>
            <span>Dashboard</span>
        </a>
        <div class="px-4 pt-3 pb-2">
            <small class="text-uppercase text-muted fw-bold" style="font-size: 10px; letter-spacing: 1px;">Management</small>
        </div>
        <a href="{{ route('admin.brands.index') }}" class="nav-link {{ request()->routeIs('admin.brands.*') ? 'active' : '' }}">
            <i class="fa-solid fa-copyright"></i>
            <span>Brands</span>
        </a>
        <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
            <i class="fa-solid fa-layer-group"></i>
            <span>Categories</span>
        </a>
        <a href="{{ route('admin.subcategories.index') }}" class="nav-link {{ request()->routeIs('admin.subcategories.*') ? 'active' : '' }}">
            <i class="fa-solid fa-list-ul"></i>
            <span>Subcategories</span>
        </a>
        <a href="{{ route('admin.childcategories.index') }}" class="nav-link {{ request()->routeIs('admin.childcategories.*') ? 'active' : '' }}">
            <i class="fa-solid fa-sitemap"></i>
            <span>Child Categories</span>
        </a>
        <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
            <i class="fa-solid fa-box"></i>
            <span>Products</span>
        </a>
        <a href="{{ route('admin.solutions.index') }}" class="nav-link {{ request()->routeIs('admin.solutions.*') ? 'active' : '' }}">
            <i class="fa-solid fa-lightbulb"></i>
            <span>Solutions</span>
        </a>
        <a href="{{ route('admin.enquiries.index') }}" class="nav-link {{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}">
            <i class="fa-solid fa-envelope"></i>
            <span>Enquiries</span>
            @php $unreadCount = \App\Models\Enquiry::where('is_read', false)->count(); @endphp
            @if($unreadCount > 0)
                <span class="badge bg-danger rounded-pill ms-auto">{{ $unreadCount }}</span>
            @endif
        </a>
        <a href="{{ route('admin.newsletters.index') }}" class="nav-link {{ request()->routeIs('admin.newsletters.*') ? 'active' : '' }}">
            <i class="fa-solid fa-paper-plane"></i>
            <span>Newsletter</span>
        </a>

        <div class="px-4 pt-3 pb-2">
            <small class="text-uppercase text-muted fw-bold" style="font-size: 10px; letter-spacing: 1px;">Settings</small>
        </div>
       
        <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
            <i class="fa-solid fa-gear"></i>
            <span>General Settings</span>
        </a>
        <a href="{{ route('admin.profile.edit') }}" class="nav-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
            <i class="fa-solid fa-user"></i>
            <span>Profile</span>
        </a>

       <form action="{{ route('admin.logout') }}" method="POST">

    @csrf

    <button type="submit" class="nav-link text-danger border-0 bg-transparent w-100 text-start">

        <i class="fa-solid fa-right-from-bracket"></i>

        <span>Logout</span>

    </button>

</form>
    </div>
</div>
