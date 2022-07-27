<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
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
                        <li class="breadcrumb-item"><a href="<?= base_url('/reviewBerita') ?>">Review Berita</a></li>
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
                                <div class="col-12 col-sm-4">
                                    <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                                    <div class="col-12 overflow-hidden" style="max-height: 400px;">
                                        <img src="<?= base_url('/images/beritadefault.jpg') ?>" class="product-image" alt="Product Image">
                                    </div>
                                    <div class="col-12 product-image-thumbs">
                                        <div class="d-flex flex-column">
                                            <div class="product-image-thumb active" style="height: 90px; cursor: pointer; overflow:hidden;"><img src="<?= base_url('/images/1.jpg') ?>" alt="Product Image">
                                            </div>
                                            <a href="">Download</a>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <div class="product-image-thumb" style="height: 90px; cursor: pointer; overflow:hidden;"><img src="<?= base_url('/images/beritadefault.jpg') ?>" alt="Product Image">
                                            </div>
                                            <a href="">Download</a>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <div class="product-image-thumb" style="height: 90px; cursor: pointer; overflow:hidden;"><img src="<?= base_url('/images/bpsbg.png') ?>" alt="Product Image">
                                            </div>
                                            <a href="">Download</a>
                                        </div>


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
                                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab nam maxime assumenda!
                                                </strong>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <span class="published">Published</span>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <strong class="">Penulis</strong>
                                            <p class="text-muted">Budiawan</p>
                                            <strong>Satuan Kerja</strong>
                                            <p class="text-muted">[1500] BPS Provinsi Jambi</p>
                                            <strong>Editor</strong>
                                            <p class="text-muted">Budi</p>
                                            <strong>Tanggal Publikasi</strong>
                                            <p class="text-muted">Senin, 25 Juli 2022</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <a href="#" class="float-right mr-4 mb-3">Kunjungi</a>
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