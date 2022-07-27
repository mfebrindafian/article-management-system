<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Final Review </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('/entryBerita') ?>">Entry Berita</a></li>
                        <li class="breadcrumb-item active">Final Review</li>
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
                    <div class="card py-5">
                        <div class="row">
                            <?php if ($berita != null) : ?>
                                <form action="<?= base_url('/uploadHasiReview'); ?>" method="post" enctype="multipart/form-data" class="col-md-12 px-5">
                                    <div class="mt-2 d-flex flex-column">
                                        <textarea name="judul_berita" rows="1"><?= $berita['judul_berita']; ?></textarea>

                                        <small><?= $berita['penulis']; ?>| [<?= $berita['satker_kd']; ?>] <?php foreach ($list_satker as $satker) {
                                                                                                                if ($satker['kd_satker'] == $berita['satker_kd']) {
                                                                                                                    echo $satker['satker'];
                                                                                                                }
                                                                                                            } ?></small>
                                        <div class="mt-2">
                                            <span class="reviewing">Reviewing</span>
                                        </div>
                                        <!-- <a href="" class="my-3"><small>Download File Berita</small></a> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-5">
                                            <hr>
                                        </div>
                                        <div class="col-2 text-center text-gray opsional">
                                            <small>
                                                <em>Hasil Review</em>
                                            </small>
                                        </div>
                                        <div class="col-5">
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <div class="col-sm-12 text-center px-5">
                                            <div class="row mb-2 ">
                                                <div class="col-12 text-center">
                                                    <strong>Pilih Foto</strong>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 mb-3 px-5">
                                                    <label for="foto1" id="toggle-pilih" class="pilih-gambar w-100">
                                                        <i class="fas fa-check position-absolute d-none"></i>
                                                        <img class="mb-4 " src="<?= base_url('/images/beritadefault.jpg') ?>" alt="">
                                                        <input class="d-none" type="checkbox" name="foto1" id="foto1">
                                                    </label>
                                                </div>
                                                <div class="col-md-4 mb-3 px-5">
                                                    <label for="foto2" id="toggle-pilih" class="pilih-gambar w-100">
                                                        <i class="fas fa-check position-absolute d-none"></i>
                                                        <img class="mb-4 " src="<?= base_url('/images/beritadefault.jpg') ?>" alt="">
                                                        <input class="d-none" type="checkbox" name="foto2" id="foto2">
                                                    </label>
                                                </div>
                                                <div class="col-md-4 mb-3 px-5">
                                                    <label for="foto3" id="toggle-pilih" class="pilih-gambar w-100">
                                                        <i class="fas fa-check position-absolute d-none"></i>
                                                        <img class="mb-4" src="<?= base_url('/images/beritadefault.jpg') ?>" alt="">
                                                        <input class="d-none" type="checkbox" name="foto3" id="foto3">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-12 text-center">
                                                    <a href="#showPreview" id="show-gallery">Lihat Preview</a>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_berita_review" value="<?= $berita['id']; ?>">

                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <label style="width: 100%;" class="choose-btn ripple mt-1 text-center" id="chooseBtn" for="file_berita">Upload Hasil Review</label>
                                                <input type="file" class="form-control d-none" id="file_berita" name="file_berita" accept=".doc, .docx" required />
                                            </div>

                                            <div class="col-md-4"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <button type="submit" id="btn-submit" class="tombol-tambah ripple shadow">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

<div id="galley" class="d-none">
    <ul class="pictures">
        <li>
            <img data-original="<?= base_url('/images/beritadefault.jpg') ?>" src="<?= base_url('/images/beritadefault.jpg') ?>">
        </li>
        <li>
            <img data-original="http://res.cloudinary.com/hurricane10/image/upload/v1499778109/img-20_ljchnk.jpg" src="http://res.cloudinary.com/hurricane10/image/upload/v1499778109/img-20_ljchnk.jpg">
        </li>
    </ul>
</div>

<script src="<?= base_url('/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<!-- GALERY IMAGE -->
<script src="<?= base_url('/js/viewer.min.js') ?>"></script>
<script>
    var viewer = new Viewer(document.getElementById('galley'), {
        url: 'data-original',
        toolbar: {
            oneToOne: true,

            prev: function() {
                viewer.prev(true);
            },

            play: true,

            next: function() {
                viewer.next(true);
            },

            download: function() {
                const a = document.createElement('a');

                a.href = viewer.image.src;
                a.download = viewer.image.alt;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
            },
        },
    });

    $(document).on('click', '#show-gallery', function() {
        viewer.show()
    })
</script>

<script>
    var chooseBtn = document.getElementById('chooseBtn');
    var hiddenBtn = document.getElementById('file_berita');

    hiddenBtn.addEventListener('change', function() {
        if (hiddenBtn.files.length > 0) {
            chooseBtn.innerText = hiddenBtn.files[0].name;
        } else {
            chooseBtn.innerText = 'Choose';
        }
    });



    $(document).on('change', '#file_berita', function() {
        Swal.fire({
            title: "File Terpilih!",
            text: "Pastikan anda mengupload file yang benar!",
            icon: "warning",
            showConfirmButton: true,
        });
    });
</script>

<script>
    $(document).on('change', 'input[type="checkbox"]', function() {
        if ($(this).prop('checked')) {
            $(this).parent().addClass('terpilih')
            $(this).prev().prev().removeClass('d-none')
        } else {
            $(this).parent().removeClass('terpilih')
            $(this).prev().prev().addClass('d-none')
        }
    })

    $('textarea').each(function() {
        this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
    }).on('input', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });
</script>


<?= $this->endSection(); ?>