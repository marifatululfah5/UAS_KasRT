<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;
use stdClass;

class Warga extends BaseController
{
    private $db = "";

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function index()
    {
        $getWarga = $this->db->table('warga')
            ->join('jenis_kelamin', 'jenis_kelamin.id_jenis_kelamin = warga.jenis_kelamin_id')
            ->get()->getResult();

        $data = [
            'title' => 'Data Warga',
            'dataWarga' => $getWarga
        ];

        return view('warga/v_warga', $data);
    }

    public function tambah_warga()
    {
        $getJenisKelamin = $this->db->table('jenis_kelamin')->get()->getResult();
        $data = [
            'title' => "Tambah Warga",
            'dataJenisKelamin' => $getJenisKelamin
        ];

        return view('warga/v_tambah_warga', $data);
    }

    public function proses_tambah_warga()
    {
        $type = "error";
        $input = (object) $this->request->getPost();
        $insertWarga = $this->db->table('warga')
            ->insert([
                'nik' => $input->nik,
                'nama' => ucwords(strtolower($input->nama)),
                'jenis_kelamin_id' => $input->jenis_kelamin_id,
                'alamat' => $input->alamat
            ]);

        if ($insertWarga) {
            $message = "Berhasil menambah Data Warga";
            $type = "success";
        } else {
            $message = "Gagal menambah Data Warga";
        }

        session()->setFlashdata($type, $message);
        return redirect('warga');
    }

    public function edit_warga($id_warga)
    {
        $getWarga = $this->db->table('warga')
            ->where('id_warga', $id_warga)
            ->get()->getRow();

        // dd($getWarga);

        $getJenisKelamin = $this->db->table('jenis_kelamin')
            ->get()->getResult();

        $data = [
            'title' => 'Edit Warga',
            'warga' => $getWarga,
            'dataJenisKelamin' => $getJenisKelamin
        ];

        return view('warga/v_edit_warga', $data);
    }

    public function proses_edit_warga($id_warga)
    {
        $type = "error";
        $input = (object) $this->request->getPost();
        $updateWarga = $this->db->table('warga')
            ->update([
                'nik' => $input->nik,
                'nama' => ucwords(strtolower($input->nama)),
                'jenis_kelamin_id' => $input->jenis_kelamin_id,
                'alamat' => $input->alamat
            ], ['id_warga' => $id_warga]);

        if ($updateWarga) {
            $message = "Berhasil merubah Data Warga";
            $type = "success";
        } else {
            $message = "Gagal merubah Data Warga";
        }

        session()->setFlashdata($type, $message);
        return redirect('warga');
    }

    public function delete_warga($id_warga)
    {
        $deleteWarga = $this->db->table('warga')
            ->delete(['id_warga' => $id_warga]);

        if ($deleteWarga) {
            $message = "Berhasil menghapus Data Warga";
            $type = "success";
        } else {
            $message = "Gagal menghapus Data Warga";
        }

        session()->setFlashdata($type, $message);
        return redirect('warga');
    }
}
