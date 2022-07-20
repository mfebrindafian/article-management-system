<?= $this->extend('layout/template'); ?>
<?php if (allowHalaman(session('level_id'), 1)) : ?>

  <?= $this->section('content'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 fw-bold">Dashboard</h1>
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

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6 widget" style="cursor: pointer;">
            <!-- small box -->
            <div class="small-box  bg-white" style="border: 1px solid gray; padding: 0;">
              <div class="inner" style="color: #55415C; padding-left: 15px;">
                <h3 style="font-size: 70px;"><?= $total_laporan; ?></h3>
                <p style="font-weight: bold;">Jumlah Laporan</p>
              </div>
              <?php if (session('level_id') == 7) : ?>
                <a href="<?= base_url('/listLaporan'); ?>" class="selanjutnya">
                  <p style="margin:0;">More info</p> <i class="fas fa-arrow-circle-down"></i>
                </a>
              <?php else : ?>
                <a href="" class="selanjutnya">
                  <p style="margin:0;">&nbsp;</p>
                </a>
              <?php endif; ?>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 widget" style="cursor: pointer;">
            <!-- small box -->
            <div class="small-box bg-white" style="border: 1px solid gray; padding: 0;">
              <div class="inner" style="color: #55415C; padding-left: 15px;">

                <h3 style="font-size: 70px;"><?= $total_kegiatan_bulan_ini; ?></h3>

                <p style="font-weight: bold;">Jumlah Kegiatan Bulan <?= $nama_bulan; ?></p>
              </div>
              <?php if ($total_kegiatan_bulan_ini != null && session('level_id') == 7) {
                echo '<a href="#" data-toggle="modal" data-target="#modal-list-laporan" class="selanjutnya">
                <p style="margin:0;">More info</p> <i class="fas fa-arrow-circle-down"></i>
              </a>';
              } else {
                echo
                '<a href="#" class="selanjutnya">
                <p style="margin:0;">&nbsp;</p>
              </a>';
              } ?>


            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 widget" style="cursor: pointer;">
            <!-- small box -->
            <div class="small-box bg-white" style="border: 1px solid gray; padding: 0;">
              <div class="inner" style="color: #55415C; padding-left: 15px;">
                <?php if ($jumlah_user != null) : ?>
                  <h3 style="font-size: 70px;"><?= $jumlah_user; ?></h3>
                <?php endif; ?>
                <p style="font-weight: bold;">Jumlah User</p>
              </div>
              <a href="#" class="selanjutnya">
                <p style="margin:0;">&nbsp;</p>
              </a>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 widget" style="cursor: pointer;">
            <!-- small box -->
            <div class="small-box bg-white" style="border: 1px solid gray; padding: 0;">
              <div class="inner" style="color: #55415C; padding-left: 15px;">
                <h3 style="font-size: 70px;">0</h3>

                <p style="font-weight: bold;">Angka Kredit</p>
              </div>
              <a href="#" class="selanjutnya">
                <p style="margin:0;">&nbsp;</p>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div>
    </section>

    <!-- CALENDAR -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-7">
            <div class="mb-3">
              <div class="card">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
            </div>
          </div>
          <!-- CHART -->

          <?php if (allowChart(session('level_id'), 1)) : ?>
            <div class="col-md-5">
              <div class=" mb-3">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title">Kegiatan Tahun <?= date('Y'); ?></h3>

                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex">
                      <p class="d-flex flex-column">
                        <span class="text-bold text-lg"><?= $jumlah_kegiatan_tahun_ini; ?></span>
                        <span>Kegiatan</span>
                      </p>
                    </div>

                    <div class="position-relative mb-4">
                      <canvas id="kegiatan-chart" height="450"></canvas>
                    </div>
                    <div class="d-flex flex-row justify-content-end">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>



        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



  <!-- MODAL KEGIATAN -->
  <div class="modal fade" id="modal-list-laporan">
    <div class="modal-dialog modal-dialog-scrollable modal-xl ">
      <div class="modal-content" enctype="multipart/form-data">
        <input type="text" id="id_kegiatan" name="id_kegiatan" class="d-none">
        <div class="modal-header">
          <h4 class="modal-title">Kegiatan Bulan <?php if ($nama_bulan != null) {
                                                    echo $nama_bulan;
                                                  } else {
                                                    echo '';
                                                  }; ?></h4>
          <button id="btn-close-modal-tambah" type="button" class="close" aria-label="Close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="get">
          <div class="input-group input-group-md float-right mr-5 mt-3" style="width: 450px">
            <input type="text" name="keyword" class="form-control float-right auto_search" placeholder="Search" onkeypress="return event.keyCode != 13" />
            <div class="input-group-append">
              <button type="button" class="btn btn-default " id="btn-search">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
        <div class="modal-body px-5 py-3">
          <div class="row">
            <div class="col-md-12">
              <table class="table table-hover" id="tabelData">
                <thead>
                  <tr>
                    <th>NO.</th>
                    <th>URAIAN</th>
                    <th>JUMLAH</th>
                    <th>SATUAN</th>
                    <th>HASIL KEGIATAN</th>
                    <th>BUKTI DUKUNG</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>

                  <?php if ($laporan_bulan_ini != null) : ?>
                    <?php foreach ($laporan_bulan_ini as $list) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td id="tgl-kegiatan-tabel"><?= $list['tgl_kegiatan']; ?></td>
                        <?php $laporan = $list['uraian_kegiatan']; ?>
                        <?php $data = json_decode($laporan); ?>
                        <?php $list_uraian = $data->uraian; ?>
                        <td>
                          <?php foreach ($list_uraian as $uraian) : ?>
                            <div class="p-2 mb-1 rounded-sm card-laporan">
                              <?= $uraian; ?>
                            </div>
                          <?php endforeach; ?>
                        </td>
                        <?php $list_jumlah = $data->jumlah; ?>
                        <td>
                          <?php foreach ($list_jumlah as $jumlah) : ?>
                            <div class="p-2 mb-1 text-center rounded-sm card-laporan">
                              <?= $jumlah; ?>
                            </div>
                          <?php endforeach; ?>
                        </td>
                        <?php $list_satuan2 = $data->satuan; ?>
                        <td>
                          <?php foreach ($list_satuan2 as $satuan) : ?>
                            <div class="p-2 mb-1 text-center rounded-sm card-laporan">
                              <?= $satuan; ?>
                            </div>
                          <?php endforeach; ?>
                        </td>
                        <?php $list_bukti_dukung = $data->bukti_dukung; ?>
                        <td>
                          <?php $data_user = session('data_user'); ?>
                          <?php $folderNIP = $data_user['nip_lama_user'];  ?>
                          <?php foreach ($list_bukti_dukung as $bukti_dukung) : ?>
                            <div class="p-2 mb-1 rounded-sm card-bukti-laporan">
                              <?php foreach ($bukti_dukung as $b) : ?>
                                <a title="<?= $b; ?>" target="_blank" href="<?= base_url('berkas/' . $folderNIP . '/' . $list['tgl_kegiatan'] . '/' . $b) ?>"> <?= $b; ?></a>
                              <?php endforeach; ?>
                            </div>
                          <?php endforeach; ?>

                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>



  <!-- MODAL TAMBAH KEGIATAN -->
  <div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-xl ">
      <form action="<?= base_url('/saveLaporanHarian'); ?>" method="post" class="modal-content" enctype="multipart/form-data">
        <input type="text" id="id_kegiatan" name="id_kegiatan" class="d-none">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Laporan Kegiatan</h4>
          <button id="btn-close-modal-tambah" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5 py-3">
          <div class="row">
            <div class="col-12 p-0">
              <div class="form-group">
                <p>tanggal Kegiatan
                </p>
                <h2 class="mb-3" id="tanggal-tambah"></h2>
                <input type="date" class="form-control d-none" name="tanggal" id="hari-ini" class="form-control">
              </div>
            </div>
          </div>

          <!-- lama -->
          <div id="lama">
            <div class="row rounded position-relative pt-2 kegiatan-baru ">
              <div class="col-xl-1 baris-kegiatan">
                <div class="row"><strong>NO</strong></div>
                <div class="row">1</div>
              </div>
              <div class="col-xl-4 baris-kegiatan">
                <div class="row"><strong>Uraian Kegiatan</strong></div>
                <?php if ($list_full_laporan_harian != null) : ?>
                  <?php foreach ($list_full_laporan_harian as $list) : ?>
                    <?php $laporan = $list['uraian_kegiatan']; ?>
                    <?php $data = json_decode($laporan); ?>
                    <?php $list_uraian = $data->uraian; ?>
                    <?php foreach ($list_uraian as $uraian) : ?>
                      <?php $list_uraian_unik[] = $uraian; ?>
                    <?php endforeach; ?>
                  <?php endforeach; ?>
                <?php endif; ?>
                <div class="row px-1  w-100">
                  <div class="form-group w-100 position-relative">
                    <textarea id="kegiatan-input" class="form-control  w-100" name="field_uraian[]" rows="3" placeholder="Masukkan Uraian Kegiatan ..." required></textarea>
                    <div class="option-kegiatan-wrapper w-100 mt-2 bg-white py-2 rounded shadow-lg position-absolute d-none">
                      <?php if ($list_full_laporan_harian != null) : ?>
                        <?php foreach (array_unique($list_uraian_unik) as $uraian) : ?>
                          <option class="option-kegiatan border-bottom d-none"><?= $uraian; ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-1 baris-kegiatan">
                <div class="row"><strong>Jumlah</strong></div>
                <div class="row px-1  w-100">
                  <div class="form-group  w-100">
                    <input type="number" class="form-control  w-100" value="1" name="field_jumlah[]" min="1" required>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 baris-kegiatan">
                <div class="row"><strong>Satuan</strong></div>
                <div class="row px-1  w-100">
                  <div class="input-group  w-100">
                    <select class=" form-control  w-100" name="field_satuan[]" required>
                      <?php if ($list_satuan != NULL) : ?>
                        <?php foreach ($list_satuan as $satuan) : ?>
                          <option value="<?= $satuan['nama_satuan']; ?>"><?= $satuan['nama_satuan']; ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 baris-kegiatan">
                <div class="row"><strong>Hasil Kegiatan</strong></div>
                <div class="row px-1  w-100">
                  <div class="form-group  w-100 position-relative">
                    <textarea class="form-control  w-100" name="field_hasil[]" rows="3" placeholder="Masukkan Hasil Kegiatan ..." required></textarea>
                    <!-- <textarea id="kegiatan-input" class="form-control  w-100" name="field_hasil[]" rows="3" placeholder="Masukkan Hasil Kegiatan ..." required></textarea> -->
                    <!-- <div class="option-kegiatan-wrapper w-100 mt-2 bg-white py-2 rounded shadow-lg position-absolute d-none">
                                        <option class="option-kegiatan border-bottom d-none">Option 1</option>
                                    </div> -->
                  </div>
                </div>
              </div>
              <div class="col-xl-2 baris-kegiatan mb-2">
                <div class="row"><strong>Bukti Dukung</strong></div>
                <div class="row w-100">
                  <div class="input-group w-100">
                    <div class="custom-file w-100 position-relative">
                      <input type="file" class="custom-file-input w-100" name="field_bukti1[]" id="formFileMultiple" accept=".png, .jpg, .jpeg, .pdf, .xlsx, .docx, .ppt, .txt, .rar, .zip, .csv" required multiple />
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      <p class="file-tip d-none">
                        <strong class="mt-2 d-flex align-items-center">
                          <i class="fas fa-exclamation-circle fa-2x text-yellow mr-2"></i>
                          Jenis file :
                        </strong> <br>
                        .png, .jpg, .jpeg, .pdf, .xlsx, .docx, .ppt, .txt, .rar, .zip <br><br>
                        <strong>
                          Ukuran File Maks : 200kb
                        </strong>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- baru -->
          <div id="baru">

          </div>
          <!-- tombol -->
          <div class="row ">
            <div class="col-12 py-3 px-0">
              <button id="tambah-baris" type="button" class="btn btn-info w-100">
                <i class="fas fa-plus"></i> Tambah
              </button>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button data-dismiss="modal" type="button" class="btn btn-default">Tutup</button>
          <button type="submit" class="btn btn-info tombol" style="background-color: #3c4b64; border:none;">Simpan</button>
        </div>
      </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <!-- MODAL DETAIL -->
  <div class="modal fade" id="<?= $modal_detail; ?>" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
      <div class="modal-content">
        <div class="modal-header pt-3" style="border: none;">
          <a href="<?= base_url('/dashboard'); ?>" type="button" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <div class="modal-body px-5 py-3">
          <div class="row mb-2">
            <div class="col-md-12 p-0">
              <p>Tanggal Kegiatan
              </p>
              <?php if ($laporan_harian_tertentu != NULL) : ?>
                <h1> <?= $laporan_harian_tertentu['tgl_kegiatan']; ?></h1>
                <p>Last Modified : <?= $laporan_harian_tertentu['updated_at'];; ?></p>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>NO.</th>
                    <th>URAIAN</th>
                    <th>JUMLAH</th>
                    <th>SATUAN</th>
                    <th>HASIL KEGIATAN</th>
                    <th>BUKTI DUKUNG</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if ($laporan_harian_tertentu != NULL) : ?>
                    <input type="hidden" name="id_laporan_harian_tertentu" value="<?= $laporan_harian_tertentu['id']; ?>">
                    <?php $laporan = $laporan_harian_tertentu['uraian_kegiatan']; ?>
                    <?php $data = json_decode($laporan); ?>
                    <?php for ($i = 0; $i < count($list_uraian = $data->uraian); $i++) : ?>
                      <tr>
                        <td>
                          <?= $i + 1; ?>
                        </td>
                        <td>
                          <?= $list_uraian[$i]; ?>
                        </td>
                        <td class="text-center">
                          <?php $list_jumlah = $data->jumlah; ?>
                          <?= $list_jumlah[$i]; ?>
                        </td>
                        <td>
                          <?php $list_satuan2 = $data->satuan; ?>
                          <?= $satuan['nama_satuan']; ?>
                        </td>
                        <td>
                          <?php $list_hasil = $data->hasil; ?>
                          <?= $list_hasil[$i]; ?>
                        </td>
                        <?php $data_user = session('data_user'); ?>
                        <?php $folderNIP = $data_user['nip_lama_user'];  ?>
                        <td>
                          <?php $list_bukti_dukung = $data->bukti_dukung; ?>
                          <?php for ($a = 0; $a < count($list_bukti_dukung[$i]); $a++) : ?>
                            <div title="<?= $list_bukti_dukung[$i][$a]; ?>" class="file-list">
                              <a title="<?= $list_bukti_dukung[$i][$a]; ?>" href="<?= base_url('berkas/' . $folderNIP . '/' . $laporan_harian_tertentu['tgl_kegiatan'] . '/' . $list_bukti_dukung[$i][$a]) ?>"> <?= $list_bukti_dukung[$i][$a]; ?></a>
                            </div>
                          <?php endfor; ?>

                        </td>
                      </tr>
                    <?php endfor; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




  <!-- /.modal -->

  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?= base_url('/dist/js/pages/dashboard.js') ?>"></script>

  <!-- fullCalendar 2.2.5 -->
  <script src="<?= base_url('/plugins/moment/moment.min.js') ?>"></script>
  <script src="<?= base_url('/plugins/fullcalendar/main.js') ?>"></script>
  <script src="<?= base_url('/dist/js/pages/dashboard3.js') ?>"></script>
  <script src="<?= base_url('/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
  <script src="<?= base_url('/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
  <!-- Toastr -->
  <script src="<?= base_url('/plugins/toastr/toastr.min.js') ?>"></script>
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>

  <script>
    $(document).ready(function() {

      let tglTabel = document.querySelectorAll('#tgl-kegiatan-tabel')
      for (i = 0; i <= tglTabel.length; i++) {
        tglTabel[i].innerHTML = ubahFormatTanggal2(tglTabel[i].textContent);
      }
    })
    $(document).ready(function() {
      $(document).on('keyup', '#kegiatan-input', function() {
        $(this).next().removeClass('d-none')
        for (i = 0; i <= $(this).next().children().length; i++) {
          if ($(this).next().children().eq(i).text().toLowerCase().match($(this).val().toLowerCase()) !== null) {
            $(this).next().children().eq(i).removeClass('d-none')
          } else {
            $(this).next().children().eq(i).addClass('d-none')
          }
        }
      })

      $(document).on('blur', '#kegiatan-input', function() {
        let textarea = $(this)
        setTimeout(function() {
          textarea.next().addClass('d-none')
        }, 400)
      })

      $(document).on('click', '.option-kegiatan', function() {
        $(this).parent().prev().val($(this).text())
        $(this).parent().addClass('d-none')
      })
    })
  </script>

  <script>
    var Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
    });
    $(document).on('input', '#formFileMultiple', function() {
      if (this.files[0].size > 500000) { // ini untuk ukuran 500 Kb
        Toast.fire({
          icon: "warning",
          title: "Ukuran File Melebihi 200Kb!",
        });
        this.value = "";
        return false;
      };
      var pathFile = this.value;
      var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.pdf|\.xlsx|\.docx|\.ppt|\.txt|\.rar|\.zip|\.csv)$/i;
      if (!ekstensiOk.exec(pathFile)) {
        Toast.fire({
          icon: "warning",
          title: "Silakan upload file yang dengan ekstensi .png, .jpg, .jpeg, .pdf, .xlsx, .docx, .ppt, .txt, .rar, .zip, .csv",
        });
        this.value = "";
        return false;
      }
    })
  </script>
  <script>
    $(document).ready(function() {
      $("#modal-edit").modal("show");
      $("#modal-detail").modal("show");

      $(document).on("click", "#hapus-baris", function() {
        if ($(this).parent().parent().attr('id') == 'baru') {
          $(this).parent().remove();
          $('#baru').children().find('#hapus-baris').addClass('d-none')
          $('#baru').children().last().find('#hapus-baris').removeClass('d-none')
        }
        if ($(this).parent().parent().attr('id') == 'baru2') {
          $(this).parent().remove();
          $('#baru2').children().find('#hapus-baris').addClass('d-none')
          $('#baru2').children().last().find('#hapus-baris').removeClass('d-none')
        }
      });

      function appendBaris(modal, noBaris) {
        $(modal).append(
          `
        <div class="row mt-4 rounded position-relative pt-2 kegiatan-baru">
                    <span id="hapus-baris" type="button" class="delete-kegiatan"><i class="fas fa-times"></i></span>
                    <div class="col-xl-1 baris-kegiatan">
                        <div class="row"><strong>NO</strong></div>
                        <div class="row">` +
          noBaris +
          `</div>
                    </div>
                    <div class="col-xl-4 baris-kegiatan">
                        <div class="row"><strong>Uraian Kegiatan</strong></div>
                        <div class="row px-1 w-100">
                        <div class="form-group w-100 position-relative">
                                    <textarea id="kegiatan-input" class="form-control  w-100" name="field_uraian[]" rows="3" placeholder="Masukkan Uraian Kegiatan ..." required></textarea>
                                    <div class="option-kegiatan-wrapper w-100 mt-2 bg-white py-2 rounded shadow-lg position-absolute d-none">
                                    <?php if ($list_full_laporan_harian != null) : ?>
                                        <?php foreach (array_unique($list_uraian_unik) as $uraian) : ?>
                                            <option class="option-kegiatan border-bottom d-none"><?= $uraian; ?></option>
                                        <?php endforeach; ?>
                                     <?php endif; ?>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-1 baris-kegiatan">
                        <div class="row"><strong>Jumlah</strong></div>
                        <div class="row px-1 w-100">
                            <div class="form-group w-100">
                                <input type="number" min="1" value="1" class="form-control w-100" name="field_jumlah[]" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 baris-kegiatan">
                        <div class="row"><strong>Satuan</strong></div>
                        <div class="row px-1 w-100">
                            <div class="input-group w-100">
                            <select class=" form-control w-100" name="field_satuan[]" required>
                                    <?php if ($list_satuan != NULL) : ?>
                                        <?php foreach ($list_satuan as $satuan) : ?>
                                            <option value="<?= $satuan['nama_satuan']; ?>"><?= $satuan['nama_satuan']; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 baris-kegiatan">
                        <div class="row"><strong>Hasil Kegiatan</strong></div>
                        <div class="row px-1 w-100">
                              <div class="form-group  w-100 position-relative">
                              <textarea class="form-control  w-100" name="field_hasil[]" rows="3" placeholder="Masukkan Hasil Kegiatan ..." required></textarea>
                            
                                </div>
                        </div>
                    </div>
                    <div class="col-xl-2 baris-kegiatan mb-2">
                        <div class="row"><strong>Bukti Dukung</strong></div>
                        <div class="row w-100">
                            <div class="input-group w-100">
                                <div class="custom-file w-100">
                                    <input type="file" class="custom-file-input w-100" name="field_bukti` +
          noBaris +
          `[]" id="formFileMultiple" accept=".png, .jpg, .jpeg, .pdf, .xlsx, .docx, .ppt, .txt, .rar, .zip, .csv" required multiple />
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    <p class="file-tip d-none">
                                            <strong class="mt-2 d-flex align-items-center">
                                                <i class="fas fa-exclamation-circle fa-2x text-yellow mr-2"></i>
                                                Jenis file :
                                            </strong> <br>
                                            .png, .jpg, .jpeg, .pdf, .xlsx, .docx, .ppt, .txt, .rar, .zip <br><br>
                                            <strong>
                                                Ukuran File Maks : 200kb
                                            </strong>
                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
    `
        );
      }

      $('[id^="tambah-baris"]').click(function() {
        let noBaris = $("#lama").children().length + $("#baru").children().length + 1;
        appendBaris("#baru", noBaris);
        bsCustomFileInput.init();
        $('#baru').children().find('#hapus-baris').addClass('d-none')
        $('#baru').children().last().find('#hapus-baris').removeClass('d-none')
      });

      $('[id^="tambah-baris2"]').click(function() {
        let noBaris2 = $("#lama2").children().length + $("#baru2").children().length + 1;
        appendBaris("#baru2", noBaris2);
        bsCustomFileInput.init();
        $('#baru2').children().find('#hapus-baris').addClass('d-none')
        $('#baru2').children().last().find('#hapus-baris').removeClass('d-none')
      });
    });
  </script>

  <script>
    $(document).on("mouseover", '.custom-file-input', function() {
      $(this).next().next().removeClass('d-none')
    })
    $(document).on("mouseout", '.custom-file-input', function() {
      $(this).next().next().addClass('d-none')
    })
    $(document).on("mouseover", '.file-list', function() {
      $(this).next('.file-tip2').removeClass('d-none')
    })
    $(document).on("mouseout", '.file-list', function() {
      $(this).next('.file-tip2').addClass('d-none')
    })
  </script>


  <script>
    $(function() {
      var date = new Date();
      var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();

      var Calendar = FullCalendar.Calendar;
      var calendarEl = document.getElementById('calendar');
      var calendar = new Calendar(calendarEl, {
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay',
        },
        themeSystem: 'bootstrap',
        events: '',
        editable: false,
        droppable: false,
      });
      calendar.render();
    });


    $('#btn-list-laporan').click(function() {
      $('#modal-list-laporan').modal('show');
    })
    <?php if (session('level_id') == 7) : ?>
      var check = <?= $events ?>;

      const start = new Date("2022-07-01");
      const end = new Date();
      let uncheck = []
      let j = 0

      for (var loop = new Date(start); loop <= end; loop.setDate(loop.getDate() + 1)) {
        uncheck[j] = loop.toISOString().slice(0, 10)
        j++
      }

      for (i = 0; i < check.length; i++) {
        for (j = 0; j < uncheck.length; j++) {
          if (check[i]['tgl'] == uncheck[j]) {
            uncheck[j] = ''
          }
        }
      }

      function appendIconKalender() {
        for (i = 0; i < check.length; i++) {
          $('.fc-daygrid-day').each(function() {
            if ($(this).data('date') == check[i]['tgl']) {
              $(this).find('.fc-daygrid-day-events').addClass('d-flex justify-content-center')
              $(this).find('.fc-daygrid-day-events').append(`<a href="` + check[i]['link'] + `" class="iconKalender"><i class="fas fa-check-circle fa-2x text-green"></i></a>`)
            }
          })
        }
      }

      function appendIconKalenderUncheck() {
        for (i = 0; i < uncheck.length; i++) {
          $('.fc-daygrid-day').each(function() {
            if ($(this).data('date') == uncheck[i]) {
              $(this).find('.fc-daygrid-day-events').addClass('d-flex justify-content-center')
              $(this).find('.fc-daygrid-day-events').append(`<a href="" id="btn-uncheck" data-toggle="modal" data-target="#modal-tambah" data-date_click="` + $(this).data('date') +
                `" class="iconKalender"><i class="fas fa-exclamation-circle fa-2x text-red"></i></a>`)
            }
          })
        }
      }



      $(document).ready(function() {
        appendIconKalender();
        appendIconKalenderUncheck();
        disableBPH()
        // 
        $('.fc-prev-button').click(function() {
          hapusAppend()
          appendIconKalender()
          appendIconKalenderUncheck()
          disableBPH()
        })
        $('.fc-next-button').click(function() {
          hapusAppend();
          appendIconKalender()
          appendIconKalenderUncheck()
          disableBPH()
        })
        $('.fc-today-button').click(function() {
          hapusAppend();

          appendIconKalender()
          appendIconKalenderUncheck()
          disableBPH()
        })
      })

      // disable bulan pekan hari
      function disableBPH() {
        $('.fc-header-toolbar div:last-child').remove()
      }

      function hapusAppend() {
        $('.fc-daygrid-day').each(function() {
          $(this).find('.iconKalender').remove()
        })
      }

    <?php endif; ?>
  </script>

  <script src="<?= base_url('/js/tanggal.js') ?>"></script>
  <script>
    $(document).on('click', '#btn-uncheck', function() {
      $('#hari-ini').val($(this).data('date_click'));

      $('#tanggal-tambah').html(ubahFormatTanggal($('#hari-ini').val()))
    })
    $('#tanggal-edit').html(ubahFormatTanggal($('#tanggal-kegiatan').val()))
  </script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>


  <script type="text/javascript">
    $('#tabelData').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "responsive": true,
      'ordering': false,
      "info": false,
      "autoWidth": false

    });

    function filterData() {
      $('#tabelData').DataTable().search(
        $('.auto_search').val()
      ).draw();
    }
    $('.auto_search').on('keyup', function() {
      filterData();
    });

    $(document).ready(function() {

      $('#tabelData_wrapper').children().first().addClass('d-none')
    })
  </script>


  <script>
    $(function() {
      'use strict';

      var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold',
      };

      var mode = 'index';
      var intersect = true;

      var $kegiatanChart = $('#kegiatan-chart');
      // eslint-disable-next-line no-unused-vars
      var kegiatanChart = new Chart($kegiatanChart, {
        type: 'horizontalBar',
        data: {
          labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
          datasets: [{
            backgroundColor: '#3c4b64',
            borderColor: '#3c4b64',
            data: [<?= $total_januari; ?>, <?= $total_februari; ?>, <?= $total_maret; ?>, <?= $total_april; ?>, <?= $total_mei; ?>, <?= $total_juni; ?>, <?= $total_juli; ?>, <?= $total_agustus; ?>, <?= $total_september; ?>, <?= $total_oktober; ?>, <?= $total_november; ?>, <?= $total_desember; ?>],
          }, ],
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            mode: mode,
            intersect: intersect,
          },
          hover: {
            mode: mode,
            intersect: intersect,
          },
          legend: {
            display: false,
          },
          scales: {
            xAxes: [{
              range: 1,
              gridLines: {
                display: true,
              },
              ticks: $.extend({
                  beginAtZero: true,

                  callback: function(value) {
                    return value;
                  },
                },
                ticksStyle
              ),
            }, ],
            yAxes: [{
              display: true,
              gridLines: {
                display: false,
              },
              ticks: ticksStyle,
            }, ],
          },
        },
      });
    });
  </script>

  </script <?= $this->endSection(); ?> <?php endif; ?>