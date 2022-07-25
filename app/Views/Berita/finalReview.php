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
                            <div class="col-md-5 text-center">
                                <img class="mb-4" src="<?= base_url('/images/beritadefault.jpg') ?>" alt="">
                            </div>
                            <div class="col-md-7 px-5">
                                <div class="mt-2 d-flex flex-column">
                                    <h4><strong class="judul-berita">Nilai Tukar Petani (NTP) Provinsi Jambi Juni 2022 sebesar 127,31</strong></h4>
                                    <small>John Doe | [1500] BPS Provinsi Jambi</small>
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
                                <form method="" action="" class="form-group mt-2">
                                    <div class="row">
                                        <!-- <div class="col-md-4"></div> -->
                                        <div class="col-md-12">
                                            <label style="width: 100%;" class="choose-btn ripple mt-1 text-center" id="chooseBtn" for="file_berita">Upload Hasil Review</label>
                                            <input type="file" class="form-control d-none" id="file_berita" name="file_berita" accept=".doc, .docx" required />
                                        </div>

                                        <!-- <div class="col-md-4"></div> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-2">
                                            <button type="submit" id="btn-submit" class="tombol-tambah float-right ripple shadow">Simpan</button>
                                        </div>
                                        <div class="col-md-5"></div>
                                    </div>
                                </form>
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

<div class="modal fade" id="modal-review" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="top: 13%;">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel">Review Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" id="id_berita">
                Yakin Ingin Mereview Berita Ini?
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary" data-dismiss="modal">Oke</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>


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


<?= $this->endSection(); ?>