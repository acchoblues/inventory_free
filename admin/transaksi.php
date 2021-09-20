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
          <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
          <p class="mb-4">Inventory<sup>App</sup> www.hakkoblogs.com</p>
          <?php
          if(isset($_GET['aksi']) == 'delete'){
				$id      = $_GET['id'];
        $id_prod = $_GET['id_produk'];
        $quan    = $_GET['qty'];
        $stat    = $_GET['status'];

				$cek = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id='$id'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
          if($stat == 'OUT'){
					$delete = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id='$id'");
          $qu = mysqli_query($koneksi, "UPDATE produk SET qty=(qty+'$quan') WHERE id_produk='$id_prod'");
                    
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
        } else if($stat == 'IN'){
					$delete = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id='$id'");
          $qu = mysqli_query($koneksi, "UPDATE produk SET qty=(qty-'$quan') WHERE id_produk='$id_prod'");
                    
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
        }

				}  
      
			} 
      
			?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="lookup" class="table table-bordered table-hover">  
	<thead bgcolor="eeeeee" align="center">
      <tr>
	 
       <th>id</th>
	   <th>Tanggal</th>
       <th>Id Produk</th>
       <th>Nama Produk</th>
       <th>Qty</th>
       <th>Unit</th>
       <th>Status</th>
       <th>Pic</th>
       <th>Note</th>
       <th>Entry</th>
	   <th class="text-center"> Action </th>
	  
      </tr>
    </thead>
    <tbody>
	 
					 
    </tbody>
  </table>  
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
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"ajax-data-transaksi.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			} );
        </script>
</body>

</html>
