<?php if (allowHalaman(session('level_id'), 1)) : ?>
    <?= $this->extend('layout/template'); ?>

    <?= $this->section('content'); ?>
    <?php if (session('user_id') == $berita['user_id']) : ?>
        <div class="content-wrapper d-none">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"> Edit berita </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('/entryBerita') ?>">Entry Berita</a></li>
                                <li class="breadcrumb-item active">Edit Berita</li>
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
                                <form id="form-tambah" action="<?= base_url('/updateBerita'); ?>" method="post" class="card-body px-5" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-5 d-flex flex-column">
                                            <span><strong style="font-size: 20px;">Tentang Berita</strong></span>
                                            <span class="text-gray mb-4" style="font-size: 14px;">Keterangan tentang berita baru</span>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="hidden" name="id_berita" value="<?= $berita['id']; ?>">
                                            <div class="form-group">
                                                <label class="text-gray-dark" style="font-size: 14px;" for="judul">Judul Berita</label>
                                                <input type="text" class="form-control" id="judul" name="judul" value="<?= $berita['judul_berita']; ?>" />

                                            </div>
                                            <div class="form-group">
                                                <label class="text-gray-dark" style="font-size: 14px;">File Berita</label><br>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label style="width: 100%;" class="choose-btn fa-w-1 ripple mt-1 text-center" id="chooseBtn" for="file_berita"><?= $berita['file_draft'];; ?></label>
                                                        <input type="hidden" name="file_berita_lama" value="<?= $berita['file_draft']; ?>">
                                                        <input type="file" class="form-control d-none" id="file_berita" name="file_berita" accept=".doc, .docx" value="<?= $berita['file_draft'] ?>" />

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
                                                    <?php $image_upload = $berita['image_upload']; ?>
                                                    <?php $data = json_decode($image_upload); ?>
                                                    <?php if ($data != null) {
                                                        $foto_all = $data->image;
                                                    } else {
                                                        $foto_all[0] = 'Foto 1';
                                                        $foto_all[1] = 'Foto 2';
                                                        $foto_all[2] = 'Foto 3';
                                                    } ?>
                                                    <div class="col-4">
                                                        <?php if (count($foto_all) == 3) {
                                                            $foto_1 = $foto_all[0];
                                                            $foto_2 = $foto_all[1];
                                                            $foto_3 = $foto_all[2];
                                                        } elseif (count($foto_all) == 2) {
                                                            $foto_1 = $foto_all[0];
                                                            $foto_2 = $foto_all[1];
                                                            $foto_3 = 'Foto 3';
                                                        } elseif (count($foto_all) == 1) {
                                                            $foto_1 = $foto_all[0];
                                                            $foto_2 = 'Foto 2';
                                                            $foto_3 = 'Foto 3';
                                                        } else {
                                                            $foto_1 = 'Foto 1';
                                                            $foto_2 = 'Foto 2';
                                                            $foto_3 = 'Foto 3';
                                                        } ?>
                                                        <input type="hidden" name="foto_berita1_lama" value="<?= $foto_1 ?>">
                                                        <label style="width:100%;" class="choose-btn-opsional fa-w-1 ripple mt-1 text-center" id="chooseBtn2" for="foto_berita1"><?= $foto_1 ?></label>
                                                        <input type="file" class="form-control d-none" id="foto_berita1" name="foto_berita1" accept=".jpg, .jpeg, .png" />

                                                    </div>
                                                    <div class="col-4">
                                                        <input type="hidden" name="foto_berita2_lama" value="<?= $foto_2 ?>">
                                                        <label style="width:100%;" class="choose-btn-opsional fa-w-1 ripple mt-1 text-center" id="chooseBtn3" for="foto_berita2"><?= $foto_2 ?></label>
                                                        <input type="file" class="form-control d-none " id="foto_berita2" name="foto_berita2" accept=".jpg, .jpeg, .png" />

                                                    </div>
                                                    <div class="col-4">
                                                        <input type="hidden" name="foto_berita3_lama" value="<?= $foto_3 ?>">
                                                        <label style="width:100%;" class="choose-btn-opsional fa-w-1 ripple mt-1 text-center" id="chooseBtn4" for="foto_berita3"><?= $foto_3 ?></label>
                                                        <input type="file" class="form-control d-none" id="foto_berita3" name="foto_berita3" accept=".jpg, .jpeg, .png" />

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
                                                <input type="text" class="form-control" id="nama_penulis" name="nama_penulis" value="<?= $berita['penulis']; ?>" />

                                            </div>
                                            <div class="form-group">
                                                <label class="text-gray-dark" style="font-size: 14px;">Satuan Kerja</label>
                                                <select class="form-control filter mr-2" name="satker" style="border-radius: 5px;">
                                                    <option selected value="<?= $berita['satker_kd']; ?>" selected>[<?= $berita['satker_kd']; ?>] <?php foreach ($list_satker as $satker) {
                                                                                                                                                        if ($satker['kd_satker'] == $berita['satker_kd']) {
                                                                                                                                                            echo $satker['satker'];
                                                                                                                                                        }
                                                                                                                                                    } ?></option>
                                                    <?php if ($list_satker != null) : ?>
                                                        <?php foreach ($list_satker as $satker) : ?>
                                                            <?php if ($satker['kd_satker'] != $berita['satker_kd']) : ?>
                                                                <option <?= $satker == (old('satker')) ? 'selected' : ''; ?> value="<?= $satker['kd_satker']; ?>">[<?= $satker['kd_satker']; ?>] <?= $satker['satker']; ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <div class="float-right">
                                                <!-- <button class="mr-4 cancel-btn ripple" id="btn-reset" type="reset">Reset</button> -->
                                                <button type="submit" id="btn-submit" class="tombol-tambah float-right ripple shadow">Update</button>
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

    <?php endif; ?>
    <?= $this->endSection(); ?>
<?php endif; ?>