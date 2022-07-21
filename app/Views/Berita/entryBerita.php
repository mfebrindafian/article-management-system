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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
            <div class="row">
                <div class="col-12 mb-3">
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
                                        <th>Judul Berita</th>
                                        <th>Penulis</th>
                                        <th>Satker</th>
                                        <th>Status</th>
                                        <th>Publish</th>
                                        <th>Link</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <p class="text-muted mb-0">Nilai Tukar Petani (NTP) Provinsi Jambi Juni 2022 sebesar 127,31 </p>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-0">John Doe</p>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-0">BPS Kota Jambi</p>
                                        </td>
                                        <td>
                                            <span class="published">Published</span>
                                        </td>
                                        <td>Rabu, 20 Juli 2022</td>
                                        <td><a href="#">https://jambi.bps.go.id/brs.html</a></td>
                                        <td>
                                            <a href="#" class="btn btn-link btn-sm btn-rounded edit">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <p class="text-muted mb-0">Nilai Tukar Petani (NTP) Provinsi Jambi Juni 2022 sebesar 127,31 </p>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-0">John Doe</p>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-0">BPS Kota Jambi</p>
                                        </td>
                                        <td>
                                            <span class="reviewing">Reviewing</span>
                                        </td>
                                        <td>Rabu, 20 Juli 2022</td>
                                        <td><a href="#">https://jambi.bps.go.id/brs.html</a></td>
                                        <td>
                                            <a href="#" class="btn btn-link btn-sm btn-rounded edit">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <p class="text-muted mb-0">Nilai Tukar Petani (NTP) Provinsi Jambi Juni 2022 sebesar 127,31 </p>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-0">John Doe</p>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-0">BPS Kota Jambi</p>
                                        </td>
                                        <td>
                                            <span class="uploaded">Uploaded</span>
                                        </td>
                                        <td>Rabu, 20 Juli 2022</td>
                                        <td><a href="#">https://jambi.bps.go.id/brs.html</a></td>
                                        <td>
                                            <a href="#" class="btn btn-link btn-sm btn-rounded edit">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
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