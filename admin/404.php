<?php include "session.php"; ?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
   <?php include "menu.php"; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include "navbar.php"; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">404 Not Found</h1>
          <p class="mb-4">Inventory <sup>App</sup> www.hakkoblogs.com</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ups, 404 Not Found !</h6>
            </div>
            <div class="card-body">
            
            </div><!-- /.box-body -->
            <pre>
              Ups.. Halaman ini hanya ada di versi pro, jika anda berminat aplikasi inventory pro version silahkan hubungi creator
              Hakko Bio Richard
              SMS / TLP : 0856 949 848 03
              WA / TELEGRAM : 0856 949 848 03
              Blog : www.hakkoblogs.com
            </pre>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
  <?php include "footer.php"; ?>
  <script>
     $(function () {
    $(".select2").select2();
    });
    </script>
</body>

</html>
