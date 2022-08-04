<?php

namespace App\Controllers;

use App\Models\MasterSatkerModel;
use App\Models\MasterBeritaModel;
use App\Models\MasterStatusModel;
use App\Models\MasterUserModel;
use CodeIgniter\HTTP\Request;
use CodeIgniter\Session\Session;
use PhpParser\Node\Expr\New_;
use PHPUnit\Framework\Test;

class masterBerita extends BaseController
{
    protected $masterSatkerModel;
    protected $masterBeritaModel;
    protected $masterStatusModel;
    protected $masterUserModel;

    public function __construct()
    {
        $this->masterSatkerModel = new masterSatkerModel();
        $this->masterBeritaModel = new masterBeritaModel();
        $this->masterStatusModel = new masterStatusModel();
        $this->masterUserModel = new masterUserModel();
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
        $jam = date('H-i-s');
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
        session()->setFlashdata('pesan', 'Berita baru berhasil ditambahkan');
        session()->setFlashdata('icon', 'success');
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
        session()->setFlashdata('pesan', 'Berita berhasil di update');
        session()->setFlashdata('icon', 'success');
        return redirect()->to('/entryBerita');
    }
    public function reviewBerita()
    {
        $keyword_semua = $this->request->getVar('keyword_semua');
        if ($keyword_semua) {
            $berita_semua_search = $keyword_semua;
        } else {
            $berita_semua_search = '';
        }
        $keyword_ready = $this->request->getVar('keyword_ready');
        if ($keyword_ready) {
            $berita_ready_search = $keyword_ready;
        } else {
            $berita_ready_search = '';
        }
        $keyword_review = $this->request->getVar('keyword_review');
        if ($keyword_review) {
            $berita_review_search = $keyword_review;
        } else {
            $berita_review_search = '';
        }
        $keyword_publish = $this->request->getVar('keyword_publish');
        if ($keyword_publish) {
            $berita_publish_search = $keyword_publish;
        } else {
            $berita_publish_search = '';
        }

        $list_status = $this->masterStatusModel->getListStatus();
        $list_satker = $this->masterSatkerModel->getAllSatker();
        $itemsCount = 10;
        $this->masterBeritaModelSemua = new MasterBeritaModel();
        $this->masterBeritaModelUpload = new MasterBeritaModel();
        $this->masterBeritaModelReview = new MasterBeritaModel();
        $this->masterBeritaModelSiapPublish = new MasterBeritaModel();
        $data = [
            'title' => 'Review Berita',
            'menu' => 'Berita',
            'subMenu' => 'Review Berita',
            'berita_semua' => $this->masterBeritaModelSemua->getReviewBerita($berita_semua_search)->paginate($itemsCount, 'semua'),
            'berita_upload' => $this->masterBeritaModelUpload->getReviewBeritaUpload($berita_ready_search)->paginate($itemsCount, 'siap'),
            'berita_review' => $this->masterBeritaModelReview->getReviewBeritaReview($berita_review_search)->paginate($itemsCount, 'review'),
            'berita_siap_publish' => $this->masterBeritaModelSiapPublish->getReviewBeritaSiapPublish($berita_publish_search)->paginate($itemsCount, 'siap_publish'),
            'pager1' => $this->masterBeritaModelSemua->getReviewBeritaPager()->pager,
            'pager2' => $this->masterBeritaModelUpload->getReviewBeritaUploadPager()->pager,
            'pager3' => $this->masterBeritaModelReview->getReviewBeritaReviewPager()->pager,
            'pager4' => $this->masterBeritaModelSiapPublish->getReviewBeritaSiapPublishPager()->pager,
            'berita_publish' => $this->masterBeritaModel->getAllBeritaPublish(),
            'list_status' => $list_status,
            'list_satker' => $list_satker,
            'keyword_semua' => $keyword_semua,
            'keyword_ready' => $keyword_ready,
            'keyword_review' => $keyword_review,
            'keyword_publish' => $keyword_publish,
        ];
        // dd($data);
        return view('Berita/reviewBerita', $data);
    }
    public function ubahStatusReview()
    {
        $id_berita = $this->request->getVar('id_berita');
        $data_berita = $this->masterBeritaModel->getBeritaById($id_berita);

        $data_user = session('data_user');

        $this->masterBeritaModel->save([
            'id' => $id_berita,
            'user_id' => $data_berita['user_id'],
            'judul_berita' => $data_berita['judul_berita'],
            'penulis' => $data_berita['penulis'],
            'satker_kd' => $data_berita['satker_kd'],
            'tgl_upload' => $data_berita['tgl_upload'],
            'status_kd' => 2,
            'tgl_publish' => null,
            'link_publish' => '',
            'editor' => $data_user['username'],
            'tgl_mulai_review' => date("Y-m-d h:i:s"),
            'tgl_selesai_review' => null,
            'file_draft' => $data_berita['file_draft'],
            'file_review' => null,
            'image_upload' => $data_berita['image_upload']
        ]);
        session()->setFlashdata('pesan', 'Berhasil! dokumen siap direview');
        session()->setFlashdata('pesan_text', 'Silahkan download dan upload hasil review');
        session()->setFlashdata('icon', 'success');
        return redirect()->to('/reviewBerita');
    }

    public function rejectBeritaByReviewer()
    {
        $id_berita = $this->request->getVar('id_berita_reject');

        $data_berita = $this->masterBeritaModel->getBeritaById($id_berita);

        $data_user = session('data_user');

        $this->masterBeritaModel->save([
            'id' => $id_berita,
            'user_id' => $data_berita['user_id'],
            'judul_berita' => $data_berita['judul_berita'],
            'penulis' => $data_berita['penulis'],
            'satker_kd' => $data_berita['satker_kd'],
            'tgl_upload' => $data_berita['tgl_upload'],
            'status_kd' => 4,
            'tgl_publish' => null,
            'link_publish' => '',
            'editor' => $data_user['username'],
            'tgl_mulai_review' => $data_berita['tgl_mulai_review'],
            'tgl_selesai_review' => date("Y-m-d h:i:s"),
            'file_draft' => $data_berita['file_draft'],
            'file_review' => null,
            'image_upload' => $data_berita['image_upload']
        ]);
        session()->setFlashdata('pesan', 'Berhasil! dokumen telah di tolak');
        session()->setFlashdata('icon', 'success');
        return redirect()->to('/reviewBerita');
    }
    public function cancelBerita()
    {
        $id_berita = $this->request->getVar('id_berita_cancel');

        $data_berita = $this->masterBeritaModel->getBeritaById($id_berita);

        $this->masterBeritaModel->save([
            'id' => $id_berita,
            'user_id' => $data_berita['user_id'],
            'judul_berita' => $data_berita['judul_berita'],
            'penulis' => $data_berita['penulis'],
            'satker_kd' => $data_berita['satker_kd'],
            'tgl_upload' => $data_berita['tgl_upload'],
            'status_kd' => 2,
            'tgl_publish' => null,
            'link_publish' => '',
            'editor' => $data_berita['editor'],
            'tgl_mulai_review' => $data_berita['tgl_mulai_review'],
            'tgl_selesai_review' => null,
            'file_draft' => $data_berita['file_draft'],
            'file_review' =>  $data_berita['file_review'],
            'image_upload' => $data_berita['image_upload']
        ]);
        session()->setFlashdata('pesan', 'Berhasil! dokumen telah di batalkan');
        session()->setFlashdata('icon', 'success');
        return redirect()->to('/reviewBerita');
    }

    public function rejectBeritaByPublisher()
    {
        $id_berita = $this->request->getVar('id_berita_reject');

        $data_berita = $this->masterBeritaModel->getBeritaById($id_berita);

        $this->masterBeritaModel->save([
            'id' => $id_berita,
            'user_id' => $data_berita['user_id'],
            'judul_berita' => $data_berita['judul_berita'],
            'penulis' => $data_berita['penulis'],
            'satker_kd' => $data_berita['satker_kd'],
            'tgl_upload' => $data_berita['tgl_upload'],
            'status_kd' => 2,
            'tgl_publish' => null,
            'link_publish' => '',
            'editor' => $data_berita['editor'],
            'tgl_mulai_review' => $data_berita['tgl_mulai_review'],
            'tgl_selesai_review' => $data_berita['tgl_selesai_review'],
            'file_draft' => $data_berita['file_draft'],
            'file_review' =>  $data_berita['file_review'],
            'image_upload' => $data_berita['image_upload']
        ]);
        session()->setFlashdata('pesan', 'Berhasil! dokumen telah di tolak');
        session()->setFlashdata('icon', 'success');
        return redirect()->to('/publishBerita');
    }

    public function downloadBerita($id_berita)
    {
        $data_berita = $this->masterBeritaModel->getBeritaById($id_berita);
        $file_draft = $data_berita['file_draft'];
        return $this->response->download('berkas/draft/' . $file_draft, null);
    }
    public function downloadBeritaFinal($id_berita)
    {
        $data_berita = $this->masterBeritaModel->getBeritaById($id_berita);
        $file_review = $data_berita['file_review'];
        return $this->response->download('berkas/final/' . $file_review, null);
    }

    public function downloadFoto($nama_foto)
    {
        return $this->response->download('berkas/foto/' . $nama_foto, null);
    }


    public function finalReview($id_berita)
    {
        $data_berita = $this->masterBeritaModel->getBeritaById($id_berita);
        $list_satker = $this->masterSatkerModel->getAllSatker();
        $data = [
            'title' => 'Final Review',
            'menu' => 'Berita',
            'subMenu' => 'Final Review',
            'berita' => $data_berita,
            'list_satker' => $list_satker

        ];

        return view('Berita/finalReview', $data);
    }



    public function uploadHasiReview()
    {
        $file_berita = $this->request->getFile('file_berita');
        $id_berita = $this->request->getVar('id_berita_review');
        $berita_terpilih = $this->masterBeritaModel->getBeritaById($id_berita);
        $user_terpilih = $this->masterUserModel->getProfilUser($berita_terpilih['user_id']);
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('d-m-Y');
        $jam = date('H-i-s');


        if ($file_berita->getError() != 4) {
            $judul_berita = $this->request->getVar('judul_berita');
            $check_foto1 = $this->request->getVar('check_foto1');
            $nama_foto1 = $this->request->getVar('nama_foto1');
            $check_foto2 = $this->request->getVar('check_foto2');
            $nama_foto2 = $this->request->getVar('nama_foto2');
            $check_foto3 = $this->request->getVar('check_foto3');
            $nama_foto3 = $this->request->getVar('nama_foto3');
            $foto_publish = [];



            $foto_berita1 = $this->request->getFile('foto_berita1');
            if ($foto_berita1->getError() != 4) {
                $check_foto1 = null;
                if ($check_foto1 == null) {
                    if ($nama_foto1 != null) {
                        unlink('berkas/foto/' . $nama_foto1);
                    }
                }
                $ekstensi_foto = $foto_berita1->getExtension();
                $nama_foto_1 = ($berita_terpilih['satker_kd'] . '_' . $user_terpilih['username'] . '_'   . $tanggal . '_' . $jam . '_foto-ke-1.' . $ekstensi_foto);
                $foto_berita1->move('berkas/foto', $nama_foto_1);
                $foto_publish[] = $nama_foto_1;
            } elseif ($check_foto1 == 'on') {
                $foto_publish[] = $nama_foto1;
            }


            $foto_berita2 = $this->request->getFile('foto_berita2');
            if ($foto_berita2->getError() != 4) {
                $check_foto2 = null;
                if ($check_foto2 == null) {
                    if ($nama_foto2 != null) {
                        unlink('berkas/foto/' . $nama_foto2);
                    }
                }
                $ekstensi_foto = $foto_berita2->getExtension();
                $nama_foto_2 = ($berita_terpilih['satker_kd'] . '_' . $user_terpilih['username'] . '_'   . $tanggal . '_' . $jam . '_foto-ke-2.' . $ekstensi_foto);
                $foto_berita2->move('berkas/foto', $nama_foto_2);
                $foto_publish[] = $nama_foto_2;
            } elseif ($check_foto2 == 'on') {
                $foto_publish[] = $nama_foto2;
            }


            $foto_berita3 = $this->request->getFile('foto_berita3');
            if ($foto_berita3->getError() != 4) {
                $check_foto3 = null;
                if ($check_foto3 == null) {
                    if ($nama_foto3 != null) {
                        unlink('berkas/foto/' . $nama_foto3);
                    }
                }
                $ekstensi_foto = $foto_berita3->getExtension();
                $nama_foto_3 = ($berita_terpilih['satker_kd'] . '_' . $user_terpilih['username'] . '_'   . $tanggal . '_' . $jam . '_foto-ke-3.' . $ekstensi_foto);
                $foto_berita3->move('berkas/foto', $nama_foto_3);
                $foto_publish[] = $nama_foto_3;
            } elseif ($check_foto3 == 'on') {
                $foto_publish[] = $nama_foto3;
            }



            if ($foto_publish != NULL) {
                $all_image = array('image' => $foto_publish);
                $json_image = json_encode($all_image);
            } else {
                $json_image = '';
            }

            $data_berita = $this->masterBeritaModel->getBeritaById($id_berita);
            $data_user = session('data_user');


            $ekstensi_file = $file_berita->getExtension();
            $nama_file = ($data_berita['satker_kd'] . '_' .  $data_user['username'] . '_'   . $tanggal . '_' . $jam . '.' . $ekstensi_file);
            $file_berita->move('berkas/final', $nama_file);


            $this->masterBeritaModel->save([
                'id' => $id_berita,
                'user_id' => $data_berita['user_id'],
                'judul_berita' => $judul_berita,
                'penulis' => $data_berita['penulis'],
                'satker_kd' => $data_berita['satker_kd'],
                'tgl_upload' => $data_berita['tgl_upload'],
                'status_kd' => 3,
                'tgl_publish' => null,
                'link_publish' => '',
                'editor' => $data_user['username'],
                'tgl_mulai_review' => $data_berita['tgl_mulai_review'],
                'tgl_selesai_review' => date("Y-m-d h:i:s"),
                'file_draft' => $data_berita['file_draft'],
                'file_review' => $nama_file,
                'image_upload' => $json_image
            ]);
            session()->setFlashdata('pesan', 'Upload hasil review berhasil!');
            session()->setFlashdata('pesan_text', 'Berita masuk ketahap siap dipublikasi');
            session()->setFlashdata('icon', 'success');
            return redirect()->to('/reviewBerita');
        } else {
            session()->setFlashdata('pesan', 'File Berita Review Kosong!');
            session()->setFlashdata('icon', 'error');
            return redirect()->to('/finalReview/' . $id_berita);
        }
    }

    public function sendLinkBerita()
    {
        $id_berita = $this->request->getVar('id_berita_link');
        $link_berita = $this->request->getVar('link_berita');
        $data_berita = $this->masterBeritaModel->getBeritaById($id_berita);
        $data_user = session('data_user');

        $this->masterBeritaModel->save([
            'id' => $id_berita,
            'user_id' => $data_berita['user_id'],
            'judul_berita' => $data_berita['judul_berita'],
            'penulis' => $data_berita['penulis'],
            'satker_kd' => $data_berita['satker_kd'],
            'tgl_upload' => $data_berita['tgl_upload'],
            'status_kd' => 3,
            'tgl_publish' => date("Y-m-d h:i:s"),
            'link_publish' => $link_berita,
            'editor' => $data_user['username'],
            'tgl_mulai_review' => $data_berita['tgl_mulai_review'],
            'tgl_selesai_review' => $data_berita['tgl_selesai_review'],
            'file_draft' => $data_berita['file_draft'],
            'file_review' => $data_berita['file_review'],
            'image_upload' => $data_berita['image_upload']
        ]);
        session()->setFlashdata('pesan', 'Berita berhasil terpublikasi');
        session()->setFlashdata('icon', 'success');
        return redirect()->to('/publishBerita');
    }



    public function publishBerita()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $berita_search = $keyword;
        } else {
            $berita_search = '';
        }
        $this->masterBeritaModelSiapPublish = new MasterBeritaModel();
        $list_status = $this->masterStatusModel->getListStatus();
        $list_satker = $this->masterSatkerModel->getAllSatker();
        $list_berita_publish = $this->masterBeritaModel->getAllBeritaPublish();
        $data = [
            'title' => 'Publish Berita',
            'menu' => 'Berita',
            'subMenu' => 'Publish Berita',
            'berita_siap_publish' => $this->masterBeritaModelSiapPublish->getReviewBeritaSiapPublish($berita_search)->paginate(10, 'siap_publish'),
            'pager' => $this->masterBeritaModelSiapPublish->getReviewBeritaSiapPublishPager()->pager,
            'list_status' => $list_status,
            'list_satker' => $list_satker,
            'berita_publish' => $list_berita_publish,
            'keyword' => $keyword

        ];
        return view('Berita/publishBerita', $data);
    }
    public function detailBerita($id_berita)
    {
        $data_berita = $this->masterBeritaModel->getBeritaById($id_berita);
        $list_status = $this->masterStatusModel->getListStatus();
        $data = [
            'title' => 'Detail Berita',
            'menu' => 'Berita',
            'subMenu' => 'Entry Berita',
            'berita' => $data_berita,
            'list_status' => $list_status,
        ];
        return view('Berita/detailBerita', $data);
    }
    public function detailBeritaReviewer($id_berita)
    {
        $data_berita = $this->masterBeritaModel->getBeritaById($id_berita);
        $list_status = $this->masterStatusModel->getListStatus();
        $data = [
            'title' => 'Detail Berita',
            'menu' => 'Berita',
            'subMenu' => 'Entry Berita',
            'berita' => $data_berita,
            'list_status' => $list_status,
        ];
        return view('Berita/detailBeritaReviewer', $data);
    }

    public function reviewUlang($id_berita)
    {
        $data_berita = $this->masterBeritaModel->getBeritaById($id_berita);
        $list_satker = $this->masterSatkerModel->getAllSatker();
        $data = [
            'title' => 'Final Review',
            'menu' => 'Berita',
            'subMenu' => 'Final Review',
            'berita' => $data_berita,
            'list_satker' => $list_satker

        ];

        return view('Berita/reviewUlang', $data);
    }
}
