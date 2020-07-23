<?php 
$halaman = "cetaklaporan";

error_reporting(0);
session_start();
if(empty($_SESSION['level'])){
    header('location: ../index.php');
    exit(); 
}
include '../config.php';
include 'header.php';
$nip = $_SESSION['nip'];
$level = $_SESSION['level'];

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
            <h1>Advanced Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advanced Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       

        <div class="row">
          <div class="col-md-6">
            <form role="form" action="cetaklaporan.php" method="post">
                <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Cetak Laporan</h3>
                </div>
                <div class="card-body">
                    <!-- Date dd/mm/yyyy -->
                    <div class="form-group">
                    <label>Tanggal Awal:</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <?php
                        if($level == "Admin"){ ?>
                        <input type="hidden" class="form-control" name="nip" value=NULL>
                        <?php } elseif($level == "Guru"){ ?>
                        <input type="hidden" class="form-control" name="nip" value=NULL>
                        <input type="hidden" class="form-control" name="nip" value="<?php echo $nip; ?>">
                        <?php } ?>
                        <input type="text" class="form-control" name="tgl_awal" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                    </div>
                    <!-- /.input group -->
                    </div>
                    
                    <div class="form-group">
                    <label>Tanggal Akhir:</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" name="tgl_akhir" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                    </div>
                    <!-- /.input group -->
                    </div>

                    

                    <div class="card-footer">
                        <button type="submit" name="insert" class="btn btn-primary">Simpan</button>
                    </div>  
                </div>
                <!-- /.card-body -->
                </div>
            <!-- /.card -->
            </form>
          

          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 

<?php
  include 'footer.php'; 
?>