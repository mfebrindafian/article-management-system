<?php if (allowHalaman(session('level_id'), 6)) : ?>
    <?= $this->extend('layout/template'); ?>

    <?= $this->section('content'); ?>
    <div class="content-wrapper d-none">
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Final Review </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('/reviewBerita') ?>">Review Berita</a></li>
                            <li class="breadcrumb-item active">Final Review</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card py-5">
                            <div class="row">
                                <?php if ($berita != null) : ?>
                                    <form action="<?= base_url('/uploadHasiReviewUlang'); ?>" method="post" enctype="multipart/form-data" class="col-md-12 px-5">
                                        <div class="mt-2 d-flex flex-column">
                                            <textarea name="judul" id="judul-berita-top" disabled><?= $berita['judul_berita']; ?></textarea>
                                            <div>
                                                <button type="button" id="enableEdit" class="btn btn-info btn-xs tombol px-3 mb-3" style="background-color: #3c4b64; border:none;">Edit judul</button>
                                            </div>
                                            <input type="text" class="d-none" name="judul_berita" id="judul-berita" value="<?= $berita['judul_berita']; ?>" required>
                                            <small><?= $berita['penulis']; ?> | [<?= $berita['satker_kd']; ?>] <?php foreach ($list_satker as $satker) {
                                                                                                                    if ($satker['kd_satker'] == $berita['satker_kd']) {
                                                                                                                        echo $satker['satker'];
                                                                                                                    }
                                                                                                                } ?></small>
                                            <div class="mt-2">
                                                <span class="reviewing">Reviewing</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <hr>
                                            </div>
                                            <div class="col-2 text-center text-gray opsional">
                                                <small>
                                                    <em>Foto</em>
                                                </small>
                                            </div>
                                            <div class="col-5">
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <div class="col-sm-12 text-center px-5">
                                                <div class="row mt-2  mb-4">
                                                    <div class="col-12 text-center">
                                                        <strong>Ceklis Foto yang akan di publish (opsional)</strong>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <?php $image_upload = $berita['image_upload']; ?>
                                                    <?php $data = json_decode($image_upload); ?>
                                                    <?php if ($data != null) {
                                                        $foto_all = $data->image;
                                                    } else {
                                                        $foto_all[0] = null;
                                                        $foto_all[1] = null;
                                                        $foto_all[2] = null;
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

                                                    <?php if ($foto_1 != null) : ?>
                                                        <div class=" col-md-4 mb-3 px-5">
                                                            <label for="foto1" id="toggle-pilih" class="pilih-gambar w-100">
                                                                <i class="fas fa-check position-absolute d-none"></i>
                                                                <img class="mb-4 " src="<?= base_url('/berkas/foto/' . $foto_1) ?>" alt="">
                                                                <input class="d-none" type="checkbox" name="check_foto1" id="foto1">
                                                                <input type="hidden" name="nama_foto1" value="<?= $foto_1; ?>" ">
                                                            </label>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if ($foto_2 != null) : ?>
                                                        <div class=" col-md-4 mb-3 px-5">
                                                                <label for="foto2" id="toggle-pilih" class="pilih-gambar w-100">
                                                                    <i class="fas fa-check position-absolute d-none"></i>
                                                                    <img class="mb-4 " src="<?= base_url('/berkas/foto/' . $foto_2) ?>" alt="">
                                                                    <input class="d-none" type="checkbox" name="check_foto2" id="foto2">
                                                                    <input type="hidden" name="nama_foto2" value="<?= $foto_2; ?>" ">
                                                                </label>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ($foto_3 != null) : ?>
                                                            <div class=" col-md-4 mb-3 px-5">
                                                                    <label for="foto3" id="toggle-pilih" class="pilih-gambar w-100">
                                                                        <i class="fas fa-check position-absolute d-none"></i>
                                                                        <img class="mb-4" src="<?= base_url('/berkas/foto/' . $foto_3) ?>" alt="">
                                                                        <input class="d-none" type="checkbox" name="check_foto3" id="foto3">
                                                                        <input type="hidden" name="nama_foto3" value="<?= $foto_3; ?>" ">
                                                                    </label>
                                                             </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class=" row mb-4">
                                                                        <div class="col-12 text-center">
                                                                            <a href="#showPreview" id="show-gallery">Lihat Preview</a>
                                                                        </div>
                                                        </div>
                                                </div>

                                                <div class=" row">
                                                    <div class="col-5">
                                                        <hr>
                                                    </div>
                                                    <div class="col-2 text-center text-gray opsional">
                                                        <small>
                                                            <em>Atau</em>
                                                        </small>
                                                    </div>
                                                    <div class="col-5">
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row mt-2 mb-4 ">
                                                    <div class="col-12 text-center">
                                                        <strong>Upload foto baru (opsional)</strong>
                                                    </div>
                                                </div>
                                                <div class="row row-foto px-5">
                                                    <div class="col-md-4 px-5">
                                                        <label style="width:100%;" class="choose-btn-opsional fa-w-1 ripple mt-1 text-center" id="chooseBtn2" for="foto_berita1">Foto 1</label>
                                                        <input type="file" class="form-control d-none  foto" id="foto_berita1" name="foto_berita1" accept=".jpg, .jpeg, .png" />
                                                        <span class="position-absolute d-none" href="#"><i class="fas fa-times  text-danger pe-auto"></i></span>
                                                    </div>


                                                    <div class="col-md-4 px-5">
                                                        <label style="width:100%;" class="choose-btn-opsional fa-w-1 ripple mt-1 text-center" id="chooseBtn3" for="foto_berita2">Foto 2</label>
                                                        <input type="file" class="form-control d-none  foto" id="foto_berita2" name="foto_berita2" accept=".jpg, .jpeg, .png" />
                                                        <span class="position-absolute d-none" href="#"><i class="fas fa-times  text-danger pe-auto"></i></span>
                                                    </div>


                                                    <div class="col-md-4 px-5">
                                                        <label style="width:100%;" class="choose-btn-opsional fa-w-1 ripple mt-1 text-center" id="chooseBtn4" for="foto_berita3">Foto 3</label>
                                                        <input type="file" class="form-control d-none  foto" id="foto_berita3" name="foto_berita3" accept=".jpg, .jpeg, .png" />
                                                        <span class="position-absolute d-none" href="#"><i class="fas fa-times  text-danger pe-auto"></i></span>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <small class="text-red foto-validasi"></small>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" name="id_berita_review" value="<?= $berita['id']; ?>">
                                            <div class=" row">
                                                <div class="col-5">
                                                    <hr>
                                                </div>
                                                <div class="col-2 text-center text-gray opsional">
                                                    <small>
                                                        <em>File berita</em>
                                                    </small>
                                                </div>
                                                <div class="col-5">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row mt-2 mb-4 ">
                                                <div class="col-12 text-center">
                                                    <strong class="text-gray">File berita lama</strong>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-4">
                                                    <input type="hidden" name="file_lama" value="<?= $berita['file_review']; ?>">
                                                    <a href="<?= base_url('/downloadBeritaFinal/' . $berita['id']); ?>" style="width: 100%; background-color: #fff0d6; color: #946410;" class="choose-btn float-right ripple text-center"><strong>Download</strong></a>
                                                </div>
                                                <div class="col-md-4"> </div>
                                            </div>
                                            <div class="row mt-5 mb-4 ">
                                                <div class="col-12 text-center">
                                                    <strong>Upload hasil review baru (opsional)</strong>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-4"> </div>
                                                <div class="col-md-4">
                                                    <label style="width: 100%;" class="choose-btn ripple text-center" id="chooseBtn" for="file_berita">Upload Hasil Review</label>
                                                    <input type="file" class="form-control d-none" id="file_berita" name="file_berita" accept=".doc, .docx" />
                                                </div>
                                                <div class="col-md-4"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <button id="paling-submit" class="d-none" type="submit">submit</button>
                                                    <span id="btn-submit" data-toggle="modal" data-target="#modal-confirm" class="tombol-tambah ripple shadow">Simpan</span>
                                                </div>
                                            </div>

                                        </div>

                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="galley" class="d-none">
        <ul class="pictures">
            <?php if ($foto_1 != null) : ?>
                <li>
                    <img data-original="<?= base_url('/berkas/foto/' . $foto_1) ?>" src="<?= base_url('/berkas/foto/' . $foto_1) ?>">
                </li>
            <?php endif; ?>
            <?php if ($foto_2 != null) : ?>
                <li>
                    <img data-original="<?= base_url('/berkas/foto/' . $foto_2) ?>" src="<?= base_url('/berkas/foto/' . $foto_2) ?>">
                </li>
            <?php endif; ?>
            <?php if ($foto_3 != null) : ?>
                <li>
                    <img data-original="<?= base_url('/berkas/foto/' . $foto_3) ?>" src="<?= base_url('/berkas/foto/' . $foto_3) ?>">
                </li>
            <?php endif; ?>
        </ul>
    </div>

    <script src="<?= base_url('/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script src="<?= base_url('/js/viewer.min.js') ?>"></script>
    <script src="<?= base_url('/js/jquery.validate.min.js') ?>"></script>
    <script src="<?= base_url('/js/validasi.js') ?>"></script>
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
        $('#judul-berita-top').each(function() {
            this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
        }).on('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    </script>

    <script>
        $(document).on('keyup', '#judul-berita-top', function() {
            $('#judul-berita').val($(this).val())
        })

        function focus() {
            setTimeout(function() {
                $('#judul-berita-top').focus()
                $('#judul-berita-top').select()
            }, 100);
        }
        $(document).on('click', '#enableEdit', function() {
            focus();
            $('#enableEdit').children().toggleClass('fa-times')
            $('#enableEdit').toggleClass('bg-danger')
            $('#judul-berita-top').prop('disabled', function(i, v) {
                return !v;
            }).focus();
            $('#judul-berita-top').setAttribute('style', 'height:' + ($('#judul-berita-top').scrollHeight) + 'px;overflow-y:hidden;');
            $('#judul-berita-top').style.height = 'auto';
            $('#judul-berita-top').style.height = ($('#judul-berita-top').scrollHeight) + 'px';
        })
    </script>

    <script>
        var hiddenBtn = document.getElementById('file_berita');
        var chooseBtn = document.getElementById('chooseBtn');
        hiddenBtn.addEventListener('change', function() {
            if (hiddenBtn.files.length > 0) {
                chooseBtn.innerText = hiddenBtn.files[0].name;
            } else {
                chooseBtn.innerText = 'Upload Hasil Review';
            }
        });


        $(document).ready(function() {
            <?php if (session()->getFlashdata('pesan')) { ?>
                Swal.fire({
                    title: "<?= session()->getFlashdata('pesan') ?>",
                    icon: "<?= session()->getFlashdata('icon') ?>",
                    showConfirmButton: true,
                });
            <?php } ?>
        });

        jQuery.validator.setDefaults({
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });

        $(document).ready(function() {
            $('#form-tambah').validate({
                rules: {
                    judul: {
                        required: true,
                    },
                    file_berita: {
                        required: true,
                    }
                },
                messages: {
                    file_berita: {
                        required: 'Silahkan pilih word file!',
                    },
                    judul: {
                        required: 'Judul berita tidak boleh kosong!',
                    }
                },
            });
        });
    </script>




    <!-- FOTO FOTOAN -->
    <script>
        $(document).on('change', 'input[type="checkbox"]', function() {
            if ($(this).prop('checked')) {
                $(this).parent().addClass('terpilih')
                $(this).prev().prev().removeClass('d-none')
            } else {
                $(this).parent().removeClass('terpilih')
                $(this).prev().prev().addClass('d-none')
            }


            if ($('#foto1').prop('checked')) {

                $('#foto_berita1').prev().addClass('d-none')
            } else {

                $('#foto_berita1').prev().removeClass('d-none')
            }
            if ($('#foto2').prop('checked')) {

                $('#foto_berita2').prev().addClass('d-none')
            } else {

                $('#foto_berita2').prev().removeClass('d-none')
            }
            if ($('#foto3').prop('checked')) {

                $('#foto_berita3').prev().addClass('d-none')
            } else {

                $('#foto_berita3').prev().removeClass('d-none')
            }
        })


        $(document).on('change', '.row-foto input[type="file"]', function() {
            if ($(this).val() != null) {
                $(this).next().removeClass('d-none')
                $('#foto' + $(this).attr('id').slice(-1)).parent().addClass('d-none')
            }
        })
        $(document).on('click', '.row-foto span', function() {
            $(this).prev().val(null)
            $('#foto' + $(this).prev().attr('id').slice(-1)).parent().removeClass('d-none')
            $(this).prev().prev().html('Foto ' + $(this).prev().attr('id').slice(-1))
            $(this).addClass('d-none')
        })
    </script>
    <script>
        $(document).on('click', '#btn-submit', function() {
            let chekbox = $('input[type="checkbox"]').length
            let cheklisFoto = $('input:checkbox:not(":checked")').length;
            let uploadFoto = $('.row-foto').find('input[type="file"]').filter((i, el) => el.value.trim() === '').length;
            let total = chekbox + 3;
            let pesan;
            if (total == (cheklisFoto + uploadFoto)) {
                pesan = 'Anda tidak memilih atau mengupload foto'
            } else if (cheklisFoto == $('input[type="checkbox"]').length) {
                pesan = 'Anda tidak memilih foto dari penulis'
            }
            if ($('input[type="checkbox"]').length > 0) {
                if ((cheklisFoto == $('input[type="checkbox"]').length && $('input[type="checkbox"]').length > 0) || (total == 6 && $('input[type="checkbox"]').length > 0)) {
                    Swal.fire({
                        title: "Yakin ingin melanjutkan?",
                        text: pesan,
                        icon: "question",
                        showCancelButton: true,
                        showConfirmButton: true,
                        customClass: {
                            confirmButton: 'submit-button-diswal'
                        }
                    });
                    $('.submit-button-diswal').attr('onclick', 'submitHasil()')
                } else {
                    submitHasil()
                }
            } else if ($('input[type="checkbox"]').length == 0) {
                submitHasil()
            }
        });

        function submitHasil() {
            $('#paling-submit').click()
        }
    </script>

    <?= $this->endSection(); ?>
<?php endif; ?>