<?php
include ('../config.php');
$id_jadwal = $_GET['id_jadwal'];
$query = mysqli_query($connect,"DELETE FROM jdwl_konseling WHERE id_jadwal=$id_jadwal");

if($query){
       echo "<script>window.location='jadwal.php';</script>";
}else{
	echo "gagal";
}

?>

