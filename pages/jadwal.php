<?php 
error_reporting(0);
session_start();
if(empty($_SESSION['level'])){
    header('location: ../index.php');
    exit(); 
}
include '../config.php';
include 'header.php'; 
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
            <h1>Data Jadwal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Jadwal</li>
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
              <h3 class="card-title">Data Jadwal</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Guru</th>
                  <th>Hari</th>
                  <th>Aksi</th>
                 
                </tr>
                </thead>
                <tbody>
                  <?php
                  
                  $no =1;
                  $query = mysqli_query($connect, "SELECT * FROM jdwl_konseling a, tb_guru b where a.nip = b.nip ORDER BY a.nip DESC");
                  while ($data = mysqli_fetch_array($query)) {
                  ?>
                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $data['nm_guru'];?></td>
                  <td><?php echo $data['hari'];?></td>
                  <td><center>
                                <a class='fa fa-fw fa-edit' title='Ubah' href='edit_jadwal.php?id_jadwal=<?php echo $data['id_jadwal'];?>'></a>
                                <a class='fa fa-fw fa-eraser' title='Hapus' href='delete_jadwal.php?id_jadwal="<?php echo $data['id_jadwal'];?>"' onclick="javascript: return confirm('Anda yakin hapus ?')"></a>
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
                <h3 class="card-title">Tambah Data Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body">
                   <div class="form-group">
                        <label>Pilih Guru</label>
                        <select class="form-control" name="nip">
                          <?php
                  
                          $guru = mysqli_query($connect, "SELECT * FROM tb_guru ORDER BY nip DESC");
                          while ($jdwl = mysqli_fetch_array($guru)) {

                            echo '<option value="'.$jdwl['nip'].'">'.$jdwl['nm_guru'].'</option>';
                          
                          } ?>
                          
                        </select>
                      </div>
                   <div class="form-group">
                        <label>Pilih Hari</label>
                        <select class="form-control" name="hari">
                         
                            <option value="SENIN">SENIN</option>
                            <option value="SELASA">SELASA</option>
                            <option value="RABU">RABU</option>
                            <option value="KAMIS">KAMIS</option>
                            <option value="JUMAT">JUMAT</option>
                            <option value="SABTU">SABTU</option>
                          
                        </select>
                    </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Jam Mulai</label>
                    <input type="text" class="form-control" name="jam_mulai" id="exampleInputEmail1" placeholder="Jam Mulai">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Jam Selesai</label>
                    <input type="text" class="form-control" name="jam_selesai" id="exampleInputEmail1" placeholder="Jam Selesai">
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
  
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $nip = $_POST['nip'];
   
    
    $sql = "INSERT INTO jdwl_konseling (id_jadwal, hari, jam_mulai, jam_selesai, nip) VALUES ('','$hari','$jam_mulai','$jam_selesai','$nip')";
    $query = mysqli_query($connect, $sql);

    if($query){
       echo "<script>window.location='jadwal.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

}?>