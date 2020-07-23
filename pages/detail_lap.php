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

$id_lap = $_GET['id_lap'];
$lap = mysqli_query($connect, "SELECT * FROM laporan a, tb_siswa b, tb_kelas c, tb_guru d where a.nisn = b.nisn and a.nip=d.nip and c.id_kls=b.id_kls and a.id_lap=$id_lap");
$datlap = mysqli_fetch_array($lap);
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
        <div class="col-6">
        
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
                  <th>Topik</th>
                  <th>Kelas</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                 
                </tr>
                </thead>
                <tbody>
                  <?php
                  
                  $no =1;
                  $query = mysqli_query($connect, "SELECT * FROM laporan a, tb_siswa b, tb_kelas c, tb_guru d where a.nisn = b.nisn and a.nip=d.nip and c.id_kls=b.id_kls and a.nip=$nip ORDER BY a.nip DESC");
                  while ($data = mysqli_fetch_array($query)) {
                  ?>
                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $data['nm_siswa'];?></td>
                  <td><?php echo $data['topik'];?></td>
                  <td><?php echo $data['nm_kls'];?></td>
                  <td><?php echo $data['tgl_lap'];?></td>
                  <td><center>
                                <a class='fa fa-fw fa-eye' title='Detail' href='detail_lap.php?id_lap=<?php echo $data['id_lap'];?>'></a>
                                
                              
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
                <h3 class="card-title">Detail Data Laporan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body">
                   <div class="form-group">
                        <label>Pilih Siswa</label>
                        <input type="hidden" class="form-control" name="nip" value="<?php echo $nip; ?>">

                        <select class="form-control" name="nisn" disabled>
                          <?php
                            echo '<option value="'.$datlap['nisn'].'">'.$datlap['nm_siswa'].'</option>';
                  
                            $siswa = mysqli_query($connect, "SELECT * FROM tb_siswa where id_kls=$idkls ORDER BY nisn DESC");
                            while ($sis = mysqli_fetch_array($siswa)) {

                                echo '<option value="'.$sis['nisn'].'">'.$sis['nm_siswa'].'</option>';
                            
                            } ?>
                          
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Topik</label>
                        <textarea name="topik" class="form-control" placeholder="topik" disabled><?php echo $datlap['topik']; ?></textarea>
                    
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Uraian Masalah</label>
                        <textarea name="uraian" class="form-control" placeholder="Uraian Masalah" disabled><?php echo $datlap['uraian']; ?></textarea>
                    
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alternatif Pemecahan Masalah</label>
                        <textarea name="alternatif_mslh" class="form-control" placeholder="Alternatif Pemecahan Masalah" disabled><?php echo $datlap['alternatif_mslh']; ?></textarea>
                    
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tindak Lanjut</label>
                        <textarea name="tindak_lanjut" class="form-control" placeholder="Tindak Lanjut" disabled><?php echo $datlap['tindak_lanjut']; ?></textarea>
                    
                    </div>
                   

                 

                 
                </div>
                <!-- /.card-body -->

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
  
    $hari = $_POST['hari'];
    $tgl_lap = $_POST['tgl_lap'];
    $nip = $_POST['nip'];
    $nisn = $_POST['nisn'];
    $uraian = $_POST['uraian'];
    $alternatif_mslh = $_POST['alternatif_mslh'];
    $tindak_lanjut = $_POST['tindak_lanjut'];
   
    
    $sql = "INSERT INTO laporan (id_lap, nisn, nip, uraian, alternatif_mslh, tindak_lanjut, hari, tgl_lap) VALUES ('','$nisn','$nip','$uraian','$alternatif_mslh','$tindak_lanjut','$hari','$tgl_lap')";
    $query = mysqli_query($connect, $sql);

    if($query){
       echo "<script>window.location='lap.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

}?>