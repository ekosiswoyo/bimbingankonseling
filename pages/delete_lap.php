<?php
include ('../config.php');
$id_lap = $_GET['id_lap'];
$query = mysqli_query($connect,"DELETE FROM laporan WHERE id_lap=$id_lap");

if($query){
       echo "<script>window.location='lap.php';</script>";
}else{
	echo "gagal";
}

?>

