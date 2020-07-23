<?php
include ('../config.php');
$username = $_GET['username'];
$query = mysqli_query($connect,"DELETE FROM tb_admins WHERE username=$username");

if($query){
       echo "<script>window.location='admin.php';</script>";
}else{
	echo "gagal";
}

?>

