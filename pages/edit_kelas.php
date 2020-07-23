<?php 
$halaman = "kelas";

error_reporting(0);
session_start();
if(empty($_SESSION['level'])){
    header('location: ../index.php');
    exit(); 
}
include '../config.php';
include 'header.php'; 

$id_kls = $_GET['id_kls'];
$kelas = mysqli_query($connect, "SELECT * FROM tb_kelas a, tb_guru b WHERE a.nip=b.nip and a.id_kls=$id_kls");
$editkelas = mysqli_fetch_array($kelas);
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
            <h1>Data Kelas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Kelas</li>
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
              <h3 class="card-title">Data Kelas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kelas</th>
                  <th>Nama Wali Kelas</th>
                  <th>Aksi</th>
                 
                </tr>
                </thead>
                <tbody>
                  <?php
                  
                  $no =1;
                  $query = mysqli_query($connect, "SELECT * FROM tb_kelas a, tb_guru b where a.nip=b.nip ORDER BY a.id_kls DESC");
                  while ($data = mysqli_fetch_array($query)) {
                  ?>
                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $data['nm_kls'];?></td>
                  <td><?php echo $data['nm_guru'];?></td>
                  <td><center>
                                <a class='fa fa-fw fa-edit' title='Ubah' href='edit_kelas.php?id_kls=<?php echo $data['id_kls'];?>'></a>
                                <a class='fa fa-fw fa-eraser' title='Hapus' href='delete_kelas.php?id_kls="<?php echo $data['id_kls'];?>"' onclick="javascript: return confirm('Anda yakin hapus ?')"></a>
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
                <h3 class="card-title">Ubah Data Kelas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kelas</label>
                    <input type="hidden" class="form-control" name="id_kls" id="exampleInputEmail1" placeholder="ID Kelas" value="<?php echo $editkelas['id_kls']; ?>">
                    <input type="text" class="form-control" name="nm_kls" id="exampleInputEmail1" placeholder="Nama Kelas" value="<?php echo $editkelas['nm_kls']; ?>" required>
                  </div>

                  <div class="form-group">
                        <label>Pilih Wali Kelas</label>
                        <select class="form-control" name="nip" required>
                          <?php
                          echo '<option value="'.$editkelas['nip'].'">'.$editkelas['nm_guru'].'</option>';
                          echo '<option value="">Pilih Wali Kelas</option>';
                          $kelas = mysqli_query($connect, "SELECT * FROM tb_guru ORDER BY nip DESC");
                          while ($datakel = mysqli_fetch_array($kelas)) {

                            echo '<option value="'.$datakel['nip'].'">'.$datakel['nm_guru'].'</option>';
                          
                          } ?>
                          
                        </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tahun Pelajaran</label>
                    <input type="text" class="form-control" name="thn_ajar" id="exampleInputEmail1" placeholder="Tahun Pelajaran" value="<?php echo $editkelas['thn_ajar']; ?>" required>
                  </div>

                  <div class="form-group">
                  <label>Pilih Status</label>
                        <select class="form-control" name="status" required>
                        
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>                          
                        </select>
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update" class="btn btn-primary">Simpan</button>
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

if(isset($_POST['update'])){
  
    $id_kls = $_POST['id_kls'];
    $nm_kls = $_POST['nm_kls'];
    $status = $_POST['status'];
    $thn_ajar = $_POST['thn_ajar'];
    $nip = $_POST['nip'];
    $sql = "update tb_kelas set nm_kls='$nm_kls', nip='$nip',  thn_ajar='$thn_ajar', status='$status' where id_kls='$id_kls'";
    $query = mysqli_query($connect, $sql);

    if($query){
       echo "<script>window.location='kelas.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

}

?>