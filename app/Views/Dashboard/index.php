<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper d-none">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><strong><small id="ucapan"></small> <?= session('fullname'); ?></strong></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">...</a></li>
            <li class="breadcrumb-item active">Home</li>
          </ol>
        </div>
      </div>
    </div>
  </div>



  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php if ($berita_publish != null) : ?>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <?php if ($berita_publish[count($berita_publish) - 1] != null) : ?>
                <?php $image_upload1 = $berita_publish[count($berita_publish) - 1]['image_upload']; ?>
                <?php $data1 = json_decode($image_upload1); ?>
                <?php if ($data1 != null) {
                  $foto_1 = $data1->image;
                } else {
                  $foto_1[0] = 'default.jpg';
                } ?>
                <div class="carousel-inner">
                  <?php if ($berita_publish[count($berita_publish) - 1]['link_publish'] != '') :  ?>
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="<?= base_url('/berkas/foto/' . $foto_1[0]); ?>">
                      <div class="carousel-caption d-none d-block w-50">
                        <h5 class="text-left judul-berita"><strong><?= $berita_publish[count($berita_publish) - 1]['judul_berita']; ?></strong></h5>
                        <a target="_blank" href="<?= $berita_publish[count($berita_publish) - 1]['link_publish']; ?>" class="baca ripple float-left">Baca</a>
                      </div>
                    </div>
                  <?php endif ?>
                <?php endif; ?>
                <?php if (count($berita_publish) > 1) : ?>
                  <?php if ($berita_publish[count($berita_publish) - 2] != null) : ?>
                    <?php $image_upload2 = $berita_publish[count($berita_publish) - 2]['image_upload']; ?>
                    <?php $data2 = json_decode($image_upload2); ?>
                    <?php if ($data2 != null) {
                      $foto_2 = $data2->image;
                    } else {
                      $foto_2[0] = 'default.jpg';
                    } ?>
                    <?php if ($berita_publish[count($berita_publish) - 2]['link_publish'] != '') :  ?>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="<?= base_url('/berkas/foto/' . $foto_2[0]); ?>">
                        <div class="carousel-caption d-none d-block w-50">
                          <h5 class="text-left judul-berita"><strong><?= $berita_publish[count($berita_publish) - 2]['judul_berita']; ?></strong></h5>
                          <a target="_blank" href="<?= $berita_publish[count($berita_publish) - 2]['link_publish']; ?>" class="baca ripple float-left">Baca</a>
                        </div>
                      </div>
                    <?php endif; ?>
                  <?php endif; ?>
                <?php endif; ?>
                <?php if (count($berita_publish) > 2) : ?>
                  <?php if ($berita_publish[count($berita_publish) - 3] != null) : ?>
                    <?php $image_upload3 = $berita_publish[count($berita_publish) - 3]['image_upload']; ?>
                    <?php $data3 = json_decode($image_upload3); ?>
                    <?php if ($data3 != null) {
                      $foto_3 = $data3->image;
                    } else {
                      $foto_3[0] = 'default.jpg';
                    } ?>
                    <?php if ($berita_publish[count($berita_publish) - 3]['link_publish'] != '') :  ?>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="<?= base_url('/berkas/foto/' . $foto_3[0]); ?>">
                        <div class="carousel-caption d-none d-block w-50">
                          <h5 class="text-left judul-berita"><strong><?= $berita_publish[count($berita_publish) - 3]['judul_berita']; ?></strong></h5>
                          <a target="_blank" href="<?= $berita_publish[count($berita_publish) - 3]['link_publish']; ?>" class="baca ripple float-left">Baca</a>
                        </div>
                      </div>
                    <?php endif; ?>
                  <?php endif; ?>
                <?php endif; ?>
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
          <?php endif; ?>

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
          <div class="card px-5 ">
            <div class="row my-4 overflow-auto">
              <div class="col-12 ">
                <div class="row mb-2">
                  <div class="col-md-6">
                    <h4 class="mb-4"><strong> Monitoring berita </strong><br><small class="minggu-apa">minggu ini</small></h4>

                  </div>
                  <div class="col-md-6">
                    <div class="float-md-right">
                      <button class="btn btn-link btn-sm btn-rounded ripple berita-active shadow mr-2 sebelum">
                        Sebelumnya
                      </button>
                      <button disabled class="btn btn-link btn-sm btn-rounded ripple berita-active shadow mr-2 hari-ini">
                        Setelahnya
                      </button>
                    </div>
                  </div>
                </div>

                <table class="table align-middle mb-0 bg-white " id="tabelData">
                  <thead class="bg-light">
                    <tr class="text-bold">
                      <td class="border ">Satker</td>
                      <td class="border text-center" style="width: 90px;">Sen</td>
                      <td class="border text-center" style="width: 90px;">Sel</td>
                      <td class="border text-center" style="width: 90px;">Rab</td>
                      <td class="border text-center" style="width: 90px;">Kam</td>
                      <td class="border text-center" style="width: 90px;">Jum</td>
                      <td class="border text-center" style="width: 90px;">Total</td>
                    </tr>
                  </thead>
                  <tbody class="rekap-body">

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-12">
          <div class="mb-3">
            <div class="card px-5">
              <div class="row my-4">
                <div class="col-12">
                  <a href="#ChartPerbulan" id="btnBulan" class="btn btn-link btn-sm btn-rounded ripple berita-active shadow mr-2">
                    Chart Bulan Ini
                  </a>
                  <a href="#ChartPertahun" id="btnTahun" class="btn btn-link btn-sm btn-rounded ripple filter-berita mr-2">
                    Chart Tahun Ini
                  </a>
                </div>
              </div>
              <div id="containerBulan">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between mt-2">
                    <h4><strong>Chart Berita Bulan <span id="bulan-ini-indo"></span></strong></h4>
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

              <!-- BATAS ANTAR CHART -->
              <div id="containerTahun" class="d-none">
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
      </div>

      <div class="row mt-2">
        <div class="col-md-12">
          <div class=" mb-3">
            <div class="card px-5">

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

  bulan()

  function tahun() {
    var chartTahun = new Chart(beritaChartTahun, {
      type: 'horizontalBar',
      data: {
        labels: labelSatker,
        datasets: [{
          data: dataBeritaTahun,
          backgroundColor: [
            'rgba(224, 187, 228, 1)',
            'rgba(149, 125, 173, 1)',
            'rgba(210, 145, 188, 1)',
            'rgba(254, 200, 216, 1)',
            'rgba(255, 223, 211, 1)',
            'rgba(156, 163, 214, 1)',
            'rgba(207, 193, 232, 1)',
            'rgba(242, 213, 239, 1)',
            'rgba(247, 239, 218, 1)',
            'rgba(179, 221, 196, 1)',
            'rgba(235, 204, 208, 1)',
            'rgba(255, 221, 223, 1)',
            'rgba(191, 212, 176, 1)',
            'rgba(246, 220, 171, 1)',
            'rgba(245, 152, 170, 1)',
            'rgba(125, 218, 217, 1)',
            'rgba(255, 217, 249, 1)',
            'rgba(222, 208, 242, 1)',
            'rgba(247, 197, 167, 1)',
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
  }

  function bulan() {
    var chartBulan = new Chart(beritaChartBulan, {
      type: 'horizontalBar',
      data: {
        labels: labelSatker,
        datasets: [{
          data: dataBeritaBulan,
          backgroundColor: [
            'rgba(224, 187, 228, 1)',
            'rgba(149, 125, 173, 1)',
            'rgba(210, 145, 188, 1)',
            'rgba(254, 200, 216, 1)',
            'rgba(255, 223, 211, 1)',
            'rgba(156, 163, 214, 1)',
            'rgba(207, 193, 232, 1)',
            'rgba(242, 213, 239, 1)',
            'rgba(247, 239, 218, 1)',
            'rgba(179, 221, 196, 1)',
            'rgba(235, 204, 208, 1)',
            'rgba(255, 221, 223, 1)',
            'rgba(191, 212, 176, 1)',
            'rgba(246, 220, 171, 1)',
            'rgba(245, 152, 170, 1)',
            'rgba(125, 218, 217, 1)',
            'rgba(255, 217, 249, 1)',
            'rgba(222, 208, 242, 1)',
            'rgba(247, 197, 167, 1)',
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
  }


  $(document).on('click', '#btnBulan', function() {
    $(this).addClass('berita-active shadow').removeClass('filter-berita')
    $('#btnTahun').removeClass('berita-active shadow').addClass('filter-berita')
    $('#containerBulan').removeClass('d-none')
    $('#containerTahun').addClass('d-none')
    bulan()
  })
  $(document).on('click', '#btnTahun', function() {
    $(this).addClass('berita-active shadow').removeClass('filter-berita')
    $('#btnBulan').removeClass('berita-active shadow').addClass('filter-berita')
    $('#containerBulan').addClass('d-none')
    $('#containerTahun').removeClass('d-none')
    tahun()
  })
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
<script src="<?= base_url('/js/tanggal.js') ?>"></script>
<script>
  var _0x16ef = ["\x67\x65\x74", "\x3C\x3F\x3D\x20\x62\x61\x73\x65\x5F\x75\x72\x6C\x28\x27\x2F\x6D\x6F\x6E\x69\x74\x6F\x72\x69\x6E\x67\x27\x29\x20\x3F\x3E", "\x70\x61\x72\x73\x65\x4A\x53\x4F\x4E", "\x61\x6A\x61\x78"];

  function render(_0xe434x2) {
    $[_0x16ef[3]]({
      type: _0x16ef[0],
      url: "<?= base_url('/monitoring') ?>" + _0xe434x2,
      success: function(_0xe434x3) {
        let _0xe434x4 = jQuery[_0x16ef[2]](_0xe434x3);
        gantiPekan(_0xe434x4)
      }
    })
  }
  var jadwalLink = '<?= base_url('/js/jadwal.json') ?>';
</script>
<script src="<?= base_url('/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?= base_url('/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('/js/index.js') ?>"></script>

<script>
  var date = new Date();

  var currentDate = '<?php

                      use CodeIgniter\I18n\Time;

                      $myTime = Time::today('Asia/Jakarta');
                      echo $myTime->toLocalizedString('yyyy-MM-dd');
                      ?>';

  $('#bulan-ini-indo').html(ubahBulan(currentDate))

  <?php if (session('level_id') == 3 || session('level_id') == 1) : ?>

    function renderTabel() {
      $('#tabelData')
        .DataTable({
          paging: false,
          lengthChange: false,
          searching: false,
          responsive: false,
          destroy: true,
          ordering: false,
          info: false,
          autoWidth: false,
          buttons: {
            buttons: [{
              extend: 'excel',
              filename: 'Monitoring - berita - tanggal - ' + minggu[0].toISOString().slice(0, 10) + ' Hingga ' + minggu[4].toISOString().slice(0, 10),
              title: 'Monitoring-berita-tanggal-' + minggu[0].toISOString().slice(0, 10) + ' Hingga ' + minggu[4].toISOString().slice(0, 10),
              className: 'btn btn-link btn-sm btn-rounded border-warning ripple excel-active maksimal shadow',
            }, ],
          },
        })
        .buttons()
        .container()
        .appendTo('.float-md-right');
    }

    setTimeout(function() {
      renderTabel();
    }, 500);
  <?php endif; ?>
  $('.sebelum').on('click', function() {
    mingguApaa((gap = -7));
    jadwal();
    <?php if (session('level_id') == 3 || session('level_id') == 1) : ?>
      $('#tabelData').DataTable().clear();
      $('#tabelData').DataTable().destroy();
      setTimeout(function() {
        renderTabel();
      }, 500);
    <?php endif; ?>
  });

  $('.hari-ini').on('click', function() {
    mingguApaa((gap = 7));
    jadwal();
    <?php if (session('level_id') == 3 || session('level_id') == 1) : ?>
      $('#tabelData').DataTable().clear();
      $('#tabelData').DataTable().destroy();
      setTimeout(function() {
        renderTabel();
      }, 500);
    <?php endif; ?>
  });
</script>




<?= $this->endSection(); ?>