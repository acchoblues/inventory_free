<?php
/* Database connection start */
session_start();
include "koneksi.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'id_produk',
    1 => 'nama_produk', 
	2 => 'jenis_barang',
	3 => 'kategori',
    4 => 'qty',
    5 => 'satuan'
);

// getting total number records without any search
$sql = "SELECT id_produk, nama_produk, jenis_barang, kategori, qty, satuan";
$sql.=" FROM produk";
$query=mysqli_query($conn, $sql) or die("ajax-data-master.php: get Part No");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT id_produk, nama_produk, jenis_barang, kategori, qty, satuan";
	$sql.=" FROM produk";
	$sql.=" WHERE id_produk LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR nama_produk LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR jenis_barang LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR kategori LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR qty LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR satuan LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("ajax-data-master.php: get Part No");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-data-master.php: get Part No"); // again run query with limit
	
} else {	

	$sql = "SELECT id_produk, nama_produk, jenis_barang, kategori, qty, satuan";
	$sql.=" FROM produk";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-data-master.php: get Part No");   
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["id_produk"];
    $nestedData[] = $row["nama_produk"];
    $nestedData[] = $row["jenis_barang"];
    $nestedData[] = $row["kategori"];
    $nestedData[] = $row["qty"];
    $nestedData[] = $row["satuan"];
	if($_SESSION['level'] == "admin"){
	$nestedData[] = '<td><center>
	                 <a href="detail-master.php?id='.$row['id_produk'].'"  data-toggle="tooltip" title="Print Barcode" class="btn btn-sm btn-success"> <i class="fa fa-print"></i> </a>
                     <a href="edit-master.php?id='.$row['id_produk'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i> </a>
				     <a href="master.php?aksi=delete&id='.$row['id_produk'].'"  data-toggle="tooltip" title="Delete" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama_produk'].'?\')" class="btn btn-sm btn-danger"> <i class="fa fa-trash"> </i> </a>
	                 </center></td>';		
	} else if($_SESSION['level'] == "user"){
		$nestedData[] = '<td><center>
		<a href="detail-master.php?id='.$row['id_produk'].'"  data-toggle="tooltip" title="Print Barcode" class="btn btn-sm btn-success"> <i class="fa fa-print"></i> </a>
		</center></td>';	
	}
	$data[] = $nestedData;
    
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
