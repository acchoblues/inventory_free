<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-cube"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Inventory<sup>App</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Interface
</div>

 <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#master" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Part Master</span>
        </a>
        <div id="master" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="master.php">Data Master Part</a>
            <a class="collapse-item" href="input-master.php">Input Master Part</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#outgoing" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-truck"></i>
          <span>Transaksi</span>
        </a>
        <div id="outgoing" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="transaksi.php">Data Transaksi</a>
            <a class="collapse-item" href="404.php">Input Transaksi Masuk</a>
            <a class="collapse-item" href="input-transaksi-keluar.php">Input Transaksi Keluar</a>
          </div>
        </div>
      </li>

<!-- Nav Item - Utilities Collapse Menu -->
<?php if($_SESSION['level'] == "admin"){?>
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-users"></i>
    <span>User</span>
  </a>
  <div id="user" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">User</h6>
      <a class="collapse-item" href="user.php">User</a>
      <a class="collapse-item" href="input-user.php">Tambah User</a>
    </div>
  </div>
</li>
<?php } else if($_SESSION['level'] == "user"){ echo "";} ?>
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#report" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-list"></i>
    <span>Laporan</span>
  </a>
  <div id="report" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Report</h6>
      <a class="collapse-item" href="404.php">Transaksi Pertanggal</a>
      <a class="collapse-item" href="404.php">Material Stock</a>
      <a class="collapse-item" href="404.php">Penyimpanan Material</a>
      <a class="collapse-item" href="404.php">Kartu Stock Material</a>
    </div>
  </div>
</li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

<!-- Divider -->
<hr class="sidebar-divider">
</ul>