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

    public function getAllBeritaDashboard()
    {
        return $this
            ->table('mst_berita')
            ->select('*')
            ->where('link_publish !=', '')
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


    // BAGIAN REVIEW
    public function getReviewBerita($key)
    {
        return $this
            ->table('mst_berita')
            ->where('link_publish', '')
            ->where('status_kd !=', 4)
            ->like('judul_berita', $key)
            ->orderBy('id', 'DESC');
    }

    public function getReviewBeritaUpload($key)
    {
        return $this
            ->table('mst_berita')
            ->where('status_kd', '1')
            ->like('judul_berita', $key)
            ->orderBy('id', 'DESC');
    }
    public function getReviewBeritaReview($key)
    {
        return $this
            ->table('mst_berita')
            ->where('status_kd', '2')
            ->like('judul_berita', $key)
            ->orderBy('id', 'DESC');
    }
    public function getReviewBeritaPublish()
    {
        return $this
            ->table('mst_berita')
            ->where('status_kd', '3')
            ->where('link_publish !=', '')
            ->orderBy('id', 'DESC');
    }
    public function getReviewBeritaSiapPublish($key)
    {
        return $this
            ->table('mst_berita')
            ->where('status_kd', '3')
            ->where('link_publish', '')
            ->like('judul_berita', $key)
            ->orderBy('id', 'DESC');
    }

    public function getReviewBeritaPager()
    {
        return $this
            ->table('mst_berita')
            ->where('status_kd !=', '3')
            ->orderBy('id', 'DESC');
    }

    public function getReviewBeritaUploadPager()
    {
        return $this
            ->table('mst_berita')
            ->where('status_kd', '1')
            ->orderBy('id', 'DESC');
    }
    public function getReviewBeritaReviewPager()
    {
        return $this
            ->table('mst_berita')
            ->where('status_kd', '2')
            ->orderBy('id', 'DESC');
    }
    public function getReviewBeritaPublishPager()
    {
        return $this
            ->table('mst_berita')
            ->where('status_kd', '3')
            ->where('link_publish !=', '')
            ->orderBy('id', 'DESC');
    }
    public function getReviewBeritaSiapPublishPager()
    {
        return $this
            ->table('mst_berita')
            ->where('status_kd', '3')
            ->where('link_publish', '')
            ->orderBy('id', 'DESC');
    }

    public function getBeritaByTgl($satker_kd, $tgl_upload)
    {
        return $this
            ->table('mst_berita')
            ->where('satker_kd', $satker_kd)
            ->where('status_kd !=', 4)
            ->where('DATE(tgl_upload)', $tgl_upload)
            ->get()
            ->getResultArray();
    }
}
