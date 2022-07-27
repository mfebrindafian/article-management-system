<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar berita <small class="text-gray">/berita siap dipublikasi</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Publish Berita</li>
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
                <div class="col-lg-3">
                    <form action="" method="POST" class=" input-group input-group-md float-right">
                        <input type="search" name="table_search" class="form-control" style="padding: 6px 20px 6px 20px;" placeholder="Search" />
                    </form>
                </div>
                <div class="col-lg-6"></div>
                <div class="col-lg-3 mb-3"></div>

            </div>

            <div id="rowPublished" class="row mt-4">
                <div class="col-lg-6 mb-4">
                    <div class="bg-white rounded shadow p-3">
                        <div class="row">
                            <div class="col-4 border-0 bg-transparent">
                                <div class="gambar-container shadow pistures">
                                    <img src="<?= base_url('/images/beritadefault.jpg') ?>">
                                </div>
                            </div>
                            <div class="col-8 d-flex flex-column justify-content-between">
                                <div class="mt-2 d-flex flex-column">
                                    <h5><strong class="judul-berita">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex eius nesciunt aliquam quae nihil magnam.</strong></h5>
                                    <small>Rudi | Provinsi Jambi</small>
                                    <div class="mt-2">
                                        <span class="ready-publish">Ready to publish</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4 d-flex align-items-center">
                                        <small class="text-gray judul-berita">Direview oleh <strong>Budi</strong></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4">
                        <form action="<?= base_url('/sendLinkBerita'); ?>" method="post" class="row ">
                            <div class="col-12 pb-0 mb-0">
                                <div class="row">
                                    <div class="col-12 ">
                                        <div class="form-group mb-0">
                                            <div class="row">
                                                <input type="hidden" name="id_berita_link" value="">
                                                <div class="col-9"><input type="link" class="form-control" id="link" name="link_berita" placeholder="Masukkan link berita" required /></div>
                                                <div class="col-3"> <button type="submit" class="tombol-tambah float-right ripple h-100">Simpan</button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>