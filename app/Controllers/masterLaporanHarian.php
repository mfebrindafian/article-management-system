<?php

namespace App\Controllers;

use App\Models\MasterLaporanHarianModel;
use App\Models\MasterSatuanModel;
use CodeIgniter\Session\Session;
use PHPUnit\Framework\Test;

class masterLaporanHarian extends BaseController
{
    protected $masterLaporanHarianModel;
    protected $masterSatuanModel;

    public function __construct()
    {
        $this->masterLaporanHarianModel = new masterLaporanHarianModel();
        $this->masterSatuanModel = new masterSatuanModel();
    }

    public function listLaporan()
    {
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
        $keyword = $this->request->getVar('keyword');
        $itemsCount = 10;
        $tanggal_input_terakhir = $this->masterLaporanHarianModel->getMaxDate(session('user_id'));

        $data = [
            'title' => 'List Laporan',
            'menu' => 'Laporan Harian',
            'subMenu' => 'Daftar Laporan',
            'total' => count($this->masterLaporanHarianModel->getTotalByUser(session('user_id'))),
            'list_full_laporan_harian' =>  $this->masterLaporanHarianModel->getTotalByUser(session('user_id')),
            'pager' => $this->masterLaporanHarianModel->getAllByUser(session('user_id'))->pager,
            'itemsCount' => $itemsCount,
            'list_satuan' => $this->masterSatuanModel->getAll(),
            'modal_edit' => '',
            'modal_detail' => '',
            'laporan_harian_tertentu' => NULL,
            'tanggal_input_terakhir' => $tanggal_input_terakhir,
            'tahun_tersedia' => $tahun_tersedia,
            'keyword' => $keyword

        ];

        return view('laporanHarian/listLaporan', $data);
    }

    public function saveLaporanHarian()
    {
        $tanggal = $this->request->getVar('tanggal');
        $field_uraian = $this->request->getVar('field_uraian');
        $field_jumlah = $this->request->getVar('field_jumlah');
        $field_satuan = $this->request->getVar('field_satuan');
        $field_hasil = $this->request->getVar('field_hasil');



        for ($i = 1; $i <= count($field_uraian); $i++) {
            $field_bukti[] = $this->request->getFileMultiple('field_bukti' . $i);
        }

        $data_user = session('data_user');
        $folderNIP = $data_user['nip_lama_user'];
        $dirname = 'berkas/' . $folderNIP . '/' . $tanggal;

        if (!file_exists($dirname)) {
            mkdir('berkas/' . $folderNIP . '/' . $tanggal, 0777, true);
        }

        for ($h = 0; $h < count($field_bukti); $h++) {
            for ($i = 0; $i < count($field_bukti[$h]); $i++) {
                for ($j = 0; $j < count($field_bukti[$h]); $j++) {
                    $ekstensi[$i][$j] = $field_bukti[$h][$i]->getExtension();
                    $namaFile[$h][$i] = $tanggal;
                    $namaFile[$h][$i] .= '_kegiatan_ke-';
                    $namaFile[$h][$i] .= $h + 1;
                    $namaFile[$h][$i] .= '_bukti_dukung_ke-';
                    $namaFile[$h][$i] .= $i + 1;
                    $namaFile[$h][$i] .= '.';
                    $namaFile[$h][$i] .= $ekstensi[$i][$j];
                }
                $field_bukti[$h][$i]->move(
                    $dirname,
                    $namaFile[$h][$i]
                );
            }
        }


        $uraian_laporan = array('uraian' => $field_uraian, 'jumlah' => $field_jumlah, 'satuan' => $field_satuan, 'hasil' => $field_hasil, 'bukti_dukung' => $namaFile);
        $json_laporan = json_encode($uraian_laporan);

        $this->masterLaporanHarianModel->save([
            'user_id' => session('user_id'),
            'tgl_kegiatan' => $tanggal,
            'uraian_kegiatan' => $json_laporan,
        ]);
        session()->setFlashdata('pesan', 'Kegiatan Berhasil Ditambahkan');
        session()->setFlashdata('icon', 'success');
        return redirect()->to('/listLaporan');
    }

    public function detailKegiatan()
    {
        $data = [
            'title' => 'Detail Kegiatan',
            'menu' => 'Laporan Harian',
            'subMenu' => 'Daftar Laporan'
        ];
        return view('laporanHarian/detailKegiatan', $data);
    }


    public function showEditLaporanHarian($laporan_id)
    {
        $keyword = $this->request->getVar('keyword');
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


        $itemsCount = 10;

        $tanggal_input_terakhir = $this->masterLaporanHarianModel->getMaxDate(session('user_id'));

        $data = [
            'title' => 'List Laporan',
            'menu' => 'Laporan Harian',
            'subMenu' => 'Daftar Laporan',
            'total' => count($this->masterLaporanHarianModel->getTotalByUser(session('user_id'))),
            'list_laporan_harian' => $this->masterLaporanHarianModel->getAllByUser(session('user_id'))->paginate($itemsCount, 'list_laporan_harian'),
            'pager' => $this->masterLaporanHarianModel->getAllByUser(session('user_id'))->pager,
            'itemsCount' => $itemsCount,
            'laporan_harian_tertentu' => $this->masterLaporanHarianModel->getLaporan(session('user_id'), $laporan_id),
            'list_satuan' => $this->masterSatuanModel->getAll(),
            'modal_edit' => 'modal-edit',
            'modal_detail' => '',
            'tanggal_input_terakhir' => $tanggal_input_terakhir,
            'tahun_tersedia' => $tahun_tersedia,
            'keyword' => $keyword,
            'list_full_laporan_harian' =>  $this->masterLaporanHarianModel->getTotalByUser(session('user_id')),

        ];
        //dd($data);
        return view('laporanHarian/listLaporan', $data);
    }

    public function hapusBuktiDukung()
    {
        $tanggal = $this->request->getVar('tanggal_hapus');
        $laporan_id = $this->request->getVar('id_laporan_tertentu');
        $posisi_array = $this->request->getVar('posisi_array');
        $posisi_dalam_array = $this->request->getVar('posisi_dalam_array');

        $data_user = session('data_user');
        $folderNIP = $data_user['nip_lama_user'];


        $laporan_harian_tertentu = $this->masterLaporanHarianModel->getLaporan(session('user_id'), $laporan_id);
        $laporan = $laporan_harian_tertentu['uraian_kegiatan'];
        $decode_laporan = json_decode($laporan);

        $bukti_dukung = $decode_laporan->bukti_dukung;
        $hasil = $decode_laporan->hasil;
        $jumlah = $decode_laporan->jumlah;
        $satuan = $decode_laporan->satuan;
        $uraian = $decode_laporan->uraian;


        $nama_file_hapus = $bukti_dukung[$posisi_array][$posisi_dalam_array];

        unlink('berkas/' . $folderNIP . '/' . $tanggal . '/' . $nama_file_hapus);


        for ($i = 0; $i < count($bukti_dukung); $i++) {
            $k = 0;
            for ($j = 0; $j < count($bukti_dukung[$i]); $j++) {
                if ($bukti_dukung[$i][$j] != $nama_file_hapus) {
                    $namaFile[$i][$k] = $bukti_dukung[$i][$j];
                    $k++;
                }
            }
        }


        $uraian_laporan = array('uraian' => $uraian, 'jumlah' => $jumlah, 'satuan' => $satuan, 'hasil' => $hasil, 'bukti_dukung' => $namaFile);
        $encode_laporan = json_encode($uraian_laporan);

        $this->masterLaporanHarianModel->save([
            'id' => $laporan_id,
            'user_id' => session('user_id'),
            'tgl_kegiatan' => $tanggal,
            'uraian_kegiatan' => $encode_laporan,
        ]);

        return redirect()->to('/showEditLaporanHarian/' . $laporan_id);
    }



    public function updateLaporanHarian()
    {
        $laporan_id = $this->request->getVar('laporan_id_edit');
        $laporan_id = $this->request->getVar('id_laporan_harian_tertentu');
        $tanggal = $this->request->getVar('tanggal');
        $field_uraian = $this->request->getVar('field_uraian');
        $field_jumlah = $this->request->getVar('field_jumlah');
        $field_satuan = $this->request->getVar('field_satuan');
        $field_hasil = $this->request->getVar('field_hasil');

        $data_user = session('data_user');
        $folderNIP = $data_user['nip_lama_user'];
        $dirname = 'berkas/' . $folderNIP . '/' . $tanggal;

        for ($i = 1; $i <= count($field_uraian); $i++) {
            $field_bukti[] = $this->request->getFileMultiple('field_bukti' . $i);
        }
        // dd($field_bukti);

        for ($i = 0; $i < count($field_bukti); $i++) {
            for ($j = 0; $j < count($field_bukti[$i]); $j++) {
                if ($this->request->getVar('field_bukti_lama' . ($i + 1)) != null) {
                    $field_bukti_baru[$i] = $this->request->getVar('field_bukti_lama' . ($i + 1));
                } else {
                    $field_bukti_baru[$i] = [];
                }
            }
        }

        for ($i = 0; $i < count($field_bukti_baru); $i++) {
            $a[] = count($field_bukti_baru[$i]);
        }

        for ($h = 0; $h < count($field_bukti); $h++) {
            for ($i = 0; $i < count($field_bukti[$h]); $i++) {
                for ($j = 0; $j < count($field_bukti[$h]); $j++) {
                    if ($field_bukti[$h][$i]->getError() != 4) {
                        $ekstensi[$i][$j] = $field_bukti[$h][$i]->getExtension();
                        $namaFile[$h][$i] = $tanggal;
                        $namaFile[$h][$i] .= '_kegiatan_ke-';
                        $namaFile[$h][$i] .= $h + 1;
                        $namaFile[$h][$i] .= '_bukti_dukung_ke-';
                        $namaFile[$h][$i] .= $a[$h] + $i + 1;
                        $namaFile[$h][$i] .= '.';
                        $namaFile[$h][$i] .= $ekstensi[$i][$j];
                    }
                }
                if ($field_bukti[$h][$i]->getError() != 4) {
                    $field_bukti[$h][$i]->move(
                        $dirname,
                        $namaFile[$h][$i]
                    );
                }
            }
        }




        for ($i = 0; $i < count($field_bukti); $i++) {
            for ($j = 0; $j < count($field_bukti[$i]); $j++) {
                if ($field_bukti[$i][$j]->getError() != 4) {
                    $field_bukti_baru[$i][$a[$i] + $j] = $namaFile[$i][$j];
                }
            }
        }



        $uraian_laporan = array('uraian' => $field_uraian, 'jumlah' => $field_jumlah, 'satuan' => $field_satuan, 'hasil' => $field_hasil, 'bukti_dukung' => $field_bukti_baru);
        $encode_laporan = json_encode($uraian_laporan);


        $this->masterLaporanHarianModel->save([
            'id' => $laporan_id,
            'user_id' => session('user_id'),
            'tgl_kegiatan' => $tanggal,
            'uraian_kegiatan' => $encode_laporan,
        ]);
        session()->setFlashdata('pesan', 'Kegiatan Berhasil Diupdate');
        session()->setFlashdata('icon', 'success');
        return redirect()->to('/listLaporan');
    }

    public function showDetailLaporanHarian($laporan_id)
    {
        $keyword = $this->request->getVar('keyword');
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


        $itemsCount = 10;
        $tanggal_input_terakhir = $this->masterLaporanHarianModel->getMaxDate(session('user_id'));
        $data = [
            'title' => 'List Laporan',
            'menu' => 'Laporan Harian',
            'subMenu' => 'Daftar Laporan',
            'total' => count($this->masterLaporanHarianModel->getTotalByUser(session('user_id'))),
            'list_laporan_harian' => $this->masterLaporanHarianModel->getAllByUser(session('user_id'))->paginate($itemsCount, 'list_laporan_harian'),
            'pager' => $this->masterLaporanHarianModel->getAllByUser(session('user_id'))->pager,
            'itemsCount' => $itemsCount,
            'laporan_harian_tertentu' => $this->masterLaporanHarianModel->getLaporan(session('user_id'), $laporan_id),
            'list_satuan' => $this->masterSatuanModel->getAll(),
            'modal_edit' => '',
            'modal_detail' => 'modal-detail',
            'tanggal_input_terakhir' => $tanggal_input_terakhir,
            'tahun_tersedia' => $tahun_tersedia,
            'keyword' => $keyword,
            'list_full_laporan_harian' =>  $this->masterLaporanHarianModel->getTotalByUser(session('user_id')),
        ];
        // dd($data);
        return view('laporanHarian/listLaporan', $data);
    }
}
