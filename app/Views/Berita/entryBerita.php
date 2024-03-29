<?php if (allowHalaman(session('level_id'), 1)) : ?>
    <?= $this->extend('layout/template'); ?>

    <?= $this->section('content'); ?>



    <div class="content-wrapper d-none">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Entry berita <small class="text-gray">/ tabel daftar berita</small></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Entry Berita</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-3">
                        <form action="" method="POST" class=" input-group input-group-md">
                            <input type="search" id="pencarian" name="table_search" class="form-control" style="padding: 6px 20px 6px 20px;" placeholder="Search" />
                        </form>
                    </div>
                    <div class="col-3"></div>
                    <div class="col-6">
                        <a href="<?= base_url('/tambahBerita') ?>" class="tombol-tambah float-right ripple">Tambah</a>
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
                                            <th>Link</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php if ($list_berita != null) : ?>
                                            <?php foreach ($list_berita as $berita) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td>
                                                        <p class="text-muted mb-0"><?= $berita['judul_berita']; ?> </p>
                                                    </td>
                                                    <td>
                                                        <?php if ($berita['status_kd'] == "1") {
                                                            echo '<span class="uploaded">Ready to review</span>';
                                                        } elseif ($berita['status_kd'] == "2") {
                                                            echo '<span class="reviewing">Reviewing</span>';
                                                        } elseif ($berita['status_kd'] == "3" && $berita['link_publish'] == '') {
                                                            echo '<span class="ready-publish">Ready to publish</span>';
                                                        } elseif ($berita['status_kd'] == "3") {
                                                            echo '<span class="published">Published</span>';
                                                        } else {
                                                            echo '<span class="rejected">Rejected</span>';
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted mb-0"><?= $berita['penulis']; ?></p>
                                                    </td>
                                                    <td>
                                                        <?php foreach ($list_satker as $satker) : ?>
                                                            <?php if ($satker['kd_satker'] == $berita['satker_kd']) : ?>
                                                                <p class="text-muted mb-0">[<?= $satker['kd_satker']; ?>] <?= $satker['satker']; ?></p>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </td>

                                                    <td id="tgl-tabel" class="text-nowrap"><?= $berita['tgl_publish']; ?></td>
                                                    <td><?= $berita['editor']; ?></td>
                                                    <td style="max-width: 300px;"><a href="<?= $berita['link_publish']; ?>"><?= $berita['link_publish']; ?></a></td>
                                                    <td>
                                                        <?php if ($berita['status_kd'] == 1 && $berita['user_id'] == session('user_id')) : ?>
                                                            <a href="<?= base_url('/editBerita/' . $berita['id']) ?>" class="btn btn-link btn-sm btn-rounded edit">
                                                                Edit
                                                            </a>
                                                        <?php endif; ?>

                                                        <!-- <button class="btn btn-link btn-sm btn-rounded px-2 text-gray">Edit</button> -->
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
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>


    <script type="text/javascript">
        $('#tabelData').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "responsive": true,
            'ordering': true,
            "info": true,
            "autoWidth": false,
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

    <!-- <script src="<?= base_url('/js/tanggal.js') ?>"></script>
    <script>
        $(document).ready(function() {
            let tglTabel = document.querySelectorAll('#tgl-tabel')
            for (i = 0; i <= tglTabel.length; i++) {
                if (tglTabel[i].innerHTML != '') {
                    tglTabel[i].innerHTML = ubahFormatTanggal3(tglTabel[i].textContent);
                }
            }
        })
    </script> -->
    <?= $this->endSection(); ?>
<?php endif; ?>