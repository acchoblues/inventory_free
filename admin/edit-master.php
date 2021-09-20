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
          <h1 class="h3 mb-2 text-gray-800">Master Produk</h1>
          <p class="mb-4">Event <sup>App</sup> www.hakkoblogs.com</p>
          <?php
            $kd = $_GET['id'];
			$sql = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$kd'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: master.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['update'])){
                $id_produk    = $_POST['id_produk'];
                $nama_produk  = $_POST['nama_produk'];
                $jenis_barang = $_POST['jenis_barang'];
                $kategori     = $_POST['kategori'];
                $qty          = $_POST['qty'];
                $satuan       = $_POST['satuan'];
                $harga        = $_POST['harga'];
				
				$update = mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama_produk', jenis_barang='$jenis_barang', kategori='$kategori', qty='$qty', satuan='$satuan', harga='$harga' WHERE id_produk='$id_produk'") or die(mysqli_error());
				if($update){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}
			
			//if(isset($_GET['pesan']) == 'sukses'){
			//	echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
			//}
			?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data Master Produk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Id Produk</label>
                              <div class="col-sm-6">
                                  <input name="id_produk" type="text" id="id_produk" class="form-control" value="<?php echo $row['id_produk']; ?>" placeholder="Tidak perlu di isi" autofocus="on" required />
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Produk</label>
                              <div class="col-sm-6">
                                  <input name="nama_produk" type="text" id="nama_produk" class="form-control" value="<?php echo $row['nama_produk']; ?>" placeholder="Partname" autocomplete="off" required />
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jenis Barang</label>
                              <div class="col-sm-6">
                                  <input name="jenis_barang" type="text" id="jenis_barang" class="form-control" value="<?php echo $row['jenis_barang']; ?>" placeholder="jenis Barang" autocomplete="off"  />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                              <div class="col-sm-6">
                                  <input name="kategori" type="text" id="kategori" class="form-control" value="<?php echo $row['kategori']; ?>" placeholder="Kategori" autocomplete="off"  />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">QTY</label>
                              <div class="col-sm-6">
                                  <input name="qty" type="number" id="qty" class="form-control" value="<?php echo $row['qty']; ?>" placeholder="QTY" autocomplete="off"  />
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Satuan</label>
                              <div class="col-sm-6">
                                  <input name="satuan" type="text" id="satuan" class="form-control" value="<?php echo $row['satuan']; ?>" placeholder="Satuan" autocomplete="off"  />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                              <div class="col-sm-6">
                                  <input name="harga" type="text" id="harga" class="form-control" value="<?php echo $row['harga']; ?>" placeholder="Remark" autocomplete="off"  />
                              </div> 
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update" value="Update" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="master.php" class="btn btn-sm btn-danger">Batal </a>
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
