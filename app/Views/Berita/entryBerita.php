<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
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
                        <input type="search" name="table_search" class="form-control" style="padding: 6px 20px 6px 20px;" placeholder="Search" />
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
                            <table class="table align-middle mb-0 bg-white">
                                <thead class="bg-light">
                                    <tr>
                                        <th>#</th>
                                        <th style="min-width: 200px;">Judul</th>
                                        <th>Penulis</th>
                                        <th>Satker</th>
                                        <th>Status</th>
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
                                                    <p class="text-muted mb-0"><?= $berita['penulis']; ?></p>
                                                </td>
                                                <td>
                                                    <?php foreach ($list_satker as $satker) : ?>
                                                        <?php if ($satker['kd_satker'] == $berita['satker_kd']) : ?>
                                                            <p class="text-muted mb-0">[<?= $satker['kd_satker']; ?>] <?= $satker['satker']; ?></p>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td>
                                                    <?php if ($berita['status_kd'] == 1) {
                                                        echo '<span class="uploaded">Uploaded</span>';
                                                    } elseif ($berita['status_kd'] == 2) {
                                                        echo '<span class="reviewing">Reviewing</span>';
                                                    } else {
                                                        echo '<span class="published">Published</span>';
                                                    } ?>
                                                </td>
                                                <td><?= $berita['tgl_publish']; ?></td>
                                                <td><?= $berita['editor']; ?></td>
                                                <td><a href="<?= $berita['link_publish']; ?>"><?= $berita['link_publish']; ?></a></td>
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



<?= $this->endSection(); ?>