<?php 
include 'db.php';
$keyword = $_GET['search'];
$query = $db->query("SELECT * FROM Kecamatan WHERE Nama_Kecamatan LIKE '%$keyword%'");
$list = array();
$key=0;
foreach ($query as $row) {
	$list[$key]['id'] = $row['ID_Kecamatan'];
         $list[$key]['text'] = $row['Nama_Kecamatan']; 
     $key++;
}

echo json_encode($list);
?>