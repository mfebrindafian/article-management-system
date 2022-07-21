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
}
