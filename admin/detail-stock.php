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
          <h1 class="h3 mb-2 text-gray-800">Part Master</h1>
          <p class="mb-4">WMS <sup>App</sup> www.hakkoblogs.com</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Detail Stock Strorage</h6>
            </div>
            <div class="card-body">

            <!--Start Tab Pane 
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="custom-nav-a-tab" data-toggle="tab" href="#custom-nav-a" role="tab" aria-controls="custom-nav-a" aria-selected="true">A</a>
                    <a class="nav-item nav-link" id="custom-nav-b-tab" data-toggle="tab" href="#custom-nav-b" role="tab" aria-controls="custom-nav-b" aria-selected="false">B</a>
                                            
                 </div>
             </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                    <div class="tab-pane fade" id="custom-nav-a" role="tabpanel" aria-labelledby="custom-nav-a-tab">
                                            <p>A</p>
                    </div>
                    <div class="tab-pane fade" id="custom-nav-b" role="tabpanel" aria-labelledby="custom-nav-b-tab">
                                            <p>B</p>
                    </div>
                </div>
            </div>
             End Tab Pane -->
             
              <div class="table-responsive">
              <?php
            $query = mysqli_query($koneksi, "SELECT * FROM master_produk WHERE part_no='$_GET[id]'");
            $data  = mysqli_fetch_array($query);
            ?>
            <div class="text-right">
                  <a href="javascript:printDiv('print-area-2');" class="btn btn-sm btn-danger" >Cetak  <i class="fa fa-print"></i></a>
              
                </div>
                 <div class="print-area table-responsif" id="print-area-2">
            
                 <h4>Part Master</h4>
                   <table id="example" class="table table-hover table-bordered">
                      <tr>
                      <td>Part No</td>
                      <td><?php echo $data['part_no']; ?></td>
                      </tr>
                      <tr>
                      <td>Part Name</td>
                      <td><?php echo $data['partname']; ?></td>
                      </tr>
                      <tr>
                      <td>Description</td>
                      <td><?php echo $data['description']; ?></td>
                      </tr>
                      <tr>
                      <td>Qty</td>
                      <td><?php echo $data['qty']; ?> <?php echo $data['unit']; ?></td>
                      </tr>
                      <tr>
                      <td>Remark</td>
                      <td><?php echo $data['remark']; ?></td>
                      </tr>
                      </table>
                      <br />
                      <h4>Strorage Location</h4>
                       <?php
            /**$query1="SELECT transaksi.*, master_produk.* 
                    FROM transaksi 
                    LEFT JOIN master_produk ON transaksi.part_no=master_produk.part_no
                    WHERE transaksi.part_no='$_GET[id]'";**/
            
            $query1="SELECT pallet.*, transaksi.id_pallet, transaksi.rack_no FROM pallet, transaksi WHERE pallet.id_pallet=transaksi.id_pallet AND pallet.part_no='$_GET[id]' ORDER BY pallet.delivery_date ASC";
        
            $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error($koneksi));
            ?>
                      <table class="table table-hover table-bordered">
                      <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Id Pallet</th>
                      <th>Rack No</th>
                      <th>QTY</th>
                      <th>Action</th>
                      
                      </tr>
                      <?php 
                     $no=0;
                     while($data1=mysqli_fetch_array($tampil))
                    { $no++;
                    
                     ?>
                    
                      <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $data1['delivery_date']; ?></td>
                      <td><?php echo $data1['id_pallet']; ?></td>
                      <td><?php echo $data1['rack_no']; ?></td>
                      <td><?php echo $data1['qty']; ?> <?php echo $data1['unit']; ?></td>
                      <td><?php echo "<a href='input-trans-out2.php' class='btn btn-xs btn-danger' style='color: white;'> Keluar Rack </a>";?> <?php echo "<a href='input-trans-move.php' class='btn btn-xs btn-warning' style='color: white;'> Pindah Rack</a>";
                                    ?> <?php echo "<a href='input-trans-parsial.php' class='btn btn-xs btn-dark' style='color: white;'> Ambil Parsial </a>";
                                    ?></td>
                      </tr>
                               <?php   
              } 
              ?>
                      </table>
             <!-- <table class="table table-hover table-bordered">
              <tr>
                      <td>Total</td>
                      <td>Rp. <?php //echo number_format($data['tot'],0,",","."); ?></td>
                      </tr>
                      <tr>
                      <tr>
                      <td>Profit</td>
                      <td>Rp. <?php //echo number_format($data['pro'],0,",","."); ?></td>
                      </tr>
              </table>-->

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
