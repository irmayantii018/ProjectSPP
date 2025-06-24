@extends('layout.master')
@section('isi')
<body>
    <div class="wrapper d-flex">
        <!-- Sidebar -->
        <nav class="sidebar bg-dark text-white p-3">
            <div class="sidebar-header mb-4">
                <h4 class="text-center">SPP System</h4>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link text-white @if(request()->routeIs('dashboard')) active @endif"
                       href="{{ route('dashboard') }}">
                        <i class="fas fa-home me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white @if(request()->routeIs('siswa.*')) active @endif"
                       href="{{ route('siswa.index') }}">
                        <i class="fas fa-user-graduate me-2"></i> Data Siswa
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white @if(request()->routeIs('pembayaran.*')) active @endif"
                       href="{{ route('pembayaran.index') }}">
                        <i class="fas fa-money-check-alt me-2"></i> Pembayaran
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white @if(request()->routeIs('laporan.*')) active @endif"
                       href="{{ route('laporan.index') }}">
                        <i class="fas fa-file-alt me-2"></i> Laporan
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar -->

        <!-- Main Panel -->
        <div class="main-panel flex-grow-1 bg-light">
            <!-- Header -->
            <header class="main-header bg-white shadow-sm p-3 d-flex align-items-center">
                <button class="btn btn-sm btn-outline-secondary me-3" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h5 class="mb-0">Sistem Web Pembayaran SPP</h5>
            </header>

            <!-- Content -->
            <main class="container-fluid p-4">
                <div class="page-inner">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h3 class="fw-bold">Dashboard Pembayaran SPP Siswa</h3>
                            <p class="text-muted">Ringkasan transaksi dan statistik pembayaran</p>
                        </div>
                    </div>

                    <!-- Contoh kartu statistik -->
                    <div class="row g-3">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-users fa-2x text-primary"></i>
                                        <div class="ms-3">
                                            <h6>Total Siswa</h6>
                                            <h4>{{ $totalSiswa ?? '—' }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-money-bill-wave fa-2x text-success"></i>
                                        <div class="ms-3">
                                            <h6>Transaksi Bulan Ini</h6>
                                            <h4>Rp {{ number_format($transaksiBulan ?? 0, 0, ',', '.') }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tambah kartu lain sesuai kebutuhan -->
                    </div>

                    <!-- Placeholder untuk konten dinamis -->
                    @yield('content')
                </div>
            </main>
        </div>
        <!-- End Main Panel -->
    </div>

    <script>
        // Toggle sidebar (opsional)
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('collapsed');
        });
    </script>
</body>
@endsection
