<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterBeritaModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'mst_berita';
    protected $allowedFields = ['user_id', 'judul_berita', 'penulis', 'satker_kd', 'tgl_upload', 'status_kd', 'tgl_publish', 'link_publish', 'editor', 'tgl_mulai_review', 'tgl_selesai_review', 'file_draft', 'file_review', 'image_upload'];

    public function getAllBeritaByPenulis($user_id)
    {
        return $this
            ->table('mst_berita')
            ->select('*')
            ->where('user_id', $user_id)
            ->get()
            ->getResultArray();
    }

    public function getBeritaById($id_berita)
    {
        return $this
            ->table('mst_berita')
            ->select('*')
            ->where('id', $id_berita)
            ->get()
            ->getRowArray();
    }

    public function getAllBerita()
    {
        return $this
            ->table('mst_berita')
            ->select('*')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getAllBeritaUpload()
    {
        return $this
            ->table('mst_berita')
            ->select('*')
            ->where('status_kd', '1')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }
    public function getAllBeritaReview()
    {
        return $this
            ->table('mst_berita')
            ->select('*')
            ->where('status_kd', '2')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }
    public function getAllBeritaPublish()
    {
        return $this
            ->table('mst_berita')
            ->select('*')
            ->where('status_kd', '3')
            ->where('link_publish !=', '')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }
    public function getAllBeritaSiapPublish()
    {
        return $this
            ->table('mst_berita')
            ->select('*')
            ->where('status_kd', '3')
            ->where('link_publish', '')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getAllBeritaBySatker($satker_kd)
    {
        return $this
            ->table('mst_berita')
            ->select('*')
            ->where('satker_kd', $satker_kd)
            ->get()
            ->getResultArray();
    }
}
