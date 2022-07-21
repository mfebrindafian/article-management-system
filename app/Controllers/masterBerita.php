<?php

namespace App\Controllers;

use App\Models\MasterSatkerModel;
use App\Models\MasterBeritaModel;
use CodeIgniter\HTTP\Request;
use CodeIgniter\Session\Session;
use PHPUnit\Framework\Test;

class masterBerita extends BaseController
{
    protected $masterSatkerModel;
    protected $masterBeritaModel;

    public function __construct()
    {
        $this->masterSatkerModel = new masterSatkerModel();
        $this->masterBeritaModel = new masterBeritaModel();
    }

    public function entryBerita()
    {
        $list_berita = $this->masterBeritaModel->getAllBeritaByPenulis(session('user_id'));
        $list_satker = $this->masterSatkerModel->getAllSatker();
        $data = [
            'title' => 'Entry Berita',
            'menu' => 'Berita',
            'subMenu' => 'Entry Berita',
            'list_berita' => $list_berita,
            'list_satker' => $list_satker

        ];
        // dd($list_berita);
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
        $foto_berita1 = $this->request->getFile('foto_berita1');
        $foto_berita2 = $this->request->getFile('foto_berita2');
        $foto_berita3 = $this->request->getFile('foto_berita3');
        $kd_satker = $this->request->getVar('satker');
        $penulis = $this->request->getVar('nama_penulis');

        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('d-m-Y');
        $jam = date('h-i-s');


        if ($foto_berita1->getError() != 4) {
            $ekstensi_foto = $foto_berita1->getExtension();
            $nama_foto_1 = ($kd_satker . '_' . $username . '_'   . $tanggal . '_' . $jam . '_foto-ke-1.' . $ekstensi_foto);
            $foto_berita1->move('berkas/foto', $nama_foto_1);
            $image_upload[] = $nama_foto_1;
        }
        if ($foto_berita2->getError() != 4) {
            $ekstensi_foto = $foto_berita2->getExtension();

            $nama_foto_2 = ($kd_satker . '_' . $username . '_'   . $tanggal . '_' . $jam . '_foto-ke-2.' . $ekstensi_foto);
            $foto_berita2->move('berkas/foto', $nama_foto_2);
            $image_upload[] = $nama_foto_2;
        }
        if ($foto_berita3->getError() != 4) {
            $ekstensi_foto = $foto_berita3->getExtension();
            $nama_foto_3 = ($kd_satker . '_' . $username . '_'   . $tanggal . '_' . $jam . '_foto-ke-3.' . $ekstensi_foto);
            $foto_berita3->move('berkas/foto', $nama_foto_3);
            $image_upload[] = $nama_foto_3;
        }



        $ekstensi_file = $file_berita->getExtension();
        $nama_file = ($kd_satker . '_' . $username . '_'   . $tanggal . '_' . $jam . '.' . $ekstensi_file);
        $file_berita->move('berkas/draft', $nama_file);


        $all_image = array('image' => $image_upload);
        $json_image = json_encode($all_image);

        $this->masterBeritaModel->save([
            'user_id' => $user_id,
            'judul_berita' => $judul,
            'penulis' => $penulis,
            'satker_kd' => $kd_satker,
            'tgl_upload' => date("Y-m-d h:i:s"),
            'status_kd' => 1,
            'tgl_publish' => null,
            'link_publish' => '',
            'editor' => null,
            'tgl_mulai_review' => null,
            'tgl_selesai_review' => null,
            'file_draft' => $nama_file,
            'file_review' => null,
            'image_upload' => $json_image
        ]);

        return redirect()->to('/entryBerita');
    }
}
