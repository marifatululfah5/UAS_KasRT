<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class Admin extends BaseController
{
    private $db = "";

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function login()
    {
        $data = [
            'title' => 'Login'
        ];

        return view('admin/v_login', $data);
    }

    public function proses_login()
    {
        $type = "error";
        $message = "Unknown";
        $data_user = [];

        $input = (object) $this->request->getPost();
        $getUser = $this->db->table('admin')
            ->where('admin_name', $input->admin_name)
            ->get()->getRow();

        if ($getUser) {
            if (password_verify($input->admin_password, $getUser->admin_password)) {
                $data_user += [
                    'username' => $getUser->admin_name,
                    'logged_in' => TRUE
                ];

                $message = "Berhasil Login!";
                $type = "success";
            } else {
                $message = "Password salah";
            }
        } else {
            $message = "Akun tidak ditemukan";
        }
        session()->setFlashdata($type, $message);
        session()->set($data_user);

        return redirect('/');
    }

    public function logout()
    {
        session()->setFlashdata("success", "Berhasil logout");
        session()->remove(['username']);
        session()->set(['logged_in' => FALSE]);

        return redirect()->back();
    }
}
