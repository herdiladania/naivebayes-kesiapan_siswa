<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-left" href="/beranda">
                <div class="sidebar-brand-text mx-3">SIPAMAD</div>
                <img class="logo" src="{{ asset('HeroBiz') }}/assets/img/logo.png" alt="SIPAMAD Logo">

            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/beranda">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('data-siswa') }}">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Data Siswa</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('data-siswa') }}" data-toggle="collapse"
                    data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Naive Bayes</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('data-latih') }}">Kelola Data Latih</a>
                        <a class="collapse-item" href="{{ route('data-atribut') }}">Kelola Atribut</a>
                        <a class="collapse-item" href="{{ route('data-nilai') }}">Kelola Nilai</a>
                        <a class="collapse-item" href="{{ route('data-penilaian') }}">Kelola Penilaian</a>
                        <a class="collapse-item" href="{{ route('data-perhitungan') }}">Perhitungan</a>
                        <a class="collapse-item" href="{{ route('data-hasil') }}">Data Hasil</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('data-riwayat') }}">
                    <i class="fas fa-fw fa-history"></i>
                    <span>Riwayat</span></a>
                <hr class="sidebar-divider">
            </li>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('kelola-akun') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Kelola Akun</span></a>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
