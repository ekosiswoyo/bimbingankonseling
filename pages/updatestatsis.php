
<?php
include ('../config.php');
$nisn = $_GET['nisn'];
$nip = $_GET['nip'];
$query = mysqli_query($connect,"Update chat set status=1 where nisn='$nisn'");

if($query){
       echo "<script>window.location='add_chat.php?nip=$nip';</script>";
}else{
	echo "gagal";
}

?>

