<?php 
$halaman = "siswa";

error_reporting(0);
session_start();
if(empty($_SESSION['level'])){
    header('location: ../index.php');
    exit(); 
}
include '../config.php';
include 'header.php'; 
// $getnisn = $_GET['nisn'];
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
            <h1>Data Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Siswa</li>
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
              <h3 class="card-title">Data Siswa</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NISN</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                 
                </tr>
                </thead>
                <tbody>
                  <?php
                  
                  $no =1;
                  $query = mysqli_query($connect, "SELECT * FROM tb_siswa a, tb_kelas b where a.id_kls=b.id_kls ORDER BY a.nisn DESC");
                  while ($data = mysqli_fetch_array($query)) {
                  ?>
                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $data['nisn'];?></td>
                  <td><?php echo $data['nm_siswa'];?></td>
                  <td><?php echo $data['nm_kls'];?></td>
                  <td><center>
                                <a class='fa fa-fw fa-edit' title='Ubah' href='edit_siswa.php?nisn=<?php echo $data['nisn'];?>'></a>
                               <!--  <a class='fa fa-fw fa-eraser' title='Hapus' href='delete_siswa.php?nisn="<?php echo $data['nisn'];?>"' onclick="javascript: return confirm('Anda yakin hapus ?')"></a> -->
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
                <h3 class="card-title">Tambah Data Siswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body">
                   <div class="form-group">
                    <label for="exampleInputEmail1">NISN</label>
                    <input type="text" class="form-control" name="nisn" id="exampleInputEmail1" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Siswa</label>
                    <input type="text" class="form-control" name="nm_siswa" id="exampleInputEmail1" placeholder="Nama Siswa" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password Login</label>
                    <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="Password Login" required>
                  </div>

                  <div class="form-group">
                        <label>Pilih Kelas</label>
                        <select class="form-control" name="id_kls" required>
                          <?php
                  
                          $kelas = mysqli_query($connect, "SELECT * FROM tb_kelas where status=1 ORDER BY id_kls DESC");
                          while ($datakel = mysqli_fetch_array($kelas)) {

                            echo '<option value="'.$datakel['id_kls'].'">'.$datakel['nm_kls'].'</option>';
                          
                          } ?>
                          
                        </select>
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
  
    $nisn = $_POST['nisn'];
    $nm_siswa = $_POST['nm_siswa'];
    $password = md5($_POST['password']);
    $id_kls = $_POST['id_kls'];
    $datas =  mysqli_query($connect, "SELECT * FROM tb_siswa WHERE nisn=$nisn");

    if (mysqli_num_rows($datas)>0){
      echo "<script>window.alert('Data Sudah Ada !')</script>";
        echo "<script>window.location='addsis.php';</script>";
    
    }else{
      
    $sql = "INSERT INTO tb_siswa (nisn,nm_siswa,password,id_kls) VALUES ('$nisn','$nm_siswa','$password','$id_kls')";
    $query = mysqli_query($connect, $sql);

    if($query){
       echo "<script>window.location='siswa.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }
  }
}?>