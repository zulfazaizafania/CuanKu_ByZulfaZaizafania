<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('dashboard') }}"><i class="menu-icon fa fa-home"></i>Beranda
                    </a>
                </li>
                <br>

                <li class="menu-titles mt-3">Prioritas</li>
                <!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('transactions.create','type=Essential')}}">
                        <i class="menu-icon fa fa-plus-square"></i>Tambah
                        Pembelian</a>
                </li>
                <li class="">
                    <a href="{{ route('transactions.index','type=Essential')}}">
                        <i class="menu-icon fa fa-money"></i>Riwayat
                        Pembelian</a>
                </li>
                <br>

                <li class="menu-titles mt-3">Ingin</li>
                <!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('transactions.create','type=Want') }}">
                        <i class="menu-icon fa fa-plus-square"></i>Tambah
                        Pembelian</a>
                </li>
                <li class="">
                    <a href="{{ route('transactions.index','type=Want')}}">
                        <i class="menu-icon fa fa-money"></i>Riwayat
                        Pembelian</a>
                </li>
                <br>

                <li class="menu-titles mt-3">Total Saldo + Tabungan</li>
                <!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('transactions.create','type=Total') }}">
                        <i class="menu-icon fa fa-plus-square"></i>Tambah
                        Uang</a>
                </li>
                <!-- <form class="px-4 py-0" , action="{{url('logout')}}" , method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-primary ">Logout(tombol sementara)</button>
                </form> -->
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</aside>
