<?php

namespace App\Controllers;

class Berita extends BaseController
{
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
        $data = [
            'title' => 'Tambah Berita',
            'menu' => 'Berita',
            'subMenu' => 'Entry Berita',
        ];
        return view('Berita/tambahBerita', $data);
    }
}
