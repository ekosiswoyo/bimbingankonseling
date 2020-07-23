<?php
include ('../config.php');
$nisn = $_GET['nisn'];
$query = mysqli_query($connect,"DELETE FROM tb_siswa WHERE nisn=$nisn");

if($query){
       echo "<script>window.location='siswa.php';</script>";
}else{
	echo "gagal";
}

?>

