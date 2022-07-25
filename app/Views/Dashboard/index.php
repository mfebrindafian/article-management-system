<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><strong><small id="ucapan"></small> <?= session('fullname'); ?></strong></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">...</a></li>
            <li class="breadcrumb-item active">Home</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="http://res.cloudinary.com/hurricane10/image/upload/v1499778218/img-26_aw9alb.jpg">
                <div class="carousel-caption d-none d-block w-50">
                  <h5 class="text-left judul-berita"><strong>Nilai Tukar Petani (NTP) Provinsi Jambi Juni 2022 sebesar 127,31</strong></h5>
                  <p class="text-left judul-berita">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit, dolorum repellendus enim eveniet laboriosam ab aspernatur consectetur ipsa id magni.</p>
                  <button href="" class="baca ripple float-left">Baca</button>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="http://res.cloudinary.com/hurricane10/image/upload/v1499778117/img-23_pumtse.jpg">
                <div class="carousel-caption d-none d-block w-50">
                  <h5 class="text-left judul-berita"><strong>Nilai Tukar Petani (NTP) Provinsi Jambi Juni 2022 sebesar 127,31</strong></h5>
                  <p class="text-left judul-berita">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit, dolorum repellendus enim eveniet laboriosam ab aspernatur consectetur ipsa id magni.</p>
                  <button href="" class="baca ripple float-left">Baca</button>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="http://res.cloudinary.com/hurricane10/image/upload/v1499778109/img-20_ljchnk.jpg">
                <div class="carousel-caption d-none d-block w-50">
                  <h5 class="text-left judul-berita"><strong>Nilai Tukar Petani (NTP) Provinsi Jambi Juni 2022 sebesar 127,31</strong></h5>
                  <p class="text-left judul-berita">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit, dolorum repellendus enim eveniet laboriosam ab aspernatur consectetur ipsa id magni.</p>
                  <button href="" class="baca ripple float-left">Baca</button>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <!-- <div class="image-container-container">
            <div class="image-carousel-wrapper">

              <div class="slide">

              </div>

              <div class="slide">
                
              </div>

              <div class="slide">
                
              </div>
            </div>
          </div> -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>

<script type="text/javascript">
  var h = (new Date()).getHours();
  var m = (new Date()).getMinutes();
  var s = (new Date()).getSeconds();

  if (h >= 4 && h < 10) {
    $('#ucapan').html('Selamat Pagi, ')
  } else if (h >= 10 && h < 15) {
    $('#ucapan').html('Selamat Siang, ')
  } else if (h >= 15 && h < 18) {
    $('#ucapan').html('Selamat Sore, ')
  } else if (h >= 18 || h < 4) {
    $('#ucapan').html('Selamat Malam, ')
  }
</script>
<?= $this->endSection(); ?>