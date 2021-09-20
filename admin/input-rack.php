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
          <p class="mb-4">WMS <sup>App</sup> PT. Y-TEC Autoparts Indonesia</p>
          <?php
if(isset($_POST['simpan'])){
$id         = $_POST['id'];
$rack_no    = $_POST['rack_no'];
$zona       = $_POST['zona'];
$lokasi     = $_POST['lokasi'];
$status     = $_POST['status'];

$query = mysqli_query($koneksi, "INSERT INTO rack (id, rack_no, zona, lokasi, status) VALUES ('$id', '$rack_no', '$zona', '$lokasi', '$status')");
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
              <h6 class="m-0 font-weight-bold text-primary">Input Rack</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form class="form-horizontal style-form" action="input-rack.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Id</label>
                              <div class="col-sm-6">
                                  <input name="id" type="text" id="id" class="form-control" placeholder="Tidak perlu di isi" autofocus="on" readonly="readonly" />
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Rack No</label>
                              <div class="col-sm-6">
                                  <input name="rack_no" type="text" id="rack_no" class="form-control" placeholder="Rack No" autocomplete="off" required />
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Rack Zona</label>
                              <div class="col-sm-6">
                                  <input name="zona" type="text" id="zona" class="form-control" placeholder="Rack Zona" autocomplete="off"  />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Lokasi</label>
                              <div class="col-sm-6">
                                 <select name="lokasi" id="lokasi" class="form-control" required>
                                 <option value="">-- Pilih --</option>
                                 <option value="Warehouse A">Warehouse A</option>
                                 <option value="Warehouse B">Warehouse B</option>
                                 <option value="Warehouse c">Warehouse C</option>
                                 </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Status</label>
                              <div class="col-sm-6">
                                 <select name="status" id="status" class="form-control" required>
                                 <option value="">-- Pilih --</option>
                                 <option value="Tersedia">Tersedia</option>
                                 <option value="Terisi">Terisi</option>
                                 </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="input-rack.php" class="btn btn-sm btn-danger">Batal </a>
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
