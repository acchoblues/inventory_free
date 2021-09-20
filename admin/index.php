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
          <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
          <p class="mb-4">Inventory <sup>App</sup> www.hakkoblogs.com</p>
          <a href="404.php" class="btn btn-lg btn-success" style="height: 100px; width 150px; margin-right:20px; margin-top: 10px;" ><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transaksi Masuk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> 
          <a href="input-transaksi-keluar.php" class="btn btn-lg btn-danger" style="height: 100px; width 150px; margin-right:20px; margin-top: 10px;" ><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transaksi Keluar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> 
          
          <?php
             if(isset($_GET['aksi']) == 'delete'){
				$id = $_GET['id'];
				$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?>
<br/><br/>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data History Transaksi</h6>
            </div>
            <div class="card-body">
            <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="custom-nav-a-tab" data-toggle="tab" href="#custom-nav-a" role="tab" aria-controls="custom-nav-a" aria-selected="true">History Barang Masuk Hari Ini</a>
                                            <a class="nav-item nav-link" id="custom-nav-b-tab" data-toggle="tab" href="#custom-nav-b" role="tab" aria-controls="custom-nav-b" aria-selected="false">History Barang Keluar Hari Ini  </a>
                                        </div>
                                    </nav>
<div class="tab-content" id="nav-tabContent">
<div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="custom-nav-a" role="tabpanel" aria-labelledby="custom-nav-a-tab">
                                        <div class="card-body">
                                        <?php
                   
                 $tgl=date("Y-m-d");
	               $query2="SELECT * FROM transaksi 
	               where status='IN' AND Tanggal='$tgl'";
                   
                    $tampil1=mysqli_query($koneksi, $query2) or die(mysqli_error($koneksi));
                    ?>
                  <table style="margin-top: 20px;" id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Rack No</th>
                        <th>Id Produk</th>
                        <th>Nama Produk</th>
                        <th>Qty</th>
                        <th>Satuan</th>
                        <th>Status</th>
                        <th>PIC</th>
                        <th>Note</th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data1=mysqli_fetch_array($tampil1))
                    { $no++;
                     ?>
                    <tbody>
                    <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data1['tanggal']; ?></td>
                    <td><?php echo $data1['rack_no']; ?></td>
                    <td><?php echo $data1['id_produk']; ?></td>
                    <td><?php echo $data1['nama_produk']; ?></td>
                    <td><?php echo $data1['qty']; ?></td>
                    <td><?php echo $data1['satuan']; ?></td>
                    <td><?php echo $data1['status']; ?></td>
                    <td><?php echo $data1['pic']; ?></td>
                    <td><?php echo $data1['note']; ?></td>
                    </tr>
                    
                    
                    <!-- <td><center><div id="thanks"><a class="btn btn-sm btn-warning" data-placement="bottom" data-toggle="tooltip" title="Cetak Gaji" href="cetak-per-perusahaan.php?hal=edit&kd=<?php //echo $data['no_lhv'];?>"><span class="glyphicon glyphicon-print"></span></a></td></tr></div>-->
                    
                 <?php   
              }
             
              ?>    
                   </tbody>
                   </table>
                            </div>
                                        </div>
  
                                        <div class="tab-pane fade" id="custom-nav-b" role="tabpanel" aria-labelledby="custom-nav-b-tab">
                                        <?php
                   
                   $tgl=date("Y-m-d");
                   $query2="SELECT * FROM transaksi 
                   where status='OUT' AND Tanggal='$tgl'";
                     
                      $tampil1=mysqli_query($koneksi, $query2) or die(mysqli_error($koneksi));
                      ?>
                    <table style="margin-top: 20px;" id="example" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Rack No</th>
                          <th>Id Produk</th>
                          <th>Nama Produk</th>
                          <th>Qty</th>
                          <th>Satuan</th>
                          <th>Status</th>
                          <th>PIC</th>
                          <th>Note</th>
                        </tr>
                    </thead>
                       <?php 
                       $no=0;
                       while($data1=mysqli_fetch_array($tampil1))
                      { $no++;
                       ?>
                      <tbody>
                      <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data1['tanggal']; ?></td>
                      <td><?php echo $data1['rack_no']; ?></td>
                      <td><?php echo $data1['id_produk']; ?></td>
                      <td><?php echo $data1['nama_produk']; ?></td>
                      <td><?php echo $data1['qty']; ?></td>
                      <td><?php echo $data1['satuan']; ?></td>
                      <td><?php echo $data1['status']; ?></td>
                      <td><?php echo $data1['pic']; ?></td>
                      <td><?php echo $data1['note']; ?></td>
                      </tr>
                      
                      
                      <!-- <td><center><div id="thanks"><a class="btn btn-sm btn-warning" data-placement="bottom" data-toggle="tooltip" title="Cetak Gaji" href="cetak-per-perusahaan.php?hal=edit&kd=<?php //echo $data['no_lhv'];?>"><span class="glyphicon glyphicon-print"></span></a></td></tr></div>-->
                      
                   <?php   
                }
               
                ?>    
                     </tbody>
                     </table>
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

  <script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"ajax-data-user.php", // json datasource
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
