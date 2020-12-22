<!-- NAVBAR -->
<div class="container-fluid">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="{{ url('assets/images/Logo GoToour.png') }}" alt="Logo GoToour">
        </a>
        
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2">
                    <a href="{{ route('home') }}" class="nav-link active">Home</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="#" class="nav-link">Promo</a>
                </li>
                <li class="nav-item mx-md-2 dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbardrop">Product</a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Tour</a>
                        <a href="#" class="dropdown-item">Tiket Pesawat</a>
                        <a href="#" class="dropdown-item">Hotel</a>
                        <a href="#" class="dropdown-item">Paket Wisata</a>
                        <a href="#" class="dropdown-item">Visa</a>
                    </div>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="#" class="nav-link">Blog</a>
                </li>
            </ul>
            
            @guest
            <!-- Mobile button -->
            <form class="form-inline">
                <button class="btn btn-login my-2 mr-1 px-3" style="background-color: #022C5D; color: #ffffff;" type="button" onclick="event.preventDefault(); location.href='{{ url('register') }}';">
                    Register
                </button>
            </form>
            
            <!-- Desktop button -->
            <form class="form-inline">
                <button class="btn btn-login my-2 px-4" type="button" onclick="event.preventDefault(); location.href='{{ url('login') }}';">
                    Login
                </button>
            </form>
            @endguest
            
            @auth
            <!-- Mobile button -->
            <form class="form-inline d-sm-block d-md-none" action="{{ url('logout') }}" method="POST">
                @csrf
                <button class="btn btn-login my-2 my-sm-0" type="submit">
                    Logout
                </button>
            </form>
            
            <!-- Desktop button -->
            <form class="form-inline my-lg-0 d-none d-md-block" action="{{ url('logout') }}" method="POST">
                @csrf
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                    Logout
                </button>
            </form>
            @endauth
            
        </div>
    </nav>
</div>