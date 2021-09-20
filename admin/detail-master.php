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
          <h1 class="h3 mb-2 text-gray-800">Rack</h1>
          <p class="mb-4">Inventory <sup>App</sup> www.hakkoblogs.com</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Cetak QR Rack</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <?php include "../phpqrcode/qrlib.php"; ?>
              <?php
            $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$_GET[id]'");
            $data  = mysqli_fetch_array($query);
            ?>
            <div class="text-right">
                  <a href="javascript:printDiv('print-area-2');" class="btn btn-sm btn-danger" >Cetak  <i class="fa fa-print"></i></a>
              
                </div>
                 <div class="print-area table-responsif" id="print-area-2">
                <table id="example" class="table table-hover table-bordered">
                      <tr>
                      <td><center><?php QRcode::png("$_GET[id]", "../png/$_GET[id].png", "L", 10, 10); ?><?php echo "<img src='../png/$_GET[id].png' /><br/>" ?></center>
                      </td>
                      <td><center><?php QRcode::png("$_GET[id]", "../png/$_GET[id].png", "L", 10, 10); ?><?php echo "<img src='../png/$_GET[id].png' /><br/>" ?></center>
                      </td>
                      </tr>
  
                      <tr>
                      <td><center><b><h1><?php echo $data['id_produk']; ?></h1></b></center></td>
                      <td><center><b><h1><?php echo $data['id_produk']; ?></h1></b></center></td>
                     </tr>

                     <tr>
                      <td><center><b><h1><?php echo $data['nama_produk']; ?></h1></b></center></td>
                      <td><center><b><h1><?php echo $data['nama_produk']; ?></h1></b></center></td>
                     </tr>
                      
                      </table>

  </div>
   <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
   
    <div class="text-right">
                  <a href="javascript:printDiv('print-area-2');" class="btn btn-sm btn-danger" >Cetak  <i class="fa fa-print"></i></a>
              
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
  <?php include "footer.php"; ?>
  <script type="text/javascript">
     
     function printDiv(elementId) {
    var a = document.getElementById('print-area-2').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}
</script>
</body>

</html>
