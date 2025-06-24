<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('dashboard') }}">
          <i class="fas fa-home"></i> Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('pembayaran.index') }}">
          <i class="fas fa-money-check-alt"></i> Pembayaran
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('laporan.index') }}">
          <i class="fas fa-file-alt"></i> Laporan
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">
          <i class="fas fa-file-alt"></i> login
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('regis') }}">
          <i class="fas fa-file-alt"></i> Sign-UP
        </a>
      </li>
    </ul>
  </div>
</nav>
