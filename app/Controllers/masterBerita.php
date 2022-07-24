<?php

namespace App\Controllers;

use App\Models\MasterSatkerModel;
use App\Models\MasterBeritaModel;
use CodeIgniter\HTTP\Request;
use CodeIgniter\Session\Session;
use PHPUnit\Framework\Test;
use Config\Validation;

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
        $list_berita = $this->masterBeritaModel->getAllBerita();
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
            'validation' => \Config\Services::validation(),
            'subMenu' => 'Entry Berita',
            'list_satker' => $list_satker
        ];
        return view('Berita/tambahBerita', $data);
    }

    public function uploadBerita()
    {
        //validation
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul berita harus diisi',
                ]
            ],
            'file_berita' => [
                'rules' => 'max_size[file_berita,258]|ext_in[file_berita,doc,docx]',
                'errors' => [
                    'max_size' => 'Ukuran maksimal file adalah 250Kb',
                    'ext_in' => 'Jenis File yang diterima hanya doc & docx',
                ]
            ],
            'foto_berita1' => [
                'rules' => 'max_size[foto_berita1,512]|ext_in[foto_berita1,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran maksimal foto adalah 500Kb',
                    'ext_in' => 'Jenis Foto yang diterima hanya jpg/jpeg/png',
                ]
            ],
            'foto_berita2' => [
                'rules' => 'max_size[foto_berita2,512]|ext_in[foto_berita2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran maksimal foto adalah 500Kb',
                    'ext_in' => 'Jenis Foto yang diterima hanya jpg/jpeg/png',
                ]
            ],
            'foto_berita3' => [
                'rules' => 'max_size[foto_berita3,512]|ext_in[foto_berita3,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran maksimal foto adalah 500Kb',
                    'ext_in' => 'Jenis Foto yang diterima hanya jpg/jpeg/png',
                ]
            ],
            'nama_penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama penulis harus diisi',
                ]
            ],
            'satker' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Satuan Kerja',
                ]
            ]
        ])) {
            return redirect()->to('/tambahBerita')->withInput();
        }



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
        $image_upload = [];

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

        if ($image_upload != NULL) {
            $all_image = array('image' => $image_upload);
            $json_image = json_encode($all_image);
        } else {
            $json_image = '';
        }


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


    public function editBerita($id_berita)
    {

        $data_berita = $this->masterBeritaModel->getBeritaById($id_berita);
        $list_satker = $this->masterSatkerModel->getAllSatker();
        $data = [
            'title' => 'Edit Berita',
            'menu' => 'Berita',
            'subMenu' => 'Entry Berita',
            'validation' => \Config\Services::validation(),
            'list_satker' => $list_satker,
            'berita' => $data_berita

        ];
        return view('Berita/editBerita', $data);
    }

    public function updateBerita()
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
        $image_upload = [];


        $id_berita = $this->request->getVar('id_berita');
        $file_berita = $this->request->getFile('file_berita');
        if ($file_berita->getError() == 4) {
            $nama_file = $this->request->getVar('file_berita_lama');
        } else {
            unlink('berkas/draft/' .  $this->request->getVar('file_berita_lama'));
            $ekstensi_file = $file_berita->getExtension();
            $nama_file = ($kd_satker . '_' . $username . '_'   . $tanggal . '_' . $jam . '.' . $ekstensi_file);
            $file_berita->move('berkas/draft', $nama_file);
        }

        if ($foto_berita1->getError() != 4) {
            if ($this->request->getVar('foto_berita1_lama') != 'Foto 1') {
                unlink('berkas/foto/' . $this->request->getVar('foto_berita1_lama'));
            }
            $ekstensi_foto = $foto_berita1->getExtension();
            $nama_foto_1 = ($kd_satker . '_' . $username . '_'   . $tanggal . '_' . $jam . '_foto-ke-1.' . $ekstensi_foto);
            $foto_berita1->move('berkas/foto', $nama_foto_1);
            $image_upload[] = $nama_foto_1;
        } else {
            if ($this->request->getVar('foto_berita1_lama') != 'Foto 1') {
                $image_upload[] = $this->request->getVar('foto_berita1_lama');
            }
        }

        if ($foto_berita2->getError() != 4) {
            if ($this->request->getVar('foto_berita2_lama') != 'Foto 2') {
                unlink('berkas/foto/' . $this->request->getVar('foto_berita2_lama'));
            }
            $ekstensi_foto = $foto_berita2->getExtension();
            $nama_foto_2 = ($kd_satker . '_' . $username . '_'   . $tanggal . '_' . $jam . '_foto-ke-2.' . $ekstensi_foto);
            $foto_berita2->move('berkas/foto', $nama_foto_2);
            $image_upload[] = $nama_foto_2;
        } else {
            if ($this->request->getVar('foto_berita2_lama') != 'Foto 2') {
                $image_upload[] = $this->request->getVar('foto_berita2_lama');
            }
        }


        if ($foto_berita3->getError() != 4) {
            if ($this->request->getVar('foto_berita3_lama') != 'Foto 3') {
                unlink('berkas/foto/' . $this->request->getVar('foto_berita3_lama'));
            }
            $ekstensi_foto = $foto_berita3->getExtension();
            $nama_foto_3 = ($kd_satker . '_' . $username . '_'   . $tanggal . '_' . $jam . '_foto-ke-3.' . $ekstensi_foto);
            $foto_berita3->move('berkas/foto', $nama_foto_3);
            $image_upload[] = $nama_foto_3;
        } else {
            if ($this->request->getVar('foto_berita3_lama') != 'Foto 3') {
                $image_upload[] = $this->request->getVar('foto_berita3_lama');
            }
        }

        if ($image_upload != NULL) {
            $all_image = array('image' => $image_upload);
            $json_image = json_encode($all_image);
        } else {
            $json_image = '';
        }


        $this->masterBeritaModel->save([
            'id' => $id_berita,
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
    public function reviewBerita()
    {
        $list_berita_all = $this->masterBeritaModel->getAllBerita();



        $data = [
            'title' => 'Review Berita',
            'menu' => 'Berita',
            'subMenu' => 'Review Berita',


        ];
        return view('Berita/reviewBerita', $data);
    }
}
