<?php

namespace App\Controllers;


use App\Models\MasterLaporanHarianModel;
use App\Models\MasterUserModel;
use App\Models\MasterSatuanModel;

class masterDashboard extends BaseController
{
    protected $masterLaporanHarianModel;
    protected $masterDashboardModel;

    protected $masterUserModel;
    protected $masterSatuanModel;

    public function __construct()
    {

        $this->masterUserModel = new masterUserModel();
        $this->masterLaporanHarianModel = new masterLaporanHarianModel();
        $this->masterSatuanModel = new masterSatuanModel();
    }

    public function index()
    {
        $event_data = $this->masterLaporanHarianModel->getAll(session('user_id'));
        $list_user = $this->masterUserModel->getAllUser();

        if ($event_data != NULL) {
            foreach ($event_data as $row) {
                $events[] = array(
                    'link' => base_url('/showDetailLaporanHarianOnDashboard/' . $row['id']),
                    'tgl' => $row['tgl_kegiatan']
                );
            }
            $events_json = json_encode($events);
        } else {
            $events[] = array('');
            $events_json = json_encode($events);
        }


        $total_laporan = $this->masterLaporanHarianModel->getTotalByUser(session('user_id'));


        $januari = [];
        $februari = [];
        $maret = [];
        $april = [];
        $april = [];
        $mei = [];
        $juni = [];
        $juli = [];
        $agustus = [];
        $september = [];
        $oktober = [];
        $november = [];
        $desember = [];
        if ($total_laporan != NULL) {
            for ($i = 0; $i < count($total_laporan); $i++) {
                $data = explode('-', $total_laporan[$i]['tgl_kegiatan']);
                $bulan[] = $data[1];
                if ($bulan[$i] == date('m')) {
                    $laporan_bulan_ini[] = $total_laporan[$i];
                }
            }


            foreach ($laporan_bulan_ini as $bulan) {
                $laporan = $bulan['uraian_kegiatan'];
                $data = json_decode($laporan);
                $list_uraian[] = $data->uraian;
            }

            $kegiatan_bulan_ini = 0;

            for ($i = 0; $i < count($list_uraian); $i++) {
                $kegiatan_bulan_ini = $kegiatan_bulan_ini + count($list_uraian[$i]);
            }

            //untuk kebutuhan chart
            for ($i = 0; $i < count($total_laporan); $i++) {
                $data = explode('-', $total_laporan[$i]['tgl_kegiatan']);
                $tahun[] = $data[0];
                if ($tahun[$i] == date('Y')) {
                    $laporan_tahun_ini[] = $total_laporan[$i];
                }
            }

            foreach ($laporan_tahun_ini as $tahun) {
                $laporan_tahun = $tahun['uraian_kegiatan'];
                $data_tahun = json_decode($laporan_tahun);
                $list_uraian_tahun[] = $data_tahun->uraian;
            }
            $kegiatan_tahun_ini = 0;

            for ($i = 0; $i < count($list_uraian_tahun); $i++) {
                $kegiatan_tahun_ini = $kegiatan_tahun_ini + count($list_uraian_tahun[$i]);
            }



            for ($i = 0; $i < count($total_laporan); $i++) {
                $data = explode('-', $total_laporan[$i]['tgl_kegiatan']);
                $bulan[] = $data[1];
                $tahun[] = $data[0];
                if ($bulan[$i] == '01' && $tahun[$i] == date('Y')) {
                    $januari[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '02' && $tahun[$i] == date('Y')) {
                    $februari[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '03' && $tahun[$i] == date('Y')) {
                    $maret[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '04' && $tahun[$i] == date('Y')) {
                    $april[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '05' && $tahun[$i] == date('Y')) {
                    $mei[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '06' && $tahun[$i] == date('Y')) {
                    $juni[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '07' && $tahun[$i] == date('Y')) {
                    $juli[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '08' && $tahun[$i] == date('Y')) {
                    $agustus[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '09' && $tahun[$i] == date('Y')) {
                    $september[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '10' && $tahun[$i] == date('Y')) {
                    $oktober[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '11' && $tahun[$i] == date('Y')) {
                    $november[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '12' && $tahun[$i] == date('Y')) {
                    $desember[] = $total_laporan[$i];
                }
            }
        } else {
            $laporan_bulan_ini = null;
            $kegiatan_bulan_ini = 0;
            $kegiatan_tahun_ini = 0;
            $kegiatan_januari_ini = 0;
            $kegiatan_februari_ini = 0;
            $kegiatan_maret_ini = 0;
            $kegiatan_april_ini = 0;
            $kegiatan_mei_ini = 0;
            $kegiatan_juni_ini = 0;
            $kegiatan_juli_ini = 0;
            $kegiatan_agustus_ini = 0;
            $kegiatan_september_ini = 0;
            $kegiatan_oktober_ini = 0;
            $kegiatan_november_ini = 0;
            $kegiatan_desember_ini = 0;
        }


        if ($januari != null) {
            foreach ($januari as $hitung_kegiatan) {
                $kegiatan_januari = $hitung_kegiatan['uraian_kegiatan'];
                $data_januari = json_decode($kegiatan_januari);
                $list_uraian_januari[] = $data_januari->uraian;
            }
            $kegiatan_januari_ini = 0;
            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_januari); $hitung_kegiatan++) {
                $kegiatan_januari_ini = $kegiatan_januari_ini + count($list_uraian_januari[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_januari_ini = 0;
        }
        if ($februari != null) {
            foreach ($februari as $hitung_kegiatan) {
                $kegiatan_februari = $hitung_kegiatan['uraian_kegiatan'];
                $data_februari = json_decode($kegiatan_februari);
                $list_uraian_februari[] = $data_februari->uraian;
            }
            $kegiatan_februari_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_februari); $hitung_kegiatan++) {
                $kegiatan_februari_ini = $kegiatan_februari_ini + count($list_uraian_februari[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_februari_ini = 0;
        }
        if ($maret != null) {
            foreach ($maret as $hitung_kegiatan) {
                $kegiatan_maret = $hitung_kegiatan['uraian_kegiatan'];
                $data_maret = json_decode($kegiatan_maret);
                $list_uraian_maret[] = $data_maret->uraian;
            }
            $kegiatan_maret_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_maret); $hitung_kegiatan++) {
                $kegiatan_maret_ini = $kegiatan_maret_ini + count($list_uraian_maret[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_maret_ini = 0;
        }
        if ($april != null) {
            foreach ($april as $hitung_kegiatan) {
                $kegiatan_april = $hitung_kegiatan['uraian_kegiatan'];
                $data_april = json_decode($kegiatan_april);
                $list_uraian_april[] = $data_april->uraian;
            }
            $kegiatan_april_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_april); $hitung_kegiatan++) {
                $kegiatan_april_ini = $kegiatan_april_ini + count($list_uraian_april[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_april_ini = 0;
        }
        if ($mei != null) {
            foreach ($mei as $hitung_kegiatan) {
                $kegiatan_mei = $hitung_kegiatan['uraian_kegiatan'];
                $data_mei = json_decode($kegiatan_mei);
                $list_uraian_mei[] = $data_mei->uraian;
            }
            $kegiatan_mei_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_mei); $hitung_kegiatan++) {
                $kegiatan_mei_ini = $kegiatan_mei_ini + count($list_uraian_mei[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_mei_ini = 0;
        }
        if ($juni != null) {
            foreach ($juni as $hitung_kegiatan) {
                $kegiatan_juni = $hitung_kegiatan['uraian_kegiatan'];
                $data_juni = json_decode($kegiatan_juni);
                $list_uraian_juni[] = $data_juni->uraian;
            }
            $kegiatan_juni_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_juni); $hitung_kegiatan++) {
                $kegiatan_juni_ini = $kegiatan_juni_ini + count($list_uraian_juni[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_juni_ini = 0;
        }
        if ($juli != null) {
            foreach ($juli as $hitung_kegiatan) {
                $kegiatan_juli = $hitung_kegiatan['uraian_kegiatan'];
                $data_juli = json_decode($kegiatan_juli);
                $list_uraian_juli[] = $data_juli->uraian;
            }
            $kegiatan_juli_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_juli); $hitung_kegiatan++) {
                $kegiatan_juli_ini = $kegiatan_juli_ini + count($list_uraian_juli[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_juli_ini = 0;
        }
        if ($agustus != null) {
            foreach ($agustus as $hitung_kegiatan) {
                $kegiatan_agustus = $hitung_kegiatan['uraian_kegiatan'];
                $data_agustus = json_decode($kegiatan_agustus);
                $list_uraian_agustus[] = $data_agustus->uraian;
            }
            $kegiatan_agustus_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_agustus); $hitung_kegiatan++) {
                $kegiatan_agustus_ini = $kegiatan_agustus_ini + count($list_uraian_agustus[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_agustus_ini = 0;
        }
        if ($september != null) {
            foreach ($september as $hitung_kegiatan) {
                $kegiatan_september = $hitung_kegiatan['uraian_kegiatan'];
                $data_september = json_decode($kegiatan_september);
                $list_uraian_september[] = $data_september->uraian;
            }
            $kegiatan_september_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_september); $hitung_kegiatan++) {
                $kegiatan_september_ini = $kegiatan_september_ini + count($list_uraian_september[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_september_ini = 0;
        }
        if ($oktober != null) {
            foreach ($oktober as $hitung_kegiatan) {
                $kegiatan_oktober = $hitung_kegiatan['uraian_kegiatan'];
                $data_oktober = json_decode($kegiatan_oktober);
                $list_uraian_oktober[] = $data_oktober->uraian;
            }
            $kegiatan_oktober_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_oktober); $hitung_kegiatan++) {
                $kegiatan_oktober_ini = $kegiatan_oktober_ini + count($list_uraian_oktober[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_oktober_ini = 0;
        }
        if ($november != null) {
            foreach ($november as $hitung_kegiatan) {
                $kegiatan_november = $hitung_kegiatan['uraian_kegiatan'];
                $data_november = json_decode($kegiatan_november);
                $list_uraian_november[] = $data_november->uraian;
            }
            $kegiatan_november_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_november); $hitung_kegiatan++) {
                $kegiatan_november_ini = $kegiatan_november_ini + count($list_uraian_november[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_november_ini = 0;
        }
        if ($desember != null) {
            foreach ($desember as $hitung_kegiatan) {
                $kegiatan_desember = $hitung_kegiatan['uraian_kegiatan'];
                $data_desember = json_decode($kegiatan_desember);
                $list_uraian_desember[] = $data_desember->uraian;
            }
            $kegiatan_desember_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_desember); $hitung_kegiatan++) {
                $kegiatan_desember_ini = $kegiatan_desember_ini + count($list_uraian_desember[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_desember_ini = 0;
        }


        if (date('m') == "01") {
            $namaBulan = 'Januari';
        } elseif (date('m') == "02") {
            $namaBulan = 'Maret';
        } elseif (date('m') == "03") {
            $namaBulan = 'Maret';
        } elseif (date('m') == "04") {
            $namaBulan = 'April';
        } elseif (date('m') == "05") {
            $namaBulan = 'Mei';
        } elseif (date('m') == "06") {
            $namaBulan = 'Juni';
        } elseif (date('m') == "07") {
            $namaBulan = 'Juli';
        } elseif (date('m') == "08") {
            $namaBulan = 'Agustus';
        } elseif (date('m') == "09") {
            $namaBulan = 'September';
        } elseif (date('m') == "10") {
            $namaBulan = 'Oktober';
        } elseif (date('m') == "11") {
            $namaBulan = 'November';
        } else {
            $namaBulan = 'Desember';
        }



        $data = [
            'title' => 'Dashboard',
            'menu' => 'Dashboard',
            'subMenu' => '',
            'events' => $events_json,
            'list_satuan' => $this->masterSatuanModel->getAll(),
            'total_laporan' => count($total_laporan),
            'total_kegiatan_bulan_ini' => $kegiatan_bulan_ini,
            'jumlah_user' => count($list_user),
            'modal_detail' => '',
            'laporan_harian_tertentu' => NULL,
            'laporan_bulan_ini' => $laporan_bulan_ini,
            'nama_bulan' => $namaBulan,
            'jumlah_kegiatan_tahun_ini' => $kegiatan_tahun_ini,
            'total_januari' => $kegiatan_januari_ini,
            'total_februari' => $kegiatan_februari_ini,
            'total_maret' => $kegiatan_maret_ini,
            'total_april' => $kegiatan_april_ini,
            'total_mei' => $kegiatan_mei_ini,
            'total_juni' => $kegiatan_juni_ini,
            'total_juli' => $kegiatan_juli_ini,
            'total_agustus' => $kegiatan_agustus_ini,
            'total_september' => $kegiatan_september_ini,
            'total_oktober' => $kegiatan_oktober_ini,
            'total_november' => $kegiatan_november_ini,
            'total_desember' => $kegiatan_desember_ini,
            'list_full_laporan_harian' =>  $this->masterLaporanHarianModel->getTotalByUser(session('user_id')),

        ];
        //dd($data);
        return view('Dashboard/index', $data);
    }

    public function showDetailLaporanHarianOnDashboard($laporan_id)
    {
        $event_data = $this->masterLaporanHarianModel->getAll(session('user_id'));
        $list_user = $this->masterUserModel->getAllUser();

        if ($event_data != NULL) {
            foreach ($event_data as $row) {
                $events[] = array(
                    'link' => base_url('/showDetailLaporanHarianOnDashboard/' . $row['id']),
                    'tgl' => $row['tgl_kegiatan']
                );
            }
            $events_json = json_encode($events);
        } else {
            $events[] = array('');
            $events_json = json_encode($events);
        }


        $total_laporan = $this->masterLaporanHarianModel->getTotalByUser(session('user_id'));
        $januari = [];
        $februari = [];
        $maret = [];
        $april = [];
        $april = [];
        $mei = [];
        $juni = [];
        $juli = [];
        $agustus = [];
        $september = [];
        $oktober = [];
        $november = [];
        $desember = [];

        if ($total_laporan != NULL) {
            for ($i = 0; $i < count($total_laporan); $i++) {
                $data = explode('-', $total_laporan[$i]['tgl_kegiatan']);
                $bulan[] = $data[1];
                if ($bulan[$i] == date('m')) {
                    $laporan_bulan_ini[] = $total_laporan[$i];
                }
            }


            foreach ($laporan_bulan_ini as $bulan) {
                $laporan = $bulan['uraian_kegiatan'];
                $data = json_decode($laporan);
                $list_uraian[] = $data->uraian;
            }

            $kegiatan_bulan_ini = 0;

            for ($i = 0; $i < count($list_uraian); $i++) {
                $kegiatan_bulan_ini = $kegiatan_bulan_ini + count($list_uraian[$i]);
            }
            //untuk kebutuhan chart
            for ($i = 0; $i < count($total_laporan); $i++) {
                $data = explode('-', $total_laporan[$i]['tgl_kegiatan']);
                $tahun[] = $data[0];
                if ($tahun[$i] == date('Y')) {
                    $laporan_tahun_ini[] = $total_laporan[$i];
                }
            }
            $kegiatan_tahun_ini = 0;

            for ($i = 0; $i < count($list_uraian); $i++) {
                $kegiatan_tahun_ini = $kegiatan_tahun_ini + count($list_uraian[$i]);
            }




            for ($i = 0; $i < count($total_laporan); $i++) {
                $data = explode('-', $total_laporan[$i]['tgl_kegiatan']);
                $bulan[] = $data[1];
                $tahun[] = $data[0];

                if ($bulan[$i] == '01' && $tahun[$i] == date('Y')) {
                    $januari[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '02' && $tahun[$i] == date('Y')) {
                    $februari[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '03' && $tahun[$i] == date('Y')) {
                    $maret[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '04' && $tahun[$i] == date('Y')) {
                    $april[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '05' && $tahun[$i] == date('Y')) {
                    $mei[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '06' && $tahun[$i] == date('Y')) {
                    $juni[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '07' && $tahun[$i] == date('Y')) {
                    $juli[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '08' && $tahun[$i] == date('Y')) {
                    $agustus[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '09' && $tahun[$i] == date('Y')) {
                    $september[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '10' && $tahun[$i] == date('Y')) {
                    $oktober[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '11' && $tahun[$i] == date('Y')) {
                    $november[] = $total_laporan[$i];
                } elseif ($bulan[$i] == '12' && $tahun[$i] == date('Y')) {
                    $desember[] = $total_laporan[$i];
                }
            }
        } else {
            $laporan_bulan_ini = null;
            $kegiatan_bulan_ini = 0;
            $kegiatan_tahun_ini = 0;
            $kegiatan_januari_ini = 0;
            $kegiatan_februari_ini = 0;
            $kegiatan_maret_ini = 0;
            $kegiatan_april_ini = 0;
            $kegiatan_mei_ini = 0;
            $kegiatan_juni_ini = 0;
            $kegiatan_juli_ini = 0;
            $kegiatan_agustus_ini = 0;
            $kegiatan_september_ini = 0;
            $kegiatan_oktober_ini = 0;
            $kegiatan_november_ini = 0;
            $kegiatan_desember_ini = 0;
        }


        if ($januari != null) {
            foreach ($januari as $hitung_kegiatan) {
                $kegiatan_januari = $hitung_kegiatan['uraian_kegiatan'];
                $data_januari = json_decode($kegiatan_januari);
                $list_uraian_januari[] = $data_januari->uraian;
            }
            $kegiatan_januari_ini = 0;
            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_januari); $hitung_kegiatan++) {
                $kegiatan_januari_ini = $kegiatan_januari_ini + count($list_uraian_januari[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_januari_ini = 0;
        }
        if ($februari != null) {
            foreach ($februari as $hitung_kegiatan) {
                $kegiatan_februari = $hitung_kegiatan['uraian_kegiatan'];
                $data_februari = json_decode($kegiatan_februari);
                $list_uraian_februari[] = $data_februari->uraian;
            }
            $kegiatan_februari_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_februari); $hitung_kegiatan++) {
                $kegiatan_februari_ini = $kegiatan_februari_ini + count($list_uraian_februari[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_februari_ini = 0;
        }
        if ($maret != null) {
            foreach ($maret as $hitung_kegiatan) {
                $kegiatan_maret = $hitung_kegiatan['uraian_kegiatan'];
                $data_maret = json_decode($kegiatan_maret);
                $list_uraian_maret[] = $data_maret->uraian;
            }
            $kegiatan_maret_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_maret); $hitung_kegiatan++) {
                $kegiatan_maret_ini = $kegiatan_maret_ini + count($list_uraian_maret[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_maret_ini = 0;
        }
        if ($april != null) {
            foreach ($april as $hitung_kegiatan) {
                $kegiatan_april = $hitung_kegiatan['uraian_kegiatan'];
                $data_april = json_decode($kegiatan_april);
                $list_uraian_april[] = $data_april->uraian;
            }
            $kegiatan_april_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_april); $hitung_kegiatan++) {
                $kegiatan_april_ini = $kegiatan_april_ini + count($list_uraian_april[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_april_ini = 0;
        }
        if ($mei != null) {
            foreach ($mei as $hitung_kegiatan) {
                $kegiatan_mei = $hitung_kegiatan['uraian_kegiatan'];
                $data_mei = json_decode($kegiatan_mei);
                $list_uraian_mei[] = $data_mei->uraian;
            }
            $kegiatan_mei_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_mei); $hitung_kegiatan++) {
                $kegiatan_mei_ini = $kegiatan_mei_ini + count($list_uraian_mei[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_mei_ini = 0;
        }
        if ($juni != null) {
            foreach ($juni as $hitung_kegiatan) {
                $kegiatan_juni = $hitung_kegiatan['uraian_kegiatan'];
                $data_juni = json_decode($kegiatan_juni);
                $list_uraian_juni[] = $data_juni->uraian;
            }
            $kegiatan_juni_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_juni); $hitung_kegiatan++) {
                $kegiatan_juni_ini = $kegiatan_juni_ini + count($list_uraian_juni[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_juni_ini = 0;
        }
        if ($juli != null) {
            foreach ($juli as $hitung_kegiatan) {
                $kegiatan_juli = $hitung_kegiatan['uraian_kegiatan'];
                $data_juli = json_decode($kegiatan_juli);
                $list_uraian_juli[] = $data_juli->uraian;
            }
            $kegiatan_juli_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_juli); $hitung_kegiatan++) {
                $kegiatan_juli_ini = $kegiatan_juli_ini + count($list_uraian_juli[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_juli_ini = 0;
        }
        if ($agustus != null) {
            foreach ($agustus as $hitung_kegiatan) {
                $kegiatan_agustus = $hitung_kegiatan['uraian_kegiatan'];
                $data_agustus = json_decode($kegiatan_agustus);
                $list_uraian_agustus[] = $data_agustus->uraian;
            }
            $kegiatan_agustus_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_agustus); $hitung_kegiatan++) {
                $kegiatan_agustus_ini = $kegiatan_agustus_ini + count($list_uraian_agustus[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_agustus_ini = 0;
        }
        if ($september != null) {
            foreach ($september as $hitung_kegiatan) {
                $kegiatan_september = $hitung_kegiatan['uraian_kegiatan'];
                $data_september = json_decode($kegiatan_september);
                $list_uraian_september[] = $data_september->uraian;
            }
            $kegiatan_september_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_september); $hitung_kegiatan++) {
                $kegiatan_september_ini = $kegiatan_september_ini + count($list_uraian_september[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_september_ini = 0;
        }
        if ($oktober != null) {
            foreach ($oktober as $hitung_kegiatan) {
                $kegiatan_oktober = $hitung_kegiatan['uraian_kegiatan'];
                $data_oktober = json_decode($kegiatan_oktober);
                $list_uraian_oktober[] = $data_oktober->uraian;
            }
            $kegiatan_oktober_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_oktober); $hitung_kegiatan++) {
                $kegiatan_oktober_ini = $kegiatan_oktober_ini + count($list_uraian_oktober[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_oktober_ini = 0;
        }
        if ($november != null) {
            foreach ($november as $hitung_kegiatan) {
                $kegiatan_november = $hitung_kegiatan['uraian_kegiatan'];
                $data_november = json_decode($kegiatan_november);
                $list_uraian_november[] = $data_november->uraian;
            }
            $kegiatan_november_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_november); $hitung_kegiatan++) {
                $kegiatan_november_ini = $kegiatan_november_ini + count($list_uraian_november[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_november_ini = 0;
        }
        if ($desember != null) {
            foreach ($desember as $hitung_kegiatan) {
                $kegiatan_desember = $hitung_kegiatan['uraian_kegiatan'];
                $data_desember = json_decode($kegiatan_desember);
                $list_uraian_desember[] = $data_desember->uraian;
            }
            $kegiatan_desember_ini = 0;

            for ($hitung_kegiatan = 0; $hitung_kegiatan < count($list_uraian_desember); $hitung_kegiatan++) {
                $kegiatan_desember_ini = $kegiatan_desember_ini + count($list_uraian_desember[$hitung_kegiatan]);
            }
        } else {
            $kegiatan_desember_ini = 0;
        }


        if (date('m') == "01") {
            $namaBulan = 'Januari';
        } elseif (date('m') == "02") {
            $namaBulan = 'Maret';
        } elseif (date('m') == "03") {
            $namaBulan = 'Maret';
        } elseif (date('m') == "04") {
            $namaBulan = 'April';
        } elseif (date('m') == "05") {
            $namaBulan = 'Mei';
        } elseif (date('m') == "06") {
            $namaBulan = 'Juni';
        } elseif (date('m') == "07") {
            $namaBulan = 'Juli';
        } elseif (date('m') == "08") {
            $namaBulan = 'Agustus';
        } elseif (date('m') == "09") {
            $namaBulan = 'September';
        } elseif (date('m') == "10") {
            $namaBulan = 'Oktober';
        } elseif (date('m') == "11") {
            $namaBulan = 'November';
        } else {
            $namaBulan = 'Desember';
        }






        $all_year = $this->masterLaporanHarianModel->getAllYear(session('user_id'));
        if ($all_year != NULL) {
            for ($i = 0; $i < count($all_year); $i++) {
                $data = explode('-', $all_year[$i]['tgl_kegiatan']);
                $tahun[] = $data[0];
            }
        } else {
            $tahun = NULL;
        }
        if ($tahun != NULL) {
            $tahun_tersedia[] = $tahun[0];
            for ($i = 1; $i < count($tahun); $i++) {
                if ($tahun[$i - 1] != $tahun[$i]) {
                    $tahun_tersedia[] = $tahun[$i];
                };
            }
        } else {
            $tahun_tersedia = NULL;
        }


        $total = $this->masterLaporanHarianModel->getTotalByUser(session('user_id'));
        $itemsCount = 10;

        $tanggal_input_terakhir = $total[count($total) - 1]['tgl_kegiatan'];




        $data = [
            'title' => 'Dashboard',
            'menu' => 'Dashboard',
            'subMenu' => '',
            'total' => count($total),
            'list_laporan_harian' => $this->masterLaporanHarianModel->getAllByUser(session('user_id'))->paginate($itemsCount, 'list_laporan_harian'),
            'pager' => $this->masterLaporanHarianModel->getAllByUser(session('user_id'))->pager,
            'itemsCount' => $itemsCount,
            'laporan_harian_tertentu' => $this->masterLaporanHarianModel->getLaporan(session('user_id'), $laporan_id),
            'list_satuan' => $this->masterSatuanModel->getAll(),
            'modal_edit' => '',
            'modal_detail' => 'modal-detail',
            'tanggal_input_terakhir' => $tanggal_input_terakhir,
            'events' => $events_json,
            'list_satuan' => $this->masterSatuanModel->getAll(),
            'total_laporan' => count($total_laporan),
            'total_kegiatan_bulan_ini' => $kegiatan_bulan_ini,
            'jumlah_user' => count($list_user),
            'tahun_tersedia' => $tahun_tersedia,
            'laporan_bulan_ini' => $laporan_bulan_ini,
            'nama_bulan' => $namaBulan,
            'jumlah_kegiatan_tahun_ini' => $kegiatan_tahun_ini,
            'total_januari' => $kegiatan_januari_ini,
            'total_februari' => $kegiatan_februari_ini,
            'total_maret' => $kegiatan_maret_ini,
            'total_april' => $kegiatan_april_ini,
            'total_mei' => $kegiatan_mei_ini,
            'total_juni' => $kegiatan_juni_ini,
            'total_juli' => $kegiatan_juli_ini,
            'total_agustus' => $kegiatan_agustus_ini,
            'total_september' => $kegiatan_september_ini,
            'total_oktober' => $kegiatan_oktober_ini,
            'total_november' => $kegiatan_november_ini,
            'total_desember' => $kegiatan_desember_ini,
            'list_full_laporan_harian' =>  $this->masterLaporanHarianModel->getTotalByUser(session('user_id')),

        ];
        // dd($data);
        return view('Dashboard/index', $data);
    }

    public function dataPegawai()
    {

        $data = [
            'subMenu' => '',
            'menu' => 'Dashboard',
            'title' => 'Data Pegawai',
        ];
        return view('Dashboard/dataPegawai', $data);
    }
}
