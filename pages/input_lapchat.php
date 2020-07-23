<?php 
error_reporting(0);
session_start();
if(empty($_SESSION['level'])){
    header('location: ../index.php');
    exit(); 
}
include '../config.php';
include 'header.php'; 
$id_chat = $_GET['id_chat'];
$chat = mysqli_query($connect, "SELECT * FROM chat a, tb_guru b, tb_siswa c, tb_kelas d where a.nip = b.nip and a.nisn=c.nisn and c.id_kls=d.id_kls and a.id_chat=$id_chat ORDER BY a.id_chat DESC");
$datchat = mysqli_fetch_array($chat);
// $sql = mysqli_query($connect, "SELECT * FROM profil WHERE id_sekolah='1'");
// $data = mysqli_fetch_array($sql);
// echo $data['nama'];
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Laporan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Laporan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-7">
        
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Laporan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Isi Pesan</th>
                  <th>Jawaban</th>
                  <th>Aksi</th>
                 
                </tr>
                </thead>
                <tbody>
                  <?php
                  
                  $no =1;
                  $query = mysqli_query($connect, "SELECT * FROM chat a, tb_guru b, tb_siswa c, tb_kelas d where a.nip = b.nip and a.nisn=c.nisn and c.id_kls=d.id_kls and a.stat_chat=1 ORDER BY a.id_chat DESC");
                  while ($data = mysqli_fetch_array($query)) {
                  ?>
                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $data['nm_siswa'];?></td>
                  <td><?php echo $data['nm_kls'];?></td>
                  <td><?php echo $data['chat'];?></td>
                  <td><?php echo $data['jwb_guru'];?></td>
                  <td><center>
                                <a class='fa fa-fw fa-edit' title='Ubah' href='input_lapchat.php?id_chat=<?php echo $data['id_chat'];?>'></a>
                               
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

        <div class="col-md-5">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Input Laporan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Siswa</label>
                    <input type="hidden" name="id_chat" value="<?php echo $datchat['id_chat'];?>">
                    <input type="text" class="form-control" name="nm_siswa" id="exampleInputEmail1" value="<?php echo $datchat['nm_siswa'];?>" disabled>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Guru</label>
                    <input type="text" class="form-control" name="nm_guru" id="exampleInputEmail1"  value="<?php echo $datchat['nm_guru'];?>" disabled>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Isi Pesan</label>
                    <textarea name="chat" class="form-control" disabled><?php echo $datchat['chat'];?></textarea>
                    
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Jawaban Pesan Siswa</label>
                    <textarea name="jwb_guru" class="form-control"><?php echo $datchat['jwb_guru'];?></textarea>
                    
                  </div>

                 

                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="insert" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <?php
  include 'footer.php'; 

if(isset($_POST['insert'])){
  
    $id_chat = $_POST['id_chat'];
    $jwb_guru = $_POST['jwb_guru'];
   
    
    $sql = "update chat set jwb_guru='$jwb_guru' where id_chat='$id_chat'";
    $query = mysqli_query($connect, $sql);

    if($query){
       echo "<script>window.location='datlap.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }
}?>