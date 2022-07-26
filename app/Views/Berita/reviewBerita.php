<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Review berita <small class="text-gray">/ tabel daftar berita</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Review Berita</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content pb-5">
        <div class="container">
            <div class="row mt-4">
                <div class="col-12">
                    <button id="btnSemua" class="btn btn-link btn-sm btn-rounded ripple berita-active shadow mr-2">
                        Semua
                    </button>
                    <button id="btnReady" class="btn btn-link btn-sm btn-rounded ripple filter-berita mr-2">
                        Uploaded
                    </button>
                    <button id="btnReviewing" class="btn btn-link btn-sm btn-rounded ripple filter-berita mr-2">
                        Reviewing
                    </button>
                    <button id="btnPublished" class="btn btn-link btn-sm btn-rounded ripple filter-berita mr-2">
                        Published
                    </button>
                </div>
            </div>
            <div id="rowSemua" class="row mt-4">
                <?php if ($berita_semua != null) : ?>
                    <?php foreach ($berita_semua as $berita) : ?>
                        <div class="col-lg-6 mb-4">
                            <div class="bg-white rounded shadow p-3">
                                <div class="row">
                                    <div data-foto1="<?= base_url('/images/beritadefault.jpg') ?>" class="col-4 border-0 bg-transparent">
                                        <div class="gambar-container shadow pistures">
                                            <img data-original="<?= base_url('/images/beritadefault.jpg') ?>" src="<?= base_url('/images/beritadefault.jpg') ?>">
                                        </div>
                                    </div>
                                    <div class="col-8 d-flex flex-column justify-content-between">
                                        <div class="mt-2 d-flex flex-column">
                                            <h5><strong class="judul-berita"><?= $berita['judul_berita']; ?></strong></h5>
                                            <small><?= $berita['penulis']; ?> | [<?= $berita['satker_kd']; ?>] <?php foreach ($list_satker as $satker) {
                                                                                                                    if ($satker['kd_satker'] == $berita['satker_kd']) {
                                                                                                                        echo $satker['satker'];
                                                                                                                    }
                                                                                                                } ?></small>
                                            <div class="mt-2">
                                                <?php if ($berita['status_kd'] == "1") {
                                                    echo '<span class="uploaded">Ready to review</span>';
                                                } elseif ($berita['status_kd'] == "2") {
                                                    echo '<span class="reviewing">Reviewing</span>';
                                                } else {
                                                    echo '<span class="published">Published</span>';
                                                } ?>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <?php if ($berita['status_kd'] != "1") : ?>
                                                <div class="col-sm-4 d-flex align-items-center">
                                                    <small class="text-gray judul-berita">Direview oleh <strong><?= $berita['editor'] ?></strong></small>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($berita['status_kd'] == "1") : ?>
                                                <div class="col-sm-4"></div>
                                            <?php endif; ?>
                                            <?php if ($berita['status_kd'] == "1") : ?>
                                                <div class="col-sm-8 pt-2 d-flex justify-content-end">
                                                    <button id="btn-review" class="tombol-tambah float-right ripple" data-toggle="modal" data-target="#modal-review" data-judul_berita="<?= $berita['judul_berita'] ?>" data-id_berita="<?= $berita['id'] ?>">Review</button>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($berita['status_kd'] == "2") : ?>
                                                <div class="col-sm-8 pt-2 d-flex justify-content-end">
                                                    <a href="<?= base_url('/downloadBerita/' . $berita['id']); ?>" class="edit float-right ripple mr-3">Download</a>
                                                    <a href="<?= base_url('/finalReview/' . $berita['id']); ?>" class="tombol-tambah float-right ripple">Publish</a>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($berita['status_kd'] == "3" && $berita['link_publish'] != '') : ?>
                                                <div class="col-sm-8 pt-2 d-flex justify-content-end">
                                                    <a href="<?= $berita['link_publish'] ?>" target="_blank" class="edit float-right ripple mr-3">Visit</a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($berita['status_kd'] == "3" && $berita['link_publish'] == '') : ?>
                                    <hr class="mt-4">
                                    <form action="<?= base_url('/sendLinkBerita'); ?>" method="post" class="row ">
                                        <div class="col-12 pb-0 mb-0">
                                            <div class="row">
                                                <div class="col-12 ">
                                                    <div class="form-group mb-0">
                                                        <div class="row">
                                                            <input type="hidden" name="id_berita_link" value="<?= $berita['id']; ?>">
                                                            <div class="col-9"><input type="link" class="form-control" id="link" name="link_berita" placeholder="Masukkan link berita" required /></div>
                                                            <div class="col-3"> <button type="submit" class="tombol-tambah float-right ripple h-100">Simpan</button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div id="rowReady" class="row mt-4 d-none">
                <?php if ($berita_upload != null) : ?>
                    <?php foreach ($berita_upload as $berita) : ?>
                        <div class="col-lg-6 mb-4">
                            <div class="bg-white rounded shadow p-3">
                                <div class="row">
                                    <div data-foto1="<?= base_url('/images/beritadefault.jpg') ?>" class="col-4 border-0 bg-transparent">
                                        <div class="gambar-container shadow pistures">
                                            <img data-original="<?= base_url('/images/beritadefault.jpg') ?>" src="<?= base_url('/images/beritadefault.jpg') ?>">
                                        </div>
                                    </div>
                                    <div class="col-8 d-flex flex-column justify-content-between">
                                        <div class="mt-2 d-flex flex-column">
                                            <h5><strong class="judul-berita"><?= $berita['judul_berita']; ?></strong></h5>
                                            <small><?= $berita['penulis']; ?> | [<?= $berita['satker_kd']; ?>] <?php foreach ($list_satker as $satker) {
                                                                                                                    if ($satker['kd_satker'] == $berita['satker_kd']) {
                                                                                                                        echo $satker['satker'];
                                                                                                                    }
                                                                                                                } ?></small>
                                            <div class="mt-2">
                                                <span class="uploaded">Ready to review</span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-8 pt-2 d-flex justify-content-end">
                                                <button id="btn-review" class="tombol-tambah float-right ripple" data-toggle="modal" data-target="#modal-review" data-judul_berita="<?= $berita['judul_berita'] ?>" data-id_berita="<?= $berita['id'] ?>">Review</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div id="rowReviewing" class="row mt-4 d-none">
                <?php if ($berita_review != null) : ?>
                    <?php foreach ($berita_review as $berita) : ?>
                        <div class="col-lg-6 mb-4">
                            <div class="bg-white rounded shadow p-3">
                                <div class="row">
                                    <div data-foto1="<?= base_url('/images/beritadefault.jpg') ?>" class="col-4 border-0 bg-transparent">
                                        <div class="gambar-container shadow pistures">
                                            <img data-original="<?= base_url('/images/beritadefault.jpg') ?>" src="<?= base_url('/images/beritadefault.jpg') ?>">
                                        </div>
                                    </div>
                                    <div class="col-8 d-flex flex-column justify-content-between">
                                        <div class="mt-2 d-flex flex-column">
                                            <h5><strong class="judul-berita"><?= $berita['judul_berita']; ?></strong></h5>
                                            <small><?= $berita['penulis']; ?> | [<?= $berita['satker_kd']; ?>] <?php foreach ($list_satker as $satker) {
                                                                                                                    if ($satker['kd_satker'] == $berita['satker_kd']) {
                                                                                                                        echo $satker['satker'];
                                                                                                                    }
                                                                                                                } ?></small>
                                            <div class="mt-2"><span class="reviewing">Reviewing</span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4 d-flex align-items-center">
                                                <small class="text-gray judul-berita">Direview oleh <strong><?= $berita['editor'] ?></strong></small>
                                            </div>
                                            <div class="col-sm-8 pt-2 d-flex justify-content-end">
                                                <a href="<?= base_url('/downloadBerita/' . $berita['id']); ?>" class="edit float-right ripple mr-3">Download</a>
                                                <a href="<?= base_url('/finalReview/' . $berita['id']); ?>" class="tombol-tambah float-right ripple">Publish</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div id="rowPublished" class="row mt-4 d-none">
                <?php if ($berita_publish != null) : ?>
                    <?php foreach ($berita_publish as $berita) : ?>
                        <div class="col-lg-6 mb-4">
                            <div class="bg-white rounded shadow p-3">
                                <div class="row">
                                    <div data-foto1="<?= base_url('/images/beritadefault.jpg') ?>" class="col-4 border-0 bg-transparent">
                                        <div class="gambar-container shadow pistures">
                                            <img data-original="<?= base_url('/images/beritadefault.jpg') ?>" src="<?= base_url('/images/beritadefault.jpg') ?>">
                                        </div>
                                    </div>
                                    <div class="col-8 d-flex flex-column justify-content-between">
                                        <div class="mt-2 d-flex flex-column">
                                            <h5><strong class="judul-berita"><?= $berita['judul_berita']; ?></strong></h5>
                                            <small><?= $berita['penulis']; ?> | [<?= $berita['satker_kd']; ?>] <?php foreach ($list_satker as $satker) {
                                                                                                                    if ($satker['kd_satker'] == $berita['satker_kd']) {
                                                                                                                        echo $satker['satker'];
                                                                                                                    }
                                                                                                                } ?></small>
                                            <div class="mt-2">
                                                <?php if ($berita['status_kd'] == "1") {
                                                    echo '<span class="uploaded">Ready to review</span>';
                                                } elseif ($berita['status_kd'] == "2") {
                                                    echo '<span class="reviewing">Reviewing</span>';
                                                } else {
                                                    echo '<span class="published">Published</span>';
                                                } ?>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <?php if ($berita['status_kd'] != "1") : ?>
                                                <div class="col-sm-4 d-flex align-items-center">
                                                    <small class="text-gray judul-berita">Direview oleh <strong><?= $berita['editor'] ?></strong></small>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($berita['status_kd'] == "1") : ?>
                                                <div class="col-sm-4"></div>
                                            <?php endif; ?>
                                            <?php if ($berita['status_kd'] == "1") : ?>
                                                <div class="col-sm-8 pt-2 d-flex justify-content-end">
                                                    <button id="btn-review" class="tombol-tambah float-right ripple" data-toggle="modal" data-target="#modal-review" data-judul_berita="<?= $berita['judul_berita'] ?>" data-id_berita="<?= $berita['id'] ?>">Review</button>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($berita['status_kd'] == "2") : ?>
                                                <div class="col-sm-8 pt-2 d-flex justify-content-end">
                                                    <a href="<?= base_url('/downloadBerita/' . $berita['id']); ?>" class="edit float-right ripple mr-3">Download</a>
                                                    <a href="<?= base_url('/finalReview/' . $berita['id']); ?>" class="tombol-tambah float-right ripple">Publish</a>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($berita['status_kd'] == "3" && $berita['link_publish'] != '') : ?>
                                                <div class="col-sm-8 pt-2 d-flex justify-content-end">
                                                    <a href="<?= $berita['link_publish'] ?>" target="_blank" class="edit float-right ripple mr-3">Visit</a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($berita['status_kd'] == "3" && $berita['link_publish'] == '') : ?>
                                    <hr class="mt-4">
                                    <form action="<?= base_url('/sendLinkBerita'); ?>" method="post" class="row ">
                                        <div class="col-12 pb-0 mb-0">
                                            <div class="row">
                                                <div class="col-12 ">
                                                    <div class="form-group mb-0">
                                                        <div class="row">
                                                            <input type="hidden" name="id_berita_link" value="<?= $berita['id']; ?>">
                                                            <div class="col-9"><input type="link" class="form-control" id="link" name="link_berita" placeholder="Masukkan link berita" required /></div>
                                                            <div class="col-3"> <button type="submit" class="tombol-tambah float-right ripple h-100">Simpan</button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>



<!-- MODAL reviewberita -->
<div class="modal fade" id="modal-review" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="top: 13%;">
        <form action="<?= base_url('/ubahStatusReview'); ?>" method="post" class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel">Review Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_berita" id="id_berita">
                Yakin Ingin Mereview Berita Ini?
                <p id="judul_berita"></p>
            </div>
            <div class="modal-footer border-0">
                <button type="submit" class="tombol-tambah float-right ripple h-100" data-dismiss="modal" style="background-color: gray;">Batal</button>
                <button type="submit" class="tombol-tambah float-right ripple h-100">Oke</button>
            </div>
        </form>
    </div>
</div>


<script>
    $(document).on('click', '#btn-review', function() {
        $('#id_berita').val($(this).data('id_berita'));
        $('#judul_berita').text($(this).data('judul_berita'));
    })
</script>

<script>
    $(document).on('click', '#btnSemua', function() {
        $(this).addClass('berita-active shadow').removeClass('filter-berita')
        $('#btnReady').removeClass('berita-active shadow').addClass('filter-berita')
        $('#btnReviewing').removeClass('berita-active shadow').addClass('filter-berita')
        $('#btnPublished').removeClass('berita-active shadow').addClass('filter-berita')
        $('#rowSemua').removeClass('d-none')
        $('#rowReady').addClass('d-none')
        $('#rowReviewing').addClass('d-none')
        $('#rowPublshed').addClass('d-none')
    })
    $(document).on('click', '#btnReady', function() {
        $(this).addClass('berita-active shadow').removeClass('filter-berita')
        $('#btnSemua').removeClass('berita-active shadow').addClass('filter-berita')
        $('#btnReviewing').removeClass('berita-active shadow').addClass('filter-berita')
        $('#btnPublished').removeClass('berita-active shadow').addClass('filter-berita')
        $('#rowSemua').addClass('d-none')
        $('#rowReady').removeClass('d-none')
        $('#rowReviewing').addClass('d-none')
        $('#rowPublished').addClass('d-none')
    })
    $(document).on('click', '#btnReviewing', function() {
        $(this).addClass('berita-active shadow').removeClass('filter-berita')
        $('#btnReady').removeClass('berita-active shadow').addClass('filter-berita')
        $('#btnSemua').removeClass('berita-active shadow').addClass('filter-berita')
        $('#btnPublished').removeClass('berita-active shadow').addClass('filter-berita')
        $('#rowSemua').addClass('d-none')
        $('#rowReady').addClass('d-none')
        $('#rowReviewing').removeClass('d-none')
        $('#rowPublished').addClass('d-none')
    })
    $(document).on('click', '#btnPublished', function() {
        $(this).addClass('berita-active shadow').removeClass('filter-berita')
        $('#btnReady').removeClass('berita-active shadow').addClass('filter-berita')
        $('#btnReviewing').removeClass('berita-active shadow').addClass('filter-berita')
        $('#btnSemua').removeClass('berita-active shadow').addClass('filter-berita')
        $('#rowSemua').addClass('d-none')
        $('#rowReady').addClass('d-none')
        $('#rowReviewing').addClass('d-none')
        $('#rowPublished').removeClass('d-none')
    })
</script>



<?= $this->endSection(); ?>