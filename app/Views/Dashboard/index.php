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

      <div class="row my-4">
        <div class="col-12">
          <?php if (session('level_id') == 2) : ?>
            <a href="<?= base_url('/tambahBerita') ?>" class="edit float-right ripple d-flex align-items-center py-4">Tambah Berita <i class="fas fa-arrow-right ml-3"></i></a>
          <?php elseif (session('level_id') == 3) : ?>
            <a href="<?= base_url('/reviewBerita') ?>" class="edit float-right ripple d-flex align-items-center py-4">Review Sekarang <i class="fas fa-arrow-right ml-3"></i></a>
          <?php endif; ?>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-md-12">
          <div class=" mb-3">
            <div class="card px-5">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between mt-2">
                  <h4><strong>Chart Berita Bulan ini</strong></h4>
                  <h5 class="float-right"><small>total</small> <strong class="text-cyan" id="total-bulan"></strong></h5>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg"></span>
                    <span class="text-gray"><em>Total Berita Per Satuan Kerja BPS Bulan ini</em></span>
                  </p>
                </div>

                <div class="position-relative mb-4">
                  <canvas id="berita-chart-bulan" style="max-height: 540px;"></canvas>
                </div>
                <div class="d-flex flex-row justify-content-end">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-2">
        <div class="col-md-12">
          <div class=" mb-3">
            <div class="card px-5">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between mt-2">
                  <h4><strong>Chart Berita Tahun <?= date('Y'); ?></strong></h4>
                  <h5 class="float-right"><small>total</small> <strong class="text-cyan" id="total-tahun"></strong></h5>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg"></span>
                    <span class="text-gray"><em>Total Berita Per Satuan Kerja BPS Tahun <?= date('Y'); ?></em></span>
                  </p>
                </div>

                <div class="position-relative mb-4">
                  <canvas id="berita-chart-tahun" style="max-height: 540px;"></canvas>
                </div>
                <div class="d-flex flex-row justify-content-end">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>

<!-- ChartJS -->
<script src="<?= base_url('/plugins/chart.js/Chart.min.js') ?>"></script>
<script>
  var beritaChartBulan = document.getElementById('berita-chart-bulan').getContext('2d');
  var beritaChartTahun = document.getElementById('berita-chart-tahun').getContext('2d');
  var dataBeritaBulan = [<?php if ($bulan_satker != null) : ?>
      <?php foreach ($bulan_satker as $bulan) : ?>
        <?= $bulan; ?>,
      <?php endforeach; ?>
    <?php endif; ?>
  ]
  var dataBeritaTahun = [<?php if ($tahun_satker != null) : ?>
      <?php foreach ($tahun_satker as $tahun) : ?>
        <?= $tahun; ?>,
      <?php endforeach; ?>
    <?php endif; ?>
  ]
  var labelSatker = [<?php if ($list_satker != null) : ?>
      <?php foreach ($list_satker as $satker) : ?> "<?= $satker['satker']; ?>",
      <?php endforeach; ?>
    <?php endif; ?>
  ]
  let sumBulan = 0;
  let sumTahun = 0;
  for (let i = 0; i < dataBeritaBulan.length; i++) {
    sumBulan += dataBeritaBulan[i];
  }
  for (let i = 0; i < dataBeritaTahun.length; i++) {
    sumTahun += dataBeritaTahun[i];
  }
  $('#total-bulan').html(sumBulan)
  $('#total-tahun').html(sumTahun)

  var chartTahun = new Chart(beritaChartBulan, {
    type: 'horizontalBar',
    data: {
      labels: labelSatker,
      datasets: [{
        data: dataBeritaBulan,
        backgroundColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(75, 192, 192, 1)',
        ],
      }]
    },
    options: {
      legend: false,
      responsive: true,
      // maintainAspectRatio: true,
      scales: {
        xAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });

  var chartTahun = new Chart(beritaChartTahun, {
    type: 'horizontalBar',
    data: {
      labels: labelSatker,
      datasets: [{
        data: dataBeritaTahun,
        backgroundColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(75, 192, 192, 1)',
        ],
      }]
    },
    options: {
      legend: false,
      responsive: true,
      // maintainAspectRatio: true,
      scales: {
        xAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>

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