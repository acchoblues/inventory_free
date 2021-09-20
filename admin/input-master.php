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
          <p class="mb-4">Inventory <sup>App</sup> www.hakkoblogs.com</p>
          <?php
        if(isset($_POST['simpan'])){
        $id_produk     = $_POST['id_produk'];
        $nama_produk   = $_POST['nama_produk'];
        $jenis_barang  = $_POST['jenis_barang'];
        $kategori      = $_POST['kategori'];
        $qty           = $_POST['qty'];
        $satuan        = $_POST['satuan'];
        $harga        = $_POST['harga'];

        $query = mysqli_query($koneksi, "INSERT INTO produk (id_produk, nama_produk, jenis_barang, kategori, qty, satuan, harga) VALUES ('$id_produk', '$nama_produk', '$jenis_barang', '$kategori', '$qty', '$satuan', '$harga' )");
        if ($query){
	                echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
			}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
				}
            }
                ?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Input Master Produk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form class="form-horizontal style-form" action="input-master.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Id Produk</label>
                              <div class="col-sm-6">
                                  <input name="id_produk" type="text" id="id_produk" class="form-control" placeholder="Id Produk" autofocus="on" required />
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Produk</label>
                              <div class="col-sm-6">
                                  <input name="nama_produk" type="text" id="nama_produk" class="form-control" placeholder="Nama Produk" autocomplete="off" required />
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jenis Produk</label>
                              <div class="col-sm-6">
                                  <input name="jenis_barang" type="text" id="jenis_barang" class="form-control" placeholder="Jenis Produk" autocomplete="off"  />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                              <div class="col-sm-6">
                                  <input name="kategori" type="text" id="kategori" class="form-control" placeholder="Kategori" autocomplete="off"  />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">QTY</label>
                              <div class="col-sm-6">
                                  <input name="qty" type="number" id="qty" class="form-control" placeholder="QTY" autocomplete="off"  />
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Satuan</label>
                              <div class="col-sm-6">
                                  <input name="satuan" type="text" id="satuan" class="form-control" placeholder="Satuan" autocomplete="off"  />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                              <div class="col-sm-6">
                                  <input name="harga" type="number" id="harga" class="form-control" placeholder="Harga" autocomplete="off"  />
                              </div> 
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="input-master.php" class="btn btn-sm btn-danger">Batal </a>
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
						url :"ajax-data-rack.php", // json datasource
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
