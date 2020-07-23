<?php 
$halaman = "guru";

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
            <h1>Data Guru</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Guru</li>
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
              <h3 class="card-title">Data Guru</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Aksi</th>
                 
                </tr>
                </thead>
                <tbody>
                  <?php
                  
                  $no =1;
                  $query = mysqli_query($connect, "SELECT * FROM tb_guru ORDER BY nip DESC");
                  while ($data = mysqli_fetch_array($query)) {
                  ?>
                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $data['nip'];?></td>
                  <td><?php echo $data['nm_guru'];?></td>
                  
                  <td><center>
                                <a class='fa fa-fw fa-edit' title='Ubah' href='edit_guru.php?nip=<?php echo $data['nip'];?>'></a>
                                <a class='fa fa-fw fa-eraser' title='Hapus' href='delete_guru.php?nip="<?php echo $data['nip'];?>"' onclick="javascript: return confirm('Anda yakin hapus ?')"></a>
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
                <h3 class="card-title">Tambah Data Guru</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body">
                   <div class="form-group">
                    <label for="exampleInputEmail1">NIP</label>
                    <input type="text" class="form-control" name="nip" id="exampleInputEmail1" placeholder="NIP" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Guru</label>
                    <input type="text" class="form-control" name="nm_guru" id="exampleInputEmail1" placeholder="Nama Guru" required>
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password Login</label>
                    <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="Password Login" required>
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
  
    $nip = $_POST['nip'];
    $nm_guru = $_POST['nm_guru'];
    $password = md5($_POST['password']);
    
   
    
    $sql = "INSERT INTO tb_guru (nip,nm_guru,password) VALUES ('$nip','$nm_guru','$password')";
    $query = mysqli_query($connect, $sql);

    if($query){
       echo "<script>window.location='guru.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

}?>