<?php

namespace App\Controllers;


use App\Models\MasterUserModel;
use App\Models\MasterUserLevelModel;
use App\Models\MasterAksesUserLevelModel;
use App\Models\MasterSatkerModel;


class masterKelolaMaster extends BaseController
{
    protected $masterKelolaMasterModel;
    protected $masterUserModel;
    protected $masterUserLevelModel;
    protected $masterAksesUserLevelModel;
    protected $masterSatkerModel;

    public function __construct()
    {
        $this->masterUserModel = new masterUserModel();
        $this->masterUserLevelModel = new masterUserLevelModel();
        $this->masterAksesUserLevelModel = new masterAksesUserLevelModel();
        $this->masterSatkerModel = new MasterSatkerModel();
    }

    public function masterUser()
    {
        $list_user = $this->masterUserModel->getAllUser();
        $level_tersedia = $this->masterUserLevelModel->getAlllevel();

        $data = [
            'title' => 'Master User',
            'menu' => 'Kelola Master',
            'subMenu' => 'Master User',
            'list_user' => $list_user,
            'level_tersedia' => $level_tersedia,
            'show_data_user' => NULL,
            'show_list_level' => NULL,
            'class_modal_default' => 'col-md-6',
            'class_modal_setup' => 'col-md-6 d-none'
        ];

        return view('kelolaMaster/masterUser', $data);
    }

    public function showDataUSer($user_id)
    {
        $list_user = $this->masterUserModel->getAllUser();
        $data_user = $this->masterUserModel->getProfilUser($user_id);
        $list_user_level = $this->masterAksesUserLevelModel->getUserLevel($user_id);
        $level_tersedia = $this->masterUserLevelModel->getAlllevel();


        $data = [
            'title' => 'Master User',
            'menu' => 'Kelola Master',
            'subMenu' => 'Master User',
            'list_user' => $list_user,
            'show_data_user' => $data_user,
            'show_list_level' => $list_user_level,
            'level_tersedia' => $level_tersedia,
            'class_modal_default' => 'col-md-6 d-none',
            'class_modal_setup' => 'col-md-6'
        ];
        return view('kelolaMaster/masterUser', $data);
    }

    public function updateRoleAktivasi()
    {
        $id_user = $this->request->getVar('id_user_show');
        $username = $this->request->getVar('username_show');
        $fullname = $this->request->getVar('fullname_show');
        $email = $this->request->getVar('email_show');
        $password = $this->request->getVar('password_show');
        $token = $this->request->getVar('token_show');
        $image_user = $this->request->getVar('image_user_show');
        $nip_lama_user = $this->request->getVar('nip_lama_user_show');
        $is_active = $this->request->getVar('is_active');

        $level_user = $this->request->getVar('level_show');
        $list_user_level = $this->masterAksesUserLevelModel->getUserLevel($id_user);


        for ($i = 0; $i < count($list_user_level); $i++) {
            $this->masterAksesUserLevelModel->save([
                'id' => $list_user_level[$i]['id'],
                'user_id' => $id_user,
                'level_id' => $level_user[$i]
            ]);
        }


        $this->masterUserModel->save([
            'id' => $id_user,
            'username' => $username,
            'fullname' => $fullname,
            'email' => $email,
            'password' => $password,
            'token' => $token,
            'image' => $image_user,
            'nip_lama_user' => $nip_lama_user,
            'is_active' => $is_active,
        ]);

        if (session('user_id') == $id_user) {

            $list_user_level = $this->masterAksesUserLevelModel->getUserLevel($id_user);

            $data1 = [
                'log' => TRUE,
                'user_id' => session('user_id'),
                'level_id' => session('level_id'),
                'list_user_level' => $list_user_level,
                'list_menu'  => session('list_menu'),
                'list_submenu' => session('list_submenu'),
                'fullname' => session('fullname'),
                'data_user' => session('data_user')
            ];
            session()->set($data1);
        }


        return redirect()->to('/showDataUser/' . $id_user);
    }

    public function tambahLevelUser()
    {
        $id_user = $this->request->getVar('id_user_role');
        $level_id = $this->request->getVar('role');

        $this->masterAksesUserLevelModel->save([
            'user_id' => $id_user,
            'level_id' => $level_id
        ]);


        if (session('user_id') == $id_user) {

            $list_user_level = $this->masterAksesUserLevelModel->getUserLevel($id_user);

            $data1 = [
                'log' => TRUE,
                'user_id' => session('user_id'),
                'level_id' => session('level_id'),
                'list_user_level' => $list_user_level,
                'list_menu'  => session('list_menu'),
                'list_submenu' => session('list_submenu'),
                'fullname' => session('fullname'),
                'data_user' => session('data_user')
            ];
            session()->set($data1);
        }
        session()->setFlashdata('pesan', 'Tambah Level berhasil');
        session()->setFlashdata('icon', 'success');

        return redirect()->to('/showDataUser/' . $id_user);
    }

    public function resetPasswordUser()
    {
        $id_user = $this->request->getVar('id_user_reset');
        $username = $this->request->getVar('username_reset');
        $fullname = $this->request->getVar('fullname_reset');
        $email = $this->request->getVar('email_reset');
        $token = $this->request->getVar('token_reset');
        $image_user = $this->request->getVar('image_user_reset');
        $nip_lama_user = $this->request->getVar('nip_lama_user_reset');
        $is_active = $this->request->getVar('is_active_reset');

        $pass_default =  password_hash('123456', PASSWORD_DEFAULT);

        $this->masterUserModel->save([
            'id' => $id_user,
            'username' => $username,
            'fullname' => $fullname,
            'email' => $email,
            'password' => $pass_default,
            'token' => $token,
            'image' => $image_user,
            'nip_lama_user' => $nip_lama_user,
            'is_active' => $is_active,
        ]);
        session()->setFlashdata('pesan', 'Reset password ' . $username . ' berhasil');
        session()->setFlashdata('icon', 'success');

        return redirect()->to('/showDataUser/' . $id_user);
    }

    public function hapusLevelUser()
    {
        $id_akses_user_level = $this->request->getVar('id_level_hapus');
        $id_user = $this->request->getVar('id_user_hapus');


        $this->masterAksesUserLevelModel->delete($id_akses_user_level);

        if (session('user_id') == $id_user) {

            $list_user_level = $this->masterAksesUserLevelModel->getUserLevel($id_user);

            $data1 = [
                'log' => TRUE,
                'user_id' => session('user_id'),
                'level_id' => session('level_id'),
                'list_user_level' => $list_user_level,
                'list_menu'  => session('list_menu'),
                'list_submenu' => session('list_submenu'),
                'fullname' => session('fullname'),
                'data_user' => session('data_user')
            ];
            session()->set($data1);
        }

        session()->setFlashdata('pesan', 'Hapus Level berhasil');
        session()->setFlashdata('icon', 'success');

        return redirect()->to('/showDataUser/' . $id_user);
    }


    public function tambahUser()
    {
        $nip_lama_tambah = $this->request->getVar('nip_lama_tambah');
        $username_tambah = $this->request->getVar('username_tambah');
        $fullname_tambah = $this->request->getVar('fullname_tambah');
        $email_tambah = $this->request->getVar('email_tambah');
        $is_active_tambah = $this->request->getVar('is_active_tambah');
        $pass_default_tambah =  password_hash('123456', PASSWORD_DEFAULT);

        $image_user = ($nip_lama_tambah . '.jpg');

        $this->masterUserModel->save([
            'username' => $username_tambah,
            'fullname' => $fullname_tambah,
            'email' => $email_tambah,
            'password' => $pass_default_tambah,
            'token' => null,
            'image' => $image_user,
            'nip_lama_user' => $nip_lama_tambah,
            'is_active' => $is_active_tambah,
        ]);

        $last_input_user_id = $this->masterUserModel->getLastId();


        $all_level = $this->masterUserLevelModel->getAlllevel();
        for ($al = 0; $al <= count($all_level); $al++) {
            if ($this->request->getVar('level_pick' . $al) != null) {
                $Level_choose[] = ($al + 1);
            }
        }

        for ($lev = 0; $lev < count($Level_choose); $lev++) {
            $this->masterAksesUserLevelModel->save([
                'user_id' => $last_input_user_id,
                'level_id' => $Level_choose[$lev]
            ]);
        }

        session()->setFlashdata('pesan', 'tambah user ' . $username_tambah . ' berhasil');
        session()->setFlashdata('icon', 'success');

        return redirect()->to('/masterUser');
    }
}
