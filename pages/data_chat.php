<!-- Message. Default to the left -->
<?php
session_start();
include '../config.php';
$nisn = $_SESSION['nisn'];
$nip = $_POST['nip']; 
$idkls = $_SESSION['idkls']; 
if(isset($_POST['chatk'])){

  $nisn = $_POST['nisn'];
  $nip = $_POST['nip'];
  $chat = $_POST['chatk'];
  $tgl = date("Y-m-d H:i:s");

  if($chat != ''){
  $sql = "INSERT INTO chat (id_chat, nisn, nip, chat, stat_chat, tgl) VALUES ('','$nisn','$nip','$chat','1','$tgl')";
  $query = mysqli_query($connect, $sql);
}
}
ob_start();
      $chat = mysqli_query($connect, "SELECT *, DATE_FORMAT(tgl, '%d-%m-%Y %H:%i:%s') AS tgl FROM chat a, tb_guru b, tb_siswa c where a.nip = b.nip and a.nisn=c.nisn and a.nisn=$nisn and a.nip=$nip and a.status!=2 ORDER BY a.tgl ASC");
      while ($datachat = mysqli_fetch_array($chat)) {
    ?>
    <?php if($datachat['stat_chat'] == 1){ ?>
     
      <!-- Message to the right -->
      <div class="direct-chat-msg right">
      <div class="direct-chat-infos clearfix">
        <span class="direct-chat-name float-right"><?php echo $datachat['nm_siswa']; ?></span>
        <span class="direct-chat-timestamp float-left"><?php echo $datachat['tgl']; ?></span>
      </div>
      <!-- /.direct-chat-infos -->
      <!-- <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image"> -->
      <!-- /.direct-chat-img -->
      <div class="direct-chat-text">
        <?php echo $datachat['chat']; ?>
      </div>
      <!-- /.direct-chat-text -->
    </div>


    <?php }else{ ?>
      
  
    <div class="direct-chat-msg">
      <div class="direct-chat-infos clearfix">
        <span class="direct-chat-name float-left"><?php echo $datachat['nm_guru']; ?></span>
        <span class="direct-chat-timestamp float-right"><?php echo $datachat['tgl']; ?></span>
      </div>
      <!-- /.direct-chat-infos -->
      <!-- <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image"> -->
      <!-- /.direct-chat-img -->
      <div class="direct-chat-text">
        <?php echo $datachat['chat']; ?>
      </div>
      <!-- /.direct-chat-text -->
    </div>
    <!-- /.direct-chat-msg -->


       

 <?php } 
} 

$data = ob_get_clean();
echo $data;
?>