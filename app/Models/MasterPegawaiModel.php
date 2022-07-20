<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterPegawaiModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'mst_pegawai';
    protected $allowedFields = ['nip_lama', 'nip_baru', 'nama_pegawai', 'gol_kd', 'tmt', 'jabatan_kd', 'ket_jabatan', 'pendidikan_kd',  'tahun_pdd',  'jk', 'tgl_lahir', 'satker_kd', 'es3_kd', 'es4_kd', 'fungsional_kd'];

    public function getProfilPegawai($nip_lama_user)
    {
        return $this
            ->table($this->table)
            ->select('mst_pegawai.*,mst_gol.*,mst_pendidikan.*,mst_satker.*,mst_fungsional.*,mst_es3.*,mst_es4.*,mst_jabatan.*')
            ->where('mst_pegawai.nip_lama', $nip_lama_user)
            ->join('mst_gol', 'mst_gol.id = mst_pegawai.gol_kd')
            ->join('mst_pendidikan', 'mst_pendidikan.kd_pendidikan = mst_pegawai.pendidikan_kd')
            ->join('mst_satker', 'mst_satker.kd_satker = mst_pegawai.satker_kd')
            ->join('mst_fungsional', 'mst_fungsional.id = mst_pegawai.fungsional_kd')
            ->join('mst_jabatan', 'mst_jabatan.id = mst_pegawai.jabatan_kd')
            ->join('mst_es3', 'mst_es3.kd_es3 = mst_pegawai.es3_kd')
            ->join('mst_es4', 'mst_es4.kd_es4 = mst_pegawai.es4_kd')
            ->get()
            ->getRowArray();
    }

    public function getDetailPegawaiById($id_pegawai)
    {
        return $this
            ->table($this->table)
            ->select('mst_pegawai.*,mst_gol.*,mst_pendidikan.*,mst_satker.*,mst_fungsional.*,mst_es3.*,mst_es4.*,mst_jabatan.*')
            ->where('mst_pegawai.id', $id_pegawai)
            ->join('mst_gol', 'mst_gol.id = mst_pegawai.gol_kd')
            ->join('mst_pendidikan', 'mst_pendidikan.kd_pendidikan = mst_pegawai.pendidikan_kd')
            ->join('mst_satker', 'mst_satker.kd_satker = mst_pegawai.satker_kd')
            ->join('mst_fungsional', 'mst_fungsional.id = mst_pegawai.fungsional_kd')
            ->join('mst_jabatan', 'mst_jabatan.id = mst_pegawai.jabatan_kd')
            ->join('mst_es3', 'mst_es3.kd_es3 = mst_pegawai.es3_kd')
            ->join('mst_es4', 'mst_es4.kd_es4 = mst_pegawai.es4_kd')
            ->get()
            ->getRowArray();
    }

    public function getAllPegawai()
    {
        return $this
            ->table('mst_pegawai')
            ->get()
            ->getResultArray();
    }

    public function getPegawaiById($id_pegawai)
    {
        return $this
            ->table('mst_pegawai')
            ->where('id', $id_pegawai)
            ->get()
            ->getRowArray();
    }

    public function search($keyword)
    {
        return $this
            ->table('mst_pegawai')
            ->like('nip_lama', $keyword)
            ->orLike('nip_baru', $keyword)
            ->orLike('nama_pegawai', $keyword)
            ->orLike('ket_jabatan', $keyword)
            ->get()
            ->getResultArray();
    }
}
