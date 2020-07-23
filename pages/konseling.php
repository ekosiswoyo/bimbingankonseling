<?php include 'header.php'; ?>

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
    <?php
    if($level == "Guru"){ ?>
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

  <?php }else if($level == "Siswa"){ ?>

      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <center><h3>Manfaat Konseling</h3></center>
            <div class="card card-primary">
              <div class="card-body">
               <p>a. Bimbingan konseling akan membuat diri kita merasa lebih baik, merasa lebih bahagia, tenang dan nyaman karena bimbingan konseling tersebut membantu kita untuk menerima setiap sisi yang ada di dalam diri kita.</p>
               <p>b. Bimbingan konseling juga membantu menurunkan bahkan menghilangkan tingkat tingkat stress dan depresi yang kita alami karena kita dibantu untuk mencari sumber stress tersebut serta dibantu pula mencari cara penyelesaian terbaik dari permasalahan yang belum terselesaikan itu.</p>
              <p>c. Bimbingan konseling membantu kita untuk dapat memahami dan menerima diri sendiri dan orang lain sehingga akan meningkatkan hubungan yang efektif dengan orang lain serta dapat berdamai dengan diri sendiri.</p>
              <p>d. Perkembangan personal akan meningkat secara positif karena adanya bimbinga konseling.</p>
               

              </div>
            </div>

            <!-- <a href=""><button type="button"  class="btn btn-primary">Berita</button></a> -->
            <a href="index.php" style="float:right;"><button type="button"  class="btn btn-warning">Kembali</button></a>

          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <?php } ?>
    <!-- /.content -->
  </div>
<?php include 'footer.php'; ?>
 