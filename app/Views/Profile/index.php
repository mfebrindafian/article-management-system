<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper d-none">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Profile </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
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
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card card-primary">
                        <form action="<?= base_url('/updateProfileByUser'); ?>" method="POST" enctype="multipart/form-data" class="card-body box-profile">
                            <input type="hidden" name="id_profile_user" value="<?= $data_profil_user['id']; ?>">
                            <input type="hidden" name="password_user" value="<?= $data_profil_user['password']; ?>">
                            <input type="hidden" name="token" value="<?= $data_profil_user['token']; ?>">
                            <input type="hidden" name="nip_lama_user" value="<?= $data_profil_user['nip_lama_user']; ?>">
                            <input type="hidden" name="is_active" value="<?= $data_profil_user['is_active']; ?>">
                            <input type="hidden" name="image_user_lama" value="<?= $data_profil_user['image']; ?>">


                            <div class="text-center">
                                <?php if ($data_profil_user['image'] == 'default.png') {
                                    $foto_profil_user = '/images/profil/default.jpg';
                                } else {
                                    $foto_profil_user = '/images/profil/' . $data_profil_user['image'];
                                } ?>
                                <img class="profile-user-img img-fluid" src="<?= base_url($foto_profil_user) ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><strong id="username-lengkap"><?= $data_profil_user['username']; ?></strong> <button type="button" id="enableEdit" class="btn btn-info btn-xs tombol" style="background-color: #3c4b64; border:none;"><i class="fas fa-pen"></i></button></h3>
                            <p class="text-muted text-center">
                                <?php foreach ($list_level as $level) : ?>
                                    <?= $level['nama_level'] ?> |
                                <?php endforeach; ?>
                            </p>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" id="username" name="username" class="form-control" value="<?= $data_profil_user['username']; ?>" disabled>
                            </div>

                            <hr>
                            <div class="form-group">
                                <label>Nama lengkap</label>
                                <input type="text" name="nama" class="form-control" value="<?= $data_profil_user['fullname']; ?>" disabled>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?= $data_profil_user['email']; ?>" disabled>
                            </div>
                            <hr>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="image_user_baru" type="file" class="custom-file-input" id="image_user_baru" value="<?= $data_profil_user['image']; ?>" accept=".png, .jpg, .jpeg" disabled />
                                    <label class="custom-file-label" for="image_user"><?= $data_profil_user['image']; ?></label>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="d-none" id="button">
                                        <button type="submit" class="btn btn-info tombol" style="background-color: #3c4b64; border:none;">Simpan</button>
                                        <button type="button" id="batal" class="btn btn-danger" style=" border:none;">Batal</button>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <button type="button" id="btn-ubah-password" class="btn btn-secondary float-right" style="border: none;" data-toggle="modal" data-target="#modal-ubah-password" disabled>Ubah Password</button>
                                </div>
                            </div>


                        </form>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-1"></div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

<!-- MODAL UBAH PASSWORD -->
<div class="modal fade" style="padding-top: 8%;" id="modal-ubah-password">
    <div class="modal-dialog">
        <form action="<?= base_url('/gantiPasswordByUser'); ?>" method="POST" class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <input type="hidden" name="user_id" id="user_id" value="<?= session('user_id'); ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label>Password Lama</label>
                    <div class="password">
                        <input type="password" name="password_lama" class="form-control" placeholder="Password lama...">
                        <i name="eye" class="fas fa-eye pw-eye" id="togglePassword"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label>Password Baru</label>
                    <div class="password">
                        <input type="password" id="password_baru" name="password_baru" class="form-control" placeholder="Password baru ...">
                        <i name="eye" class="fas fa-eye pw-eye" id="togglePassword"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label>Konfirmasi Password Baru</label>
                    <div class="password">
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Konfirmasi password ...">
                        <i name="eye" class="fas fa-eye pw-eye" id="togglePassword"></i>
                    </div>
                    <span id='message'></span>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-info tombol" style="background-color: #3c4b64; border:none;">Simpan</button>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script src="<?= base_url('/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
<script src="<?= base_url('/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<!-- Toastr -->
<script src="<?= base_url('/plugins/toastr/toastr.min.js') ?>"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
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
</script>

<script>
    $(document).on('click', "#togglePassword", function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        input = $(this).parent().find("input");
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>

<script>
    $(document).on('input', "#username", function() {
        $('#username-lengkap').html($('#username').val());
    });
</script>
<script>
    $(document).on('click', '#enableEdit', function() {
        $('#enableEdit').children().toggleClass('fa-times')
        $('#enableEdit').toggleClass('bg-danger')
        if ($('#username').is(':disabled')) {
            $('input').prop('disabled', false);
        } else {
            $('input').prop('disabled', true);
        }
        if ($('#btn-ubah-password').is(':disabled')) {
            $('#btn-ubah-password').prop('disabled', false);
            $('#btn-ubah-password').removeClass('btn-secondary').addClass('btn-info');
        } else {
            $('#btn-ubah-password').prop('disabled', true);
            $('#btn-ubah-password').removeClass('btn-info ').addClass('btn-secondary');
        }
        $('#button').toggleClass('d-none');
    })

    $(document).on('click', '#batal', function() {
        $('#enableEdit').children().toggleClass('fa-times')
        $('#enableEdit').toggleClass('bg-danger')
        if ($('#username').is(':disabled')) {
            $('input').prop('disabled', false);
        } else {
            $('input').prop('disabled', true);
        }
        $('#button').toggleClass('d-none');
    })
</script>

<script>
    $('#password_baru, #confirm_password').on('keyup', function() {
        if ($('#password_baru').val() == $('#confirm_password').val()) {
            $('#message').html('Password baru cocok').css('color', 'green');
        } else
            $('#message').html('Password baru belum cocok').css('color', 'red');
    });
</script>

<script>
    var Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
    });
    $(document).on('input', '#image_user', function() {
        if (this.files[0].size > 500000) { // ini untuk ukuran 500 Kb
            Toast.fire({
                icon: "warning",
                title: "Ukuran File Melebihi 500Kb!",
            });
            this.value = "";
            return false;
        };
        var pathFile = this.value;
        var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
        if (!ekstensiOk.exec(pathFile)) {
            Toast.fire({
                icon: "warning",
                title: "Silakan upload file yang dengan ekstensi .png, .jpg, .jpeg",
            });
            this.value = "";
            return false;
        }
    })
</script>

<script>
    function previewImg() {
        const profile = document.querySelector('#image_profile');
        const profileLabel = document.querySelector('.form-control')
        const imgPreview = document.querySelector('.img-preview')

        profileLabel.textContent = profile.files[0].name;

        const fileProfile = new FileReader();
        fileProfile.readAsDataURL(profile.files[0]);

        fileProfile.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

<?= $this->endSection(); ?>