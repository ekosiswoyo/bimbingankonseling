<?php
include ('../config.php');
$id_kls = $_GET['id_kls'];
$query = mysqli_query($connect,"DELETE FROM tb_kelas WHERE id_kls=$id_kls");

if($query){
       echo "<script>window.location='kelas.php';</script>";
}else{
	echo "gagal";
}

?>

