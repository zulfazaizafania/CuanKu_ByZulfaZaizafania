<header id="header" class="header grey d-flex justify-content-between">
    <div class="top-left grey">
        <div class="navbar-header grey">
            <a class="navbar-brand" href="#"><img src="{{ url('images/logo-cent-panjang.png') }}" alt="Logo"
                    style="width: 90px; height: 50px;" /></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-th-list"></i></a>
        </div>
    </div>

    <form class="px-4 py-0" , action="{{url('logout')}}" , method="POST">
        @csrf
        <img src="https://ui-avatars.com/api/?name={{$user->name}}" alt="foto" width="40" , class="mr-2 rounded-circle">
        <span class="navbar-text mr-3 align-middle">
            Hello, {{ $user->name }}
        </span>
        <button type="submit" class="btn btn-primary btn-sm" style="height: 70%; margin-top:5px; padding: auto;">Keluar
            </button>
    </form>
</header>
