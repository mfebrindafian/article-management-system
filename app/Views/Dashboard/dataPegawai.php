<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 fw-bold">Dashboard Kepegawian</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6 widget" style="cursor: pointer;">
                    <!-- small box -->
                    <div class="small-box  bg-white" style="border: 1px solid gray; padding: 0;">
                        <div class="inner" style="color: #55415C; padding-left: 15px;">
                            <h3 style="font-size: 70px;">33</h3>
                            <p style="font-weight: bold;">Jumlah Laporan</p>
                        </div>
                        <a href="" class="selanjutnya">
                            <p style="margin:0;">More info</p> <i class="fas fa-arrow-circle-down"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6 widget" style="cursor: pointer;">
                    <!-- small box -->
                    <div class="small-box bg-white" style="border: 1px solid gray; padding: 0;">
                        <div class="inner" style="color: #55415C; padding-left: 15px;">

                            <h3 style="font-size: 70px;">13</h3>

                            <p style="font-weight: bold;">Jumlah Kegiatan</p>
                        </div>
                        <a href="#" data-toggle="modal" data-target="#modal-list-laporan" class="selanjutnya">
                            <p style="margin:0;">More info</p> <i class="fas fa-arrow-circle-down"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6 widget" style="cursor: pointer;">
                    <!-- small box -->
                    <div class="small-box bg-white" style="border: 1px solid gray; padding: 0;">
                        <div class="inner" style="color: #55415C; padding-left: 15px;">
                            <h3 style="font-size: 70px;">12</h3>

                            <p style="font-weight: bold;">Jumlah User</p>
                        </div>
                        <a href="#" class="selanjutnya">
                            <p style="margin:0;">&nbsp;</p>
                        </a>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6 widget" style="cursor: pointer;">
                    <!-- small box -->
                    <div class="small-box bg-white" style="border: 1px solid gray; padding: 0;">
                        <div class="inner" style="color: #55415C; padding-left: 15px;">
                            <h3 style="font-size: 70px;">0</h3>

                            <p style="font-weight: bold;">Angka Kredit</p>
                        </div>
                        <a href="#" class="selanjutnya">
                            <p style="margin:0;">&nbsp;</p>
                        </a>
                    </div>
                </div>

                <!-- ./col -->
            </div>
            <hr>
            <!-- /.row -->
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-2">
                    <div class="input-group">
                        <select class="form-control filter mr-2" style="border-radius: 5px;">
                            <option selected value="">- Satuan Kerja -</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header border-0 pt-4">
                            <h6 class="text-center"><strong>Laporan Berdasarkan Pendidikan</strong></h6>
                        </div>
                        <div class="card-body">
                            <canvas id="barChartPendidikan" style="min-height: 250px;  height: 250px;  max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 d-flex justify-content-center align-items-center">
                                    <img class="img-fluid rounded" style="width: 100%;" src="<?= base_url('/images/bps.png') ?>">
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 d-flex justify-content-center align-items-center flex-column" style="min-height: 313px;  height: 313px;  max-height: 313px;">
                                    <h6>DATABASE PEGAWAI</h6>
                                    <h2 class="fa-3x"><strong>13:09 WIB</strong></h2>
                                    <h6>Selasa, 19 Juli 2022</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header border-0 pt-4">
                            <h6 class="text-center"><strong>Laporan Berdasarkan Jenis kelamin</strong></h6>
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart" style="min-height: 250px;  height: 250px;  max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-0 pt-4">
                            <h6 class="text-center"><strong>Laporan Berdasarkan Golongan</strong></h6>
                        </div>
                        <div class="card-body">
                            <canvas id="barChartGolongan" style="min-height: 250px;  height: 250px;  max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header border-0 pt-4">
                            <h6 class="text-center"><strong>Laporan Berdasarkan Jabatan Fungsional</strong></h6>
                        </div>
                        <div class="card-body">
                            <canvas id="barChartFungsional" style="min-height: 250px;  height: 250px;  max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- /.content -->
</div>
<!-- ChartJS -->
<script src="<?= base_url('/plugins/chart.js/Chart.min.js') ?>"></script>

<!-- BARCHART -->
<script>
    var areaChartData = {
        labels: [
            "SMA",
            "Diploma",
            "Sarjana"
        ],
        datasets: [{
            backgroundColor: "#3c4b64",
            data: [28, 48, 40],
        }],
    };

    var golonganChartData = {
        labels: [
            "IA", "IB", "IC", "ID", "IIA", "IIB", "IIC", "IID", "IIIA", "IIIB", "IIIC", "IIID", "IVA", "IVB", "IVC", "IVD", "IVE"
        ],
        datasets: [{
            backgroundColor: "#3c4b64",
            data: [28, 48, 40, 33, 12, 44, 6, 1, 12, 12, 24, 53, 11, 13, 43, 12, 56],
        }],
    };

    var fungsionalChartData = {
        labels: [
            "SMA",
            "Diploma",
            "Sarjana"
        ],
        datasets: [{
            backgroundColor: "#3c4b64",
            data: [28, 48, 40],
        }],
    };

    var barChartPendidikanCanvas = $("#barChartPendidikan").get(0).getContext("2d");
    var barChartGolonganCanvas = $("#barChartGolongan").get(0).getContext("2d");
    var barChartFungsionalCanvas = $("#barChartFungsional").get(0).getContext("2d");

    var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false,
        legend: false,
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    display: false,
                },
            }, ],
            yAxes: [{
                display: true,
                gridLines: {
                    display: true,
                }
            }, ],
        },
    };

    new Chart(barChartPendidikanCanvas, {
        type: "bar",
        data: areaChartData,
        options: barChartOptions,
    });
    new Chart(barChartGolonganCanvas, {
        type: "bar",
        data: golonganChartData,
        options: barChartOptions,
    });
    new Chart(barChartFungsionalCanvas, {
        type: "horizontalBar",
        data: fungsionalChartData,
        options: barChartOptions,
    });
</script>

<!-- DONUT -->
<script>
    var donutChartCanvas = $("#donutChart").get(0).getContext("2d");
    var donutData = {
        labels: ["Laki-laki", "Perempuan"],
        datasets: [{
            data: [114, 98],
            backgroundColor: [
                "#3c4b64",
                "#e3bfe0",
            ],
        }, ],
    };
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            position: 'bottom'
        }
    };

    new Chart(donutChartCanvas, {
        type: "doughnut",
        data: donutData,
        options: donutOptions,
    });
</script>

<?= $this->endSection(); ?>