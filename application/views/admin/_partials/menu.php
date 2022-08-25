<nav class="navbar navbar-light bg-success">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Absensi Karyawan dan Guru SDIT Al-Khairaat</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/admin'); ?>">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/karyawan'); ?>">Karyawan dan Guru</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/report'); ?>">Laporan Absensi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/login/logout'); ?>">Logout</a>
        </li>
    </div>
  </div>
</nav>