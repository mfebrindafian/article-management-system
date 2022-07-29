<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper d-none">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Detail berita </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Detail Berita</li>
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
                        <div class="card-body">
                            <div class="row">
                                <?php $image_upload = $berita['image_upload']; ?>
                                <?php $data = json_decode($image_upload); ?>
                                <?php if ($data != null) {
                                    $foto_all = $data->image;
                                    $foto_awal = $data->image;
                                } else {
                                    $foto_all[0] = null;
                                    $foto_all[1] = null;
                                    $foto_all[2] = null;
                                    $foto_awal[0] = 'default.jpg';
                                } ?>
                                <?php if (count($foto_all) == 3) {
                                    $foto_1 = $foto_all[0];
                                    $foto_2 = $foto_all[1];
                                    $foto_3 = $foto_all[2];
                                } elseif (count($foto_all) == 2) {
                                    $foto_1 = $foto_all[0];
                                    $foto_2 = $foto_all[1];
                                    $foto_3 = null;
                                } elseif (count($foto_all) == 1) {
                                    $foto_1 = $foto_all[0];
                                    $foto_2 = null;
                                    $foto_3 = null;
                                } else {
                                    $foto_1 = null;
                                    $foto_2 = null;
                                    $foto_3 = null;
                                } ?>
                                <div class="col-12 col-sm-4">

                                    <div class="col-12 overflow-hidden" style="max-height: 400px;">
                                        <img src="<?= base_url('/berkas/foto/' . $foto_awal[0]) ?>" class="product-image" alt="Product Image">
                                    </div>
                                    <div class="col-12 product-image-thumbs d-flex justify-content-between">
                                        <?php if ($foto_1 != null) : ?>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="product-image-thumb active" style="height: 90px; cursor: pointer; overflow:hidden;"><img src="<?= base_url('/berkas/foto/' . $foto_1) ?>" alt="Product Image">
                                                </div>
                                                <a href="<?= base_url('/downloadFoto/' . $foto_1); ?>">Download</a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($foto_2 != null) : ?>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="product-image-thumb" style="height: 90px; cursor: pointer; overflow:hidden;"><img src="<?= base_url('/berkas/foto/' . $foto_2) ?>" alt="Product Image">
                                                </div>
                                                <a href="<?= base_url('/downloadFoto/' . $foto_2); ?>">Download</a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($foto_3 != null) : ?>
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="product-image-thumb" style="height: 90px; cursor: pointer; overflow:hidden;"><img src="<?= base_url('/berkas/foto/' . $foto_3) ?>" alt="Product Image">
                                                </div>
                                                <a class="" href="<?= base_url('/downloadFoto/' . $foto_3); ?>">Download</a>
                                            </div>
                                        <?php endif; ?>


                                    </div>
                                </div>
                                <!-- <div class="col-md-4 text-center">
                                    <img src="<?= base_url('/images/beritadefault.jpg') ?>" alt="">
                                </div> -->
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="">
                                                <strong class="judul-berita">
                                                    <?= $berita['judul_berita']; ?>!
                                                </strong>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-4">
                                            <?php if ($berita['status_kd'] == "3" && $berita['link_publish'] == '') {
                                                echo '<span class="ready-publish">Ready to publish</span>';
                                            } else {
                                                echo '<span class="published">Published</span>';
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <strong class="">Penulis</strong>
                                            <p class="text-muted"><?= $berita['penulis']; ?></p>
                                            <!-- <strong>Satuan Kerja</strong>
                                            <p class="text-muted">[1500] BPS Provinsi Jambi</p>
                                            <strong>Editor</strong>
                                            <p class="text-muted">Budi</p> -->
                                            <strong>Tanggal Publikasi</strong>
                                            <p class="text-muted"><?= $berita['tgl_publish']; ?></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <?php if ($berita['link_publish'] != '') : ?>
                                                <a target="_blank" href="<?= $berita['link_publish']; ?>" class="float-right mr-4 mb-3">Kunjungi</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<script>
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
</script>

<?= $this->endSection(); ?>