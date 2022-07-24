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
                    <button class="btn btn-link btn-sm btn-rounded ripple berita-active shadow mr-2">
                        Semua
                    </button>
                    <button class="btn btn-link btn-sm btn-rounded ripple filter-berita mr-2">
                        Ready
                    </button>
                    <button class="btn btn-link btn-sm btn-rounded ripple filter-berita mr-2">
                        Reviewing
                    </button>
                    <button class="btn btn-link btn-sm btn-rounded ripple filter-berita mr-2">
                        Published
                    </button>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6 mb-4">
                    <div class="bg-white rounded shadow p-3">
                        <div class="row">
                            <div class="col-4">
                                <div class=" gambar-container shadow">
                                    <img class="" src="<?= base_url('/images/beritadefault.jpg') ?>" alt="">
                                </div>
                            </div>
                            <div class="col-8 d-flex flex-column justify-content-between">
                                <div class="mt-2 d-flex flex-column">
                                    <h5><strong class="judul-berita">Nilai Tukar Petani (NTP) Provinsi Jambi Juni 2022 sebesar 127,31</strong></h5>
                                    <small>John Doe | [1500] BPS Provinsi Jambi</small>
                                    <div class="mt-2">
                                        <span class="uploaded">Ready to review</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-8 d-flex justify-content-end">
                                        <button id="btn-review" class="tombol-tambah float-right ripple" data-toggle="modal" data-target="#modal-review" data-id_berita="<?= 1 ?>">Review</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="bg-white rounded shadow p-3">
                        <div class="row">
                            <div class="col-4">
                                <div class=" gambar-container shadow">
                                    <img class="" src="<?= base_url('/images/beritadefault.jpg') ?>" alt="">
                                </div>
                            </div>
                            <div class="col-8 d-flex flex-column justify-content-between">
                                <div class="mt-2 d-flex flex-column">
                                    <h5><strong class="judul-berita">Nilai Tukar Petani (NTP) Provinsi Jambi Juni 2022 sebesar 127,31</strong></h5>
                                    <small>John Doe | [1500] BPS Provinsi Jambi</small>
                                    <div class="mt-2">
                                        <span class="reviewing">Reviewing</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4 d-flex align-items-center">
                                        <small class="text-gray judul-berita">Direview oleh <strong>Budi</strong></small>
                                    </div>
                                    <div class="col-8 d-flex justify-content-end">
                                        <a href="#" class="edit float-right ripple mr-3">Download</a>
                                        <button class="tombol-tambah float-right ripple">Publish</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="bg-white rounded shadow p-3">
                        <div class="row">
                            <div class="col-4">
                                <div class=" gambar-container shadow">
                                    <img class="" src="<?= base_url('/images/beritadefault.jpg') ?>" alt="">
                                </div>
                            </div>
                            <div class="col-8 d-flex flex-column justify-content-between">
                                <div class="mt-2 d-flex flex-column">
                                    <h5><strong class="judul-berita">Nilai Tukar Petani (NTP) Provinsi Jambi Juni 2022 sebesar 127,31</strong></h5>
                                    <small>John Doe | [1500] BPS Provinsi Jambi</small>
                                    <div class="mt-2">
                                        <span class="published">Published</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4 d-flex align-items-center">
                                        <small class="text-gray judul-berita">Direview oleh <strong>Budi</strong></small>
                                    </div>
                                    <div class="col-8 d-flex justify-content-end">
                                        <a href="#" class="edit float-right ripple mr-3">visit</a>
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


<!-- MODAL revieberita -->
<div class="modal fade" id="modal-review" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="top: 13%;">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Review Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" id="id_berita">
                Yakin Ingin Mereview Berita Ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary">Oke</button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).on('click', '#btn-review', function() {
        $('#id_berita').val($(this).data('id_berita'));
    })
</script>


<?= $this->endSection(); ?>