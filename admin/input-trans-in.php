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
          <h1 class="h3 mb-2 text-gray-800">Proses Transaksi</h1>
          <p class="mb-4">WMS <sup>App</sup> PT. Y-TEC Autoparts Indonesia</p>
          <?php
            $kd = $_GET['id'];
            $stat = $_GET['stat'];
			$sql = mysqli_query($koneksi, "SELECT * FROM rack WHERE rack_no='$kd'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: pallet.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
            }
            //proses submit form
			if(isset($_POST['proses'])){
                //proses incoming
                //if(isset($_POST['status']) == "In"){
                     $a= "YAI";
                     $b= date("ymdHis");
                     $id = $a.$b;
                     $id_pallet = $_POST['id_pallet'];
                     $date      = $_POST['date'];
                     $part_no   = $_POST['part_no'];
                     $rack_no   = $_POST['rack_no'];
                     $qty       = $_POST['qty'];
                     $unit      = $_POST['unit'];
                     $status    = $_POST['status'];
                     $terisi    = "Terisi"; 
				
                     $insert = mysqli_query($koneksi, "INSERT INTO transaksi(id, tanggal, id_pallet, rack_no, part_no, qty, unit, status)
                     VALUES('$id', '$date', '$id_pallet', '$rack_no', '$part_no', '$qty', '$unit', '$status')") or die(mysqli_error($koneksi));

                     $qu = mysqli_query($koneksi, "UPDATE master_produk SET qty=(qty+'$qty') WHERE part_no='$part_no'");
                     if($insert&&$qu){
                          $querack = mysqli_query($koneksi, "UPDATE rack SET status='$terisi' WHERE rack_no='$rack_no'");

                          $insert_history = mysqli_query($koneksi, "INSERT INTO histori_transaksi(id, tanggal, id_pallet, rack_no, part_no, qty, unit, status)
                          VALUES('$id', '$date', '$id_pallet', '$rack_no', '$part_no', '$qty', '$unit', '$status')") or die(mysqli_error($koneksi));
                          //echo "<script>window.location = 'index.php'</script>";  
                          echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
				       }else{
					      echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
				       }

               //} 
                //proses outgoing
                /**if(isset($_POST['status']) == "Out") {
                    $a1= "OUT";
                    $b1= date("ymdHis");
                    $id1 = $a1.$b1;
                    $id_pallet1 = $_POST['id_pallet'];
                    $date1      = $_POST['date'];
                    $part_no1   = $_POST['part_no'];
                    $rack_no1   = $_POST['rack_no'];
                    $qty1       = $_POST['qty'];
                    $unit1      = $_POST['unit'];
                    $status1    = $_POST['status'];
                    $tersedia1    = "Tersedia"; 
               
                    $insert1 = mysqli_query($koneksi, "INSERT INTO outgoing(id_outgoing, tanggal, id_pallet, rack_no, part_no, qty, unit, status)
                   VALUES('$id1', '$date1', '$id_pallet1', '$rack_no1', '$part_no1', '$qty1', '$unit1', '$status1')") or die(mysqli_error());

                    $qu1 = mysqli_query($koneksi, "UPDATE master_produk SET qty=(qty-'$qty1') WHERE part_no='$part_no1'");
                    if($insert1&&$qu1){
                         $querack1 = mysqli_query($koneksi, "UPDATE rack SET status='$tersedia1' WHERE rack_no='$rack_no1'");
                         //echo "<script>window.location = 'index.php'</script>";  
                         echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
                      }else{
                         echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
                      }

                }**/
				
			}
			
			?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Proses Transaksi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                              <div class="col-sm-6">
                                  <input name="date" type="date" id="date" class="form-control" placeholder="Tanggal"  autocomplete="off" required />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">ID Pallet</label>
                              <div class="col-sm-6">
                                  <input name="id_pallet" type="text" id="text" class="form-control" placeholder="ID Pallet" autocomplete="off" required />
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Rack No</label>
                              <div class="col-sm-2">
                                  <input name="rack_no" type="text" id="rack_no" class="form-control" value="<?php echo $row['rack_no'];?>" readonly="readonly"/>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Part No</label>
                              <div class="col-sm-6">
                                  <input name="part_no" type="text" id="part_no" class="form-control" placeholder="Part No" autocomplete="off"  />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">QTY</label>
                              <div class="col-sm-3">
                                  <input name="qty" type="number" id="qty" class="form-control" placeholder="QTY" autocomplete="off"  />
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Unit</label>
                              <div class="col-sm-3">
                                  <input name="unit" type="text" id="unit" class="form-control" placeholder="Unit" autocomplete="off"  />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Status</label>
                              <div class="col-sm-2">
                                  <input name="status" type="text" id="status" class="form-control" value="<?php echo $stat; ?>" readonly="readonly"  />
                              </div>
                          </div>

                          <!--<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Status</label>
                              <div class="col-sm-2">
                                 <select name="status" class="form-control" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="In">In</option>
                                    <option value="Out">Out</option>
                                 </select>
                              </div> 
                          </div>-->
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="proses" value="Proses" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="index.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
  <?php include "footer.php"; ?>
</body>

</html>
