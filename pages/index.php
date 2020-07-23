<?php
$halaman = "index";
include 'header.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0 text-dark">Halaman Utama</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
      <?php if($level == "Siswa"){ ?>

      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <center><h3>Hallo Selamat Datang</h3>
              <h3>di Web Konseling</h3></center>
            <div class="card card-primary">
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <!-- <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> Semua Foto </a> -->
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="1"> Foto Kelas </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="2"> Foto Sekolah  </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="3"> Foto Prestasi </a>
                    
                  </div>
                  
                </div>
                <div>
                  <div class="filter-container p-0 row">
                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                      <a href="../dist/foto/kelas (1).jpg" data-toggle="lightbox" data-title="sample 1 - white">
                        <img src="../dist/foto/kelas (1).jpg" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                      <a href="../dist/foto/kelas (2).jpg" data-toggle="lightbox" data-title="sample 1 - white">
                        <img src="../dist/foto/kelas (2).jpg" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                      <a href="../dist/foto/kelas (3).jpg" data-toggle="lightbox" data-title="sample 1 - white">
                        <img src="../dist/foto/kelas (3).jpg" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="2" data-sort="white sample">
                      <a href="../dist/foto/sekolah (1).jpg" data-toggle="lightbox" data-title="sample 1 - white">
                        <img src="../dist/foto/sekolah (1).jpg" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="2" data-sort="white sample">
                      <a href="../dist/foto/sekolah (2).jpg" data-toggle="lightbox" data-title="sample 1 - white">
                        <img src="../dist/foto/sekolah (2).jpg" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="2" data-sort="white sample">
                      <a href="../dist/foto/sekolah (3).jpg" data-toggle="lightbox" data-title="sample 1 - white">
                        <img src="../dist/foto/sekolah (3).jpg" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="2" data-sort="white sample">
                      <a href="../dist/foto/sekolah (4).jpg" data-toggle="lightbox" data-title="sample 1 - white">
                        <img src="../dist/foto/sekolah (4).jpg" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="2" data-sort="white sample">
                      <a href="../dist/foto/sekolah (5).jpg" data-toggle="lightbox" data-title="sample 1 - white">
                        <img src="../dist/foto/sekolah (5).jpg" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="2" data-sort="white sample">
                      <a href="../dist/foto/sekolah (6).jpg" data-toggle="lightbox" data-title="sample 1 - white">
                        <img src="../dist/foto/sekolah (6).jpg" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="2" data-sort="white sample">
                      <a href="../dist/foto/sekolah (7).jpg" data-toggle="lightbox" data-title="sample 1 - white">
                        <img src="../dist/foto/sekolah (7).jpg" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="2" data-sort="white sample">
                      <a href="../dist/foto/sekolah (8).jpg" data-toggle="lightbox" data-title="sample 1 - white">
                        <img src="../dist/foto/sekolah (8).jpg" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="2" data-sort="white sample">
                      <a href="../dist/foto/sekolah (9).jpg" data-toggle="lightbox" data-title="sample 1 - white">
                        <img src="../dist/foto/sekolah (9).jpg" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                     <div class="filtr-item col-sm-2" data-category="2" data-sort="white sample">
                      <a href="../dist/foto/kandeman.jpg" data-toggle="lightbox" data-title="sample 1 - white">
                        <img src="../dist/foto/kandeman.jpg" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    
                    <div class="filtr-item col-sm-2" data-category="3" data-sort="white sample">
                      <a href="../dist/foto/prestasi (2).jpg" data-toggle="lightbox" data-title="sample 1 - white">
                        <img src="../dist/foto/prestasi (2).jpg" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>

                   
                  </div>
                </div>

              </div>
            </div>

            <!-- <a href=""><button type="button"  class="btn btn-primary">Berita</button></a> -->
            <a href="konseling.php" style="float:right;"><button type="button"  class="btn btn-warning">Tentang Konseling</button></a>

          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <?php } else{ ?>
    <section class="content">
      <div class="container-fluid">
      <h3>Halaman Utama Web Konseling</h3>
      <?php
      $guruk = mysqli_query($connect, "SELECT count(*) as jmlguru FROM tb_guru");
      $datguru = mysqli_fetch_array($guruk);
      $siswa = mysqli_query($connect, "SELECT count(*) as jmlsiswa FROM tb_siswa");
      $datsiswa = mysqli_fetch_array($siswa);
      $s = $datsiswa['jmlsiswa'];
      ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">

                <p>Jumlah Siswa</p>
                <h3><?php echo  $datsiswa['jmlsiswa'];?></h3>

              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <!-- <a href="siswa.php" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">


                <p>Jumlah Guru</p>
              <h3><?php echo $datguru['jmlguru'];?></h3>

              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <!-- <a href="guru.php" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>

          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

  <?php } ?>
    <!-- /.content -->
  </div>
<?php include 'footer.php'; ?>
 