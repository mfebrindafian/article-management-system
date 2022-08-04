<?php if (allowHalaman(session('level_id'), 1)) : ?>
    <?= $this->extend('layout/template'); ?>

    <?= $this->section('content'); ?>
    <div class="content-wrapper d-none">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Tambah berita </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('/entryBerita') ?>">Entry Berita</a></li>
                            <li class="breadcrumb-item active">Tambah Berita</li>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <form id="form-tambah" action="<?= base_url('/uploadBerita'); ?>" method="post" class="card-body px-5" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-5 d-flex flex-column">
                                        <span><strong style="font-size: 20px;">Tentang Berita</strong></span>
                                        <span class="text-gray mb-4" style="font-size: 14px;">Keterangan tentang berita baru</span>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label class="text-gray-dark" style="font-size: 14px;" for="judul">Judul Berita</label>
                                            <input type="text" class="form-control " id="judul" name="judul" placeholder="Ketikkan judul berita" />
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="">
                                            <label class="text-gray-dark" style="font-size: 14px;">File Berita</label><br>
                                            <div class="row">
                                                <div class="col-4 form-group">
                                                    <label style="width: 100%;" class="choose-btn fa-w-1 ripple mt-1 text-center" id="chooseBtn" for="file_berita">Pilih word file</label>
                                                    <input type="file" class="form-control file" style="opacity: 0; width: 0; height: 0;" id="file_berita" name="file_berita" accept=".doc, .docx" required />
                                                </div>
                                                <div class="col-3 d-flex align-items-center pilih-files">

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-5">
                                                    <hr>
                                                </div>
                                                <div class="col-2 text-center text-gray opsional">
                                                    <small>
                                                        <em>Opsional</em>
                                                    </small>
                                                </div>
                                                <div class="col-5">
                                                    <hr>
                                                </div>
                                            </div>

                                            <div class="row opsional-row">
                                                <div class="col-4">
                                                    <label style="width:100%;" class="choose-btn-opsional fa-w-1 ripple mt-1 text-center" id="chooseBtn2" for="foto_berita1">Foto 1</label>
                                                    <input type="file" class="form-control d-none foto" id="foto_berita1" name="foto_berita1" accept=".jpg, .jpeg, .png" />
                                                </div>


                                                <div class="col-4">
                                                    <label style="width:100%;" class="choose-btn-opsional fa-w-1 ripple mt-1 text-center" id="chooseBtn3" for="foto_berita2">Foto 2</label>
                                                    <input type="file" class="form-control d-none foto" id="foto_berita2" name="foto_berita2" accept=".jpg, .jpeg, .png" />
                                                </div>


                                                <div class="col-4">
                                                    <label style="width:100%;" class="choose-btn-opsional fa-w-1 ripple mt-1 text-center" id="chooseBtn4" for="foto_berita3">Foto 3</label>
                                                    <input type="file" class="form-control d-none foto" id="foto_berita3" name="foto_berita3" accept=".jpg, .jpeg, .png" />
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <small class="text-red foto-validasi"></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-5 d-flex flex-column">
                                        <span><strong style="font-size: 20px;">Tentang Penulis</strong></span>
                                        <span class="text-gray mb-4" style="font-size: 14px;">Keterangan tentang penulis berita</span>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label class="text-gray-dark" style="font-size: 14px;" for="nama_penulis">Penulis</label>
                                            <input type="text" class="form-control" id="nama_penulis" name="nama_penulis" placeholder="Ketikkan nama penulis" value="<?= old('nama_penulis'); ?>" />
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-gray-dark" style="font-size: 14px;">Satuan Kerja</label>
                                            <select class="form-control filter mr-2" name="satker" id="satker" style="border-radius: 5px;">
                                                <option selected value="" <?= old('satker') ? '' : 'selected'; ?>>- Pilih Satuan Kerja -</option>
                                                <?php if ($list_satker != null) : ?>
                                                    <?php foreach ($list_satker as $satker) : ?>
                                                        <option <?= $satker == (old('satker')) ? 'selected' : ''; ?> value="<?= $satker['kd_satker']; ?>">[<?= $satker['kd_satker']; ?>] <?= $satker['satker']; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mt-5">
                                    <div class="col-12">
                                        <div class="float-right">
                                            <button class="mr-4 cancel-btn ripple" id="btn-reset" type="reset">Reset</button>
                                            <button type="submit" id="btn-submit" class="tombol-tambah float-right ripple shadow">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

    <script src="<?= base_url('/js/jquery.validate.min.js') ?>"></script>
    <script src="<?= base_url('/js/validasi.js') ?>"></script>

    <script>
        $(document).on('click', '#btn-submit', function() {
            if ($('#file_berita').val() == '') {
                $('#file_berita').parent().next().html('<small class="text-red">Silahkan pilih word file!</small>');
            }
        });
    </script>
    <?= $this->endSection(); ?>
<?php endif; ?>