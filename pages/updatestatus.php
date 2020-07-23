
<?php
include ('../config.php');
$nip = $_GET['nip'];
$query = mysqli_query($connect,"Update chat set status=1 where nip='$nip'");

if($query){
       echo "<script>window.location='chatgr.php';</script>";
}else{
	echo "gagal";
}

?>

