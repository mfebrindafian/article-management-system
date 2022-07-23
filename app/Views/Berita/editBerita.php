<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
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
                        <form action="<?= base_url(''); ?>" method="post" class="card-body px-5" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-5 d-flex flex-column">
                                    <span><strong style="font-size: 20px;">Tentang Berita</strong></span>
                                    <span class="text-gray mb-4" style="font-size: 14px;">Keterangan tentang berita baru</span>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="text-gray-dark" style="font-size: 14px;" for="judul">Judul Berita</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" placeholder="Ketikkan judul berita" value="<?= old('judul'); ?>" />
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('judul'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-gray-dark" style="font-size: 14px;">File Berita</label><br>
                                        <div class="row">
                                            <div class="col-4">
                                                <label style="width: 100%;" class="choose-btn fa-w-1 ripple mt-1 text-center" id="chooseBtn" for="file_berita">Pilih word file</label>
                                                <input type="file" class="form-control d-none <?= ($validation->hasError('file_berita')) ? 'is-invalid' : ''; ?>" id="file_berita" name="file_berita" accept=".doc, .docx" value="<?= old('file_berita'); ?>" required />
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('file_berita'); ?>
                                                </div>
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
                                                <input type="file" class="form-control d-none <?= ($validation->hasError('foto_berita1')) ? 'is-invalid' : ''; ?>" id="foto_berita1" name="foto_berita1" accept=".jpg, .jpeg, .png" />
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('foto_berita1'); ?>
                                                </div>
                                            </div>


                                            <div class="col-4">
                                                <label style="width:100%;" class="choose-btn-opsional fa-w-1 ripple mt-1 text-center" id="chooseBtn3" for="foto_berita2">Foto 2</label>
                                                <input type="file" class="form-control d-none <?= ($validation->hasError('foto_berita2')) ? 'is-invalid' : ''; ?>" id="foto_berita2" name="foto_berita2" accept=".jpg, .jpeg, .png" />
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('foto_berita2'); ?>
                                                </div>
                                            </div>


                                            <div class="col-4">
                                                <label style="width:100%;" class="choose-btn-opsional fa-w-1 ripple mt-1 text-center" id="chooseBtn4" for="foto_berita3">Foto 3</label>
                                                <input type="file" class="form-control d-none <?= ($validation->hasError('foto_berita3')) ? 'is-invalid' : ''; ?>" id="foto_berita3" name="foto_berita3" accept=".jpg, .jpeg, .png" />
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('foto_berita3'); ?>
                                                </div>
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
                                        <input type="text" class="form-control <?= ($validation->hasError('nama_penulis')) ? 'is-invalid' : ''; ?>" id="nama_penulis" name="nama_penulis" placeholder="Ketikkan nama penulis" value="<?= old('nama_penulis'); ?>" />
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_penulis'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-gray-dark" style="font-size: 14px;">Satuan Kerja</label>
                                        <select class="form-control filter mr-2 <?= ($validation->hasError('satker')) ? 'is-invalid' : ''; ?>" name="satker" style="border-radius: 5px;">
                                            <option selected value="" <?= old('satker') ? '' : 'selected'; ?>>- Pilih Satuan Kerja -</option>
                                            <?php if ($list_satker != null) : ?>
                                                <?php foreach ($list_satker as $satker) : ?>
                                                    <option <?= $satker == (old('satker')) ? 'selected' : ''; ?> value="<?= $satker['kd_satker']; ?>">[<?= $satker['kd_satker']; ?>] <?= $satker['satker']; ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('satker'); ?>
                                        </div>
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

<script>
    var hiddenBtn = document.getElementById('file_berita');
    var hiddenBtn1 = document.getElementById('foto_berita1');
    var hiddenBtn2 = document.getElementById('foto_berita2');
    var hiddenBtn3 = document.getElementById('foto_berita3');
    var chooseBtn = document.getElementById('chooseBtn');
    var chooseBtn2 = document.getElementById('chooseBtn2');
    var chooseBtn3 = document.getElementById('chooseBtn3');
    var chooseBtn4 = document.getElementById('chooseBtn4');

    hiddenBtn.addEventListener('change', function() {
        if (hiddenBtn.files.length > 0) {
            chooseBtn.innerText = hiddenBtn.files[0].name;
        } else {
            chooseBtn.innerText = 'Choose';
        }
    });
    hiddenBtn1.addEventListener('change', function() {
        if (hiddenBtn1.files.length > 0) {
            chooseBtn2.innerText = hiddenBtn1.files[0].name;
        } else {
            chooseBtn2.innerText = 'Choose';
        }
    });
    hiddenBtn2.addEventListener('change', function() {
        if (hiddenBtn2.files.length > 0) {
            chooseBtn3.innerText = hiddenBtn2.files[0].name;
        } else {
            chooseBtn3.innerText = 'Choose';
        }
    });
    hiddenBtn3.addEventListener('change', function() {
        if (hiddenBtn3.files.length > 0) {
            chooseBtn4.innerText = hiddenBtn3.files[0].name;
        } else {
            chooseBtn4.innerText = 'Choose';
        }
    });
</script>

<script>
    $('#btn-reset').on('click', function() {
        $('#chooseBtn').html('Pilih word file')
        $('#chooseBtn2').html('Foto 1')
        $('#chooseBtn3').html('Foto 2')
        $('#chooseBtn4').html('Foto 3')
    })

    $('#btn-submit').on('click', function() {
        if ($('#file_berita').val() == '') {
            $(".pilih-files").html('<small class="text-red">Silahkan pilih word file!</small>')
        }
    })
    $('.opsional').on('click', function() {
        $('.opsional-row').toggleClass('d-none')
    })
</script>


<!-- <script>
    var Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
    });


    $(document).on('input', '#file_berita', function() {
        if (this.files[0].size > 250000) { // ini untuk ukuran 500 Kb
            Toast.fire({
                icon: "warning",
                title: "Ukuran File Word Melebihi 250Kb!",
            });
            this.value = "";
            return false;
        };
        var pathFile = this.value;
        var ekstensiOk = /(\.docx|\.doc)$/i;
        if (!ekstensiOk.exec(pathFile)) {
            Toast.fire({
                icon: "warning",
                title: "Silakan upload file hanya dengan ekstensi .docx atau .doc",
            });
            this.value = "";
            return false;
        }
    })
</script> -->



<?= $this->endSection(); ?>