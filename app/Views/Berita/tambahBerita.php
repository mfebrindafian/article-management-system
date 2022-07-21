<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Tambah berita </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                        <form class="card-body px-5">
                            <div class="row">
                                <div class="col-md-5 d-flex flex-column">
                                    <span><strong style="font-size: 20px;">Tentang Berita</strong></span>
                                    <span class="text-gray mb-4" style="font-size: 14px;">Keterangan tentang berita baru</span>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="text-gray-dark" style="font-size: 14px;" for="judul">Judul Berita</label>
                                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Ketikkan judul berita" />
                                    </div>
                                    <div class="form-group">
                                        <label class="text-gray-dark" style="font-size: 14px;">File Berita</label><br>
                                        <label style="width: 120px;" class="choose-btn fa-w-1 ripple mt-1" id="chooseBtn" for="file_berita">Pilih word file</label>
                                        <input type="file" class="form-control d-none" id="file_berita" name="file_berita" accept=".doc, .docx" />
                                        <label style="width: 80px;" class="choose-btn fa-w-1 ripple mt-1" id="chooseBtn2" for="foto_berita1">Foto 1</label>
                                        <input type="file" class="form-control d-none" id="foto_berita1" name="foto_berita1" accept=".jpg, .jpeg, .png" />
                                        <label style="width: 80px;" class="choose-btn fa-w-1 ripple mt-1" id="chooseBtn3" for="foto_berita2">Foto 2</label>
                                        <input type="file" class="form-control d-none" id="foto_berita2" name="foto_berita2" accept=".jpg, .jpeg, .png" />
                                        <label style="width: 80px;" class="choose-btn fa-w-1 ripple mt-1" id="chooseBtn4" for="foto_berita3">Foto 3</label>
                                        <input type="file" class="form-control d-none" id="foto_berita3" name="foto_berita3" accept=".jpg, .jpeg, .png" />
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
                                        <input type="text" class="form-control" id="nama_penulis" name="nama_penulis" placeholder="Ketikkan nama penulis" />
                                    </div>
                                    <div class="form-group">
                                        <label class="text-gray-dark" style="font-size: 14px;">Satuan Kerja</label>
                                        <select class="form-control filter mr-2" name="satker" style="border-radius: 5px;">
                                            <option selected value="">- Pilih Satuan Kerja -</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-12">
                                    <div class="float-right">
                                        <button class="mr-4 cancel-btn ripple" type="reset">Reset</button>
                                        <button type="submit" class="tombol-tambah float-right ripple shadow">Simpan</button>
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



<?= $this->endSection(); ?>