<?php if (allowHalaman(session('level_id'), 7)) : ?>
    <?= $this->extend('layout/template'); ?>

    <?= $this->section('content'); ?>

    <div class="content-wrapper d-none">
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
                    <div class="col-lg-4">
                        <form action="" method="get" class="input-group input-group-md float-right">
                            <input type="search" name="keyword" class="form-control rounded" style="padding: 6px 20px 6px 20px;" placeholder="Search" value="<?= $keyword ? $keyword : ""; ?>" />
                            <button type="submit" class="ml-4 tombol-tambah"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="col-lg-5"></div>
                    <div class="col-lg-3 mb-3"></div>

                </div>

                <div id="rowPublished" class="mt-4">
                    <div class="row isi-publish">
                        <?php if ($berita_siap_publish != null) : ?>
                            <?php foreach ($berita_siap_publish as $berita) : ?>
                                <div class="col-lg-6 mb-4">
                                    <div class="bg-white rounded shadow p-3">
                                        <div class="row">
                                            <?php $image_upload = $berita['image_upload']; ?>
                                            <?php $data = json_decode($image_upload); ?>
                                            <?php if ($data != null) {
                                                $foto_pilih = $data->image;
                                            } else {
                                                $foto_pilih[0] = 'default.jpg';
                                            } ?>

                                            <div class="col-4 border-0 bg-transparent">
                                                <div class="gambar-container shadow pistures">
                                                    <img src="<?= base_url('/berkas/foto/' . $foto_pilih[0]) ?>">
                                                </div>
                                            </div>
                                            <div class="col-8 d-flex flex-column justify-content-between">
                                                <div class="mt-2 d-flex flex-column">
                                                    <h5 class="garis-bawah" title="<?= $berita['judul_berita']; ?>"><strong><a href="<?= base_url('/detailBerita/' . $berita['id']); ?>" class="judul-berita" style="color: black;"><?= $berita['judul_berita']; ?></a></strong></h5>
                                                    <small><?= $berita['penulis']; ?> | [<?= $berita['satker_kd']; ?>] <?php foreach ($list_satker as $satker) {
                                                                                                                            if ($satker['kd_satker'] == $berita['satker_kd']) {
                                                                                                                                echo $satker['satker'];
                                                                                                                            }
                                                                                                                        } ?></small>
                                                    <div class="mt-2">
                                                        <span class="ready-publish">Ready to publish</span>
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
                                                    <div class="col-sm-8 pt-2 d-flex justify-content-end">
                                                        <a href="<?= base_url('/detailBerita/' . $berita['id']); ?>" class="edit float-right ripple">Detail</a>
                                                    </div>
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

                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <?= $pager->links('siap_publish', 'custom_simple'); ?>
                        </div>
                    </div>
                </div>
                <hr class="mt-5">
                <div class="row mt-4 mb-3">
                    <div class="col-9">
                        <h4 class="m-0 ">Berita Terpublikasi</h4>
                    </div>
                    <div class="col-3">
                        <form action="" method="POST" class=" input-group input-group-md">
                            <input type="search" id="pencarian" name="table_search" class="form-control" style="padding: 6px 20px 6px 20px;" placeholder="Search" />
                        </form>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body overflow-auto">
                                <table class="table align-middle mb-0 bg-white" id="tabelData">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Judul</th>
                                            <th>Status</th>
                                            <th>Penulis</th>
                                            <th>Satker</th>
                                            <th>Publish</th>
                                            <th>Editor</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if ($berita_publish != null) : ?>
                                            <?php $no = 1; ?>
                                            <?php foreach ($berita_publish as $berita) : ?>
                                                <tr class="py-4">
                                                    <td><?= $no++ ?></td>
                                                    <td>
                                                        <p class="text-muted mb-0"><?= $berita['judul_berita']; ?></p>
                                                    </td>
                                                    <td>
                                                        <span class="published">Published</span>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted mb-0"><?= $berita['penulis']; ?></p>
                                                    </td>
                                                    <td>

                                                        <p class="text-muted mb-0">[<?= $berita['satker_kd']; ?>] <?php foreach ($list_satker as $satker) {
                                                                                                                        if ($satker['kd_satker'] == $berita['satker_kd']) {
                                                                                                                            echo $satker['satker'];
                                                                                                                        }
                                                                                                                    } ?></p>

                                                    </td>
                                                    <td><?= $berita['tgl_publish']; ?></td>
                                                    <td><?= $berita['editor']; ?></td>
                                                    <td class="aksi">
                                                        <a target="_blank" href="<?= $berita['link_publish']; ?>" class="mr-2"><i class="fas fa-globe"></i></a>
                                                        <a href="<?= base_url('/detailBerita/' . $berita['id']); ?>" style="color: #e89300;"><i class="fas fa-eye"></i></a>
                                                    </td>
                                                </tr>

                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script>
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
    <script type="text/javascript">
        $('#tabelData').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            'ordering': false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "pageLength": 10

        });

        $('.filter').on('change', function() {
            $('#tabelData').DataTable().search(
                $(this).val()
            ).draw();
        });

        $('#tabelData_wrapper').children().first().addClass('d-none')
        $('.dataTables_paginate').addClass('Pager2').addClass('float-right')
        $('.dataTables_info').addClass('text-sm text-gray py-2')
        $('.dataTables_paginate').parent().parent().addClass('card-footer clearfix')

        $(document).on('keyup', '#pencarian', function() {
            $('#tabelData').DataTable().search(
                $(this).val()
            ).draw();
        })
    </script>
    <script>
        const link = '<?= base_url('/images/empty.gif') ?>';
    </script>
    <script src="<?= base_url('/js/portalberita.js') ?>"></script>
    <?= $this->endSection(); ?>
<?php endif ?>