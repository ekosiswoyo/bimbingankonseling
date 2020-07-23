<?php 
error_reporting(0);
session_start();
if(empty($_SESSION['level'])){
    header('location: ../index.php');
    exit(); 
}
include '../config.php';
include 'header.php';
$nip = $_SESSION['nip'];
$nisn = $_GET['nisn']; 
// $id = $_GET['id_sekolah'];
// $sql = mysqli_query($connect, "SELECT * FROM profil WHERE id_sekolah='1'");
// $data = mysqli_fetch_array($sql);
// echo $data['nama'];
?>
<meta http-equiv="refresh" content="120">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Konseling</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Konseling</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-6">
        
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Konseling</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                 
                </tr>
                </thead>
                <tbody>
                  <?php
                  
                  $no =1;
                  $query = mysqli_query($connect, "SELECT * FROM chat a, tb_siswa b, tb_guru c, tb_kelas d where b.id_kls=d.id_kls and a.nisn=b.nisn and a.nip=c.nip and a.nip=$nip group by a.nisn ORDER BY a.nisn DESC");
                  while ($data = mysqli_fetch_array($query)) {
                  ?>
                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $data['nm_siswa'];?></td>
                  <td><?php echo $data['nm_kls'];?></td>
                  <td><center>
                                <!--  -->
                                <a class='fa fa-fw fas fa-comment' title='Chat' href='add_chatgr.php?nisn=<?php echo $data['nisn'];?>'></a>
                              </center></td>
                  
                </tr>
                  <?php } ?>
               </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-6">
          <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title">Direct Chat</h3>

                <div class="card-tools">
                  
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                 
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages scroll" id="scroll">
                </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="#" method="post">
                  <div class="input-group">
                    <input type="hidden" id="nisn" name="nisn" value="<?php echo $nisn; ?>">
                    <input type="hidden" id="nip" name="nip" value="<?php echo $nip; ?>">
                    <input type="text" id="chatk" name="chatk" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="submit" name="chat" id="btn_chat" class="btn btn-primary">Send</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
  <script type="text/javascript">
 $('#scroll').scrollTop($('#scroll')[0].scrollHeight);
</script>

<script>
$(document).ready(function(){
  reload_chat();
  setInterval(reload_chat, 3000);

  $("#btn_chat").click(function(){
  $.post("data_chatgr.php",
    {
      nisn: $('#nisn').val(),
      nip: $('#nip').val(),
      chatk: $('#chatk').val()
    },
    function(data, status){
      $('#scroll').html(data);
      $('#chatk').val(null);
      $('#scroll').scrollTop($('#scroll')[0].scrollHeight);
      $('#chatk').focus();
    });
  });
});

function reload_chat(){
  $.post("data_chatgr.php",
    {
      nisn: $('#nisn').val(),
      nip: $('#nip').val(),
      chatk: ""
    },
    function(data, status){
      $('#scroll').html(data);
      $('#scroll').scrollTop($('#scroll')[0].scrollHeight);
      $('#chatk').focus();
    });
}
</script>  
<?php
  include 'footer.php'; 

?>