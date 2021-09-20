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
          <h1 class="h3 mb-2 text-gray-800">Transaksi Keluar</h1>
          <p class="mb-4">Inventory <sup>App</sup> www.hakkoblogs.com</p>
          <?php
if(isset($_POST['simpan'])){

$tanggal        = $_POST['date'];
$rack_no     = $_POST['rack_no'];
$id_produk   = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$qty         = $_POST['qty'];
$satuan      = $_POST['satuan'];
$status      = "OUT";
$pic         = $_POST['pic'];
$note        = $_POST['note'];
$entry       = $_SESSION['fullname'];

                    $insert = mysqli_query($koneksi, "INSERT INTO transaksi(tanggal, rack_no, id_produk, nama_produk, qty, satuan, status, pic, note, entry)
                     VALUES('$tanggal', '$rack_no', '$id_produk', '$nama_produk', '$qty', '$satuan', '$status', '$pic', '$note', '$entry' )") or die(mysqli_error($koneksi));

                    $qu = mysqli_query($koneksi, "UPDATE produk SET qty=(qty-'$qty') WHERE id_produk='$id_produk'");
                     if($insert&&$qu){
                          //$querack = mysqli_query($koneksi, "UPDATE rack SET status='$terisi' WHERE rack_no='$rack_no'");

                          //$insert_history = mysqli_query($koneksi, "INSERT INTO histori_transaksi(id, tanggal, id_pallet, rack_no, part_no, qty, unit, status, pic)
                          //VALUES('$id', '$date', '$id_pallet', '$rack_no', '$part_no', '$qty', '$unit', '$status', '$_SESSION[fullname]')") or die(mysqli_error($koneksi));
                          //echo "<script>window.location = 'index.php'</script>";  
                          echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
				       }else{
					      echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
                       }
}

                ?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Input Transaksi Barang Keluar</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form class="form-horizontal style-form" action="input-transaksi-keluar.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                              <div class="col-sm-3">
                                  <input name="date" type="date" id="date" class="form-control" value="<?php $d = date("Y-m-d"); echo $d; ?>" placeholder="Date" autocomplete="off" required/>
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Rack No</label>
                              <div class="col-sm-3">
                                  <input name="rack_no" type="text" id="rack_no" class="form-control" placeholder="Rack No" autocomplete="off"  />
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Id Produk <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><b>Cari</b> <span class="glyphicon glyphicon-search"></span></button>
                              </label>
                              <div class="col-sm-3">
                              <input name="id_produk" type="text" id="id_produk" class="form-control" placeholder="Id Produk" autocomplete="off"  />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Produk</label>
                              <div class="col-sm-6">
                                  <input name="nama_produk" type="text" id="nama_produk" class="form-control" placeholder="Nama Produk" autocomplete="off" required="required" />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">QTY</label>
                              <div class="col-sm-2">
                                  <input name="qty" type="number" id="qty" class="form-control" placeholder="QTY" autocomplete="off" required="required" />
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Satuan</label>
                              <div class="col-sm-2">
                                  <input name="satuan" type="text" id="satuan" class="form-control" placeholder="Satuan" autocomplete="off" required="required"  />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Pic</label>
                              <div class="col-sm-6">
                                  <input name="pic" type="text" id="pic" class="form-control" placeholder="PIC" autocomplete="off" required="required"  />
                              </div> 
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Notes</label>
                              <div class="col-sm-6">
                                  <input name="note" type="text" id="note" class="form-control" placeholder="Notes" autocomplete="off" required="required"  />
                              </div> 
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="transaksi.php" class="btn btn-sm btn-danger">Batal </a>
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
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="width:600px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Master Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Part No</th>
                                    <th>Partname</th>
									<th>Qty</th>
                                    <th>Satuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Data mentah yang ditampilkan ke tabel    
                               
                                $query = mysqli_query($koneksi, 'SELECT * FROM produk');
                                while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                    <tr class="pilih" data-part="<?php echo $data['id_produk'];  ?>" data-name="<?php echo $data['nama_produk'];  ?>" data-satuan="<?php echo $data['satuan'];  ?>">
                                        <td><?php echo $data['id_produk']; ?></td>
                                        <td><?php echo $data['nama_produk']; ?></td>
                                        <td><?php echo $data['qty']; ?></td>
										<td><?php echo $data['satuan']; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">

//            jika dipilih, nim akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("id_produk").value = $(this).attr('data-part');
                document.getElementById("nama_produk").value = $(this).attr('data-name');
                document.getElementById("satuan").value = $(this).attr('data-satuan');
                $('#myModal').modal('hide');
            });
			

//            tabel lookup mahasiswa
            $(function () {
                $("#lookup").dataTable();
            });

            function dummy() {
                var nim = document.getElementById("nim").value;
                alert('Nomor Induk Mahasiswa ' + nim + ' berhasil tersimpan');
				
				var ket = document.getElementById("ket").value;
                alert('Keterangan ' + ket + ' berhasil tersimpan');
            }
        </script>
</body>

</html>
