
<?php
include ('../config.php');
$nisn = $_GET['nisn'];
$nip = $_GET['nip'];
$query = mysqli_query($connect,"update chat set status=2 where nisn=$nisn and nip=$nip");

if($query){
       echo "<script>window.location='index.php';</script>";
}else{
	echo "gagal";
}

?>

