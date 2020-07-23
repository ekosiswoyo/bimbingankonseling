<?php
include ('../config.php');
$nip = $_GET['nip'];
$query = mysqli_query($connect,"DELETE FROM tb_guru WHERE nip=$nip");

if($query){
       echo "<script>window.location='guru.php';</script>";
}else{
	echo "gagal";
}

?>

