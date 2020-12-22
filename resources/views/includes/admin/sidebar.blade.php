<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Gotoour Admin</div>
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tour" aria-expanded="true" aria-controls="tour">
            <i class="fas fa-fw fa-hotel"></i>
            <span>Tour & Travel</span>
        </a>
        <div id="tour" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Tour & Travel</h6>
                <a class="collapse-item" href="{{ route('travel-package.index') }}">Travel to Asia</a>
                <a class="collapse-item" href="#">Travel to Africa</a>
                <a class="collapse-item" href="#">Travel to America</a>
                <a class="collapse-item" href="#">Travel to Australia</a>
                <a class="collapse-item" href="#">Travel to Europe</a>
                <a class="collapse-item" href="#">Coba terakhir ni</a>
            </div>
        </div>
    </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#gallery" aria-expanded="true" aria-controls="gallery">
            <i class="fas fa-fw fa-images"></i>
            <span>Gallery</span>
        </a>
        <div id="gallery" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Tour & Travel</h6>
                <a class="collapse-item" href="{{ route('gallery.index') }}">Gallery Travel Asia</a>
                <a class="collapse-item" href="#">Gallery Travel Africa</a>
                <a class="collapse-item" href="#">Gallery Travel America</a>
                <a class="collapse-item" href="#">Gallery Travel Australia</a>
                <a class="collapse-item" href="#">Gallery Travel Europe</a>
            </div>
        </div>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('transaction.index') }}">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Transactions</span>
        </a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <br>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    
</ul>
<!-- End of Sidebar -->