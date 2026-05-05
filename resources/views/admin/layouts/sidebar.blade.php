<div id="sidebar" style="height: 100vh; overflow-y: auto; overflow-x: hidden;">
    <div class="sidebar-header">
<img src="{{ asset('uploads/logo.png/') }}" alt="User" class="rounded-circle me-2" width="200">    </div>
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
        <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
            <i class="fa-solid fa-box"></i>
            <span>Products</span>
        </a>
        <!-- <div class="px-4 pt-3 pb-2">
            <small class="text-uppercase text-muted fw-bold" style="font-size: 10px; letter-spacing: 1px;">Access Control</small>
        </div>
        <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
            <i class="fa-solid fa-shield-halved"></i>
            <span>Permissions</span> 
        </a>

        <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <i class="fa-solid fa-users"></i>
            <span>Admin Users</span>
        </a> -->

        <div class="px-4 pt-3 pb-2">
            <small class="text-uppercase text-muted fw-bold" style="font-size: 10px; letter-spacing: 1px;">Settings</small>
        </div>
       
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
