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
$idkls = $_SESSION['idkls'];
$nisnk = $_GET['nisn'];



// $id = $_GET['id_sekolah'];
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
            <h1>Data Konseling</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Konseling</li>
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
              <h3 class="card-title">Konseling</h3>
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
                                <a class='fa fa-fw fas fa-plus' title='Tambah Laporan' href='addlap.php?nisn=<?php echo $data['nisn'];?>'></a>
                                &nbsp;&nbsp;<a class='fa fa-fw fas fa-comment' title='Chat' href='add_chatgr.php?nisn=<?php echo $data['nisn'];?>'></a>
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
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data laporan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body">
                   <div class="form-group">
                        <label>Pilih Siswa</label>
                        <input type="hidden" class="form-control" name="nipe" value="<?php echo $nip; ?>">

                          <?php
                  
                          $siswa = mysqli_query($connect, "SELECT * FROM tb_siswa where  nisn=$nisnk LIMIT 1");
                          while ($sis = mysqli_fetch_array($siswa)) {
                            echo '<input type="hidden" class="form-control" name="nisnfix" value="'.$sis['nisn'].'">';

                            echo '<input type="text" class="form-control" name="nisn" value="'.$sis['nisn'].'-'.$sis['nm_siswa'].'" disabled>';
                          
                          } ?>
                          
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Topik</label>
                        <textarea name="topik" class="form-control" placeholder="topik"></textarea>
                    
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Uraian Masalah</label>
                        <textarea name="uraian" class="form-control" placeholder="Uraian Masalah"></textarea>
                    
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alternatif Pemecahan Masalah</label>
                        <textarea name="alternatif_mslh" class="form-control" placeholder="Alternatif Pemecahan Masalah"></textarea>
                    
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tindak Lanjut</label>
                        <textarea name="tindak_lanjut" class="form-control" placeholder="Tindak Lanjut"></textarea>
                    
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

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $("#example12").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
  <?php

if(isset($_POST['insert'])){
  
    $hari = $_POST['hari'];
    $tgl_lap = $_POST['tgl_lap'];
    $nipe = $_POST['nipe'];
    $nisnpost = $_POST['nisnfix'];
    $topik = $_POST['topik'];
    $uraian = $_POST['uraian'];
    $alternatif_mslh = $_POST['alternatif_mslh'];
    $tindak_lanjut = $_POST['tindak_lanjut'];
   
    
    $sql = "INSERT INTO laporan (id_lap, nisn, nip, topik, uraian, alternatif_mslh, tindak_lanjut) VALUES ('','$nisnpost','$nipe','$topik','$uraian','$alternatif_mslh','$tindak_lanjut')";
    $query = mysqli_query($connect, $sql);

    if($query){
       echo "<script>window.location='chatgr.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

}?>
  