<?php

namespace App\Controllers;

use App\Models\MasterSatkerModel;
use CodeIgniter\HTTP\Request;

class masterBerita extends BaseController
{
    protected $masterSatkerModel;

    public function __construct()
    {
        $this->masterSatkerModel = new masterSatkerModel();
    }

    public function entryBerita()
    {
        $data = [
            'title' => 'Entry Berita',
            'menu' => 'Berita',
            'subMenu' => 'Entry Berita',

        ];
        return view('Berita/entryBerita', $data);
    }
    public function tambahBerita()
    {
        $list_satker = $this->masterSatkerModel->getAllSatker();

        $data = [
            'title' => 'Tambah Berita',
            'menu' => 'Berita',
            'subMenu' => 'Entry Berita',
            'list_satker' => $list_satker
        ];
        return view('Berita/tambahBerita', $data);
    }

    public function uploadBerita()
    {
        $user = session('data_user');
        $user_id = $user['id'];
        $username = $user['username'];
        $judul = $this->request->getVar('judul');
        $file_berita = $this->request->getFile('file_berita');
        $kd_satker = $this->request->getVar('satker');
        $nama_satker = $this->masterSatkerModel->getNamaSatker($kd_satker);

        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('d-m-Y');
        $jam = date('h:i:s');


        if ($file_berita->getError() != 4) {
            $nama_file = $tanggal . '_' . $jam . '_' . $kd_satker . '_' . $username;
            $file_berita->move('/berkas/draft', $nama_file);
        }
    }
}
