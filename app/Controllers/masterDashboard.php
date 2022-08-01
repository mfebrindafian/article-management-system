<?php

namespace App\Controllers;


use App\Models\MasterBeritaModel;
use App\Models\MasterSatkerModel;


class masterDashboard extends BaseController
{

    protected $masterDashboardModel;

    protected $masterBeritaModel;
    protected $masterSatkerModel;

    public function __construct()
    {

        $this->masterBeritaModel = new masterBeritaModel();
        $this->masterSatkerModel = new masterSatkerModel();
    }

    public function index()
    {
        $list_satker = $this->masterSatkerModel->getAllSatker();
        $no = 0;

        foreach ($list_satker as $satker) {
            $total_berita_satker[$no] = $this->masterBeritaModel->getAllBeritaBySatker($satker['kd_satker']);
            $no++;
        }

        $jml_bulan_satker = [];
        for ($i = 0; $i < count($total_berita_satker); $i++) {
            if (count($total_berita_satker[$i]) != 0) {
                for ($a = 0; $a < count($total_berita_satker[$i]); $a++) {
                    $data = explode('-', $total_berita_satker[$i][$a]['tgl_upload']);
                    $bulan = $data[1];

                    if ($bulan == date('m')) {
                        $laporan_bulan_satker[$i][] = $total_berita_satker[$i][$a];
                        $jml_bulan_satker[$i] = count($laporan_bulan_satker[$i]);
                    } else {
                        $jml_bulan_satker[$i] = 0;
                    }
                }
            } else {
                $jml_bulan_satker[$i] = 0;
            }
        }

        $jml_tahun_satker = [];
        for ($i = 0; $i < count($total_berita_satker); $i++) {
            if (count($total_berita_satker[$i]) != 0) {
                for ($a = 0; $a < count($total_berita_satker[$i]); $a++) {
                    $data = explode('-', $total_berita_satker[$i][$a]['tgl_upload']);
                    $tahun = $data[0];
                    if ($tahun == date('Y')) {
                        $laporan_tahun_satker[$i][] = $total_berita_satker[$i][$a];
                        $jml_tahun_satker[$i] = count($laporan_tahun_satker[$i]);
                    } else {
                        $jml_tahun_satker[$i] = 0;
                    }
                }
            } else {
                $jml_tahun_satker[$i] = 0;
            }
        }
        // dd($jml_tahun_satker);

        $list_berita_all = $this->masterBeritaModel->getAllBerita();
        $list_berita_publish = [];



        foreach ($list_berita_all as $berita) {
            if ($berita['status_kd'] == "3") {
                $list_berita_publish[] =  $berita;
            }
        }

        $data = [
            'title' => 'Dashboard',
            'menu' => 'Dashboard',
            'subMenu' => '',
            'list_satker' => $list_satker,
            'bulan_satker' => $jml_bulan_satker,
            'tahun_satker' => $jml_tahun_satker,
            'berita_publish' => $list_berita_publish,
        ];
        //dd($data);

        return view('Dashboard/index', $data);
    }
}
