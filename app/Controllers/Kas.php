<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class Kas extends BaseController
{
    private $db = "";

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function transaksi()
    {
        $getKas = $this->db->table('iuran')
            ->join('warga', 'warga.id_warga = iuran.warga_id')
            ->get()->getResult();

        $data = [
            'title' => 'Transaksi Kas',
            'dataKas' => $getKas
        ];

        return view('kas/v_transaksi', $data);
    }

    public function tambah_transaksi()
    {
        $getWarga = $this->db->table('warga')
            ->get()->getResult();

        $data = [
            'title' => 'Tambah Transaksi',
            'dataWarga' => $getWarga
        ];

        return view('kas/v_tambah_transaksi', $data);
    }

    public function proses_tambah_transaksi()
    {
        $type = "error";
        $input = (object) $this->request->getPost();
        $insertTransaksi = $this->db->table('iuran')
            ->insert([
                'keterangan' => $input->keterangan,
                'jumlah' => $input->jumlah,
                'warga_id' => $input->warga_id,
                'tanggal' => $input->tanggal
            ]);

        if ($insertTransaksi) {
            $message = "Berhasil menambah Data Transaksi";
            $type = "success";
        } else {
            $message = "Gagal menambah Data Transaksi";
        }

        session()->setFlashdata($type, $message);
        return redirect('kas/transaksi');
    }

    public function edit_transaksi($id_iuran)
    {
        $getIuran = $this->db->table('iuran')
            ->where('id_iuran', $id_iuran)
            ->get()->getRow();

        $getWarga = $this->db->table('warga')
            ->get()->getResult();

        $data = [
            'title' => 'Edit Transaksi',
            'kas' => $getIuran,
            'dataWarga' => $getWarga
        ];

        return view('kas/v_edit_transaksi', $data);
    }

    public function proses_edit_transaksi($id_iuran)
    {
        $type = "error";
        $input = (object) $this->request->getPost();
        $updateKas = $this->db->table('iuran')
            ->update([
                'keterangan' => $input->keterangan,
                'jumlah' => $input->jumlah,
                'warga_id' => $input->warga_id,
                'tanggal' => $input->tanggal
            ], ['id_iuran' => $id_iuran]);

        if ($updateKas) {
            $message = "Berhasil merubah Data Transaksi";
            $type = "success";
        } else {
            $message = "Gagal merubah Data Transaksi";
        }

        session()->setFlashdata($type, $message);
        return redirect('kas/transaksi');
    }

    public function delete_transaksi($id_iuran)
    {
        $deleteTransaksi = $this->db->table('iuran')
            ->delete(['id_iuran' => $id_iuran]);

        if ($deleteTransaksi) {
            $message = "Berhasil menghapus Data Transaksi";
            $type = "success";
        } else {
            $message = "Gagal menghapus Data Transaksi";
        }

        session()->setFlashdata($type, $message);
        return redirect('kas/transaksi');
    }

    public function laporan_kas()
    {
        $getKas = $this->db->table('iuran')
            ->select('*')
            ->join('warga', 'warga.id_warga = iuran.warga_id')
            ->get()->getResult();

        $getTotal = $this->db->table('iuran')
        ->selectSum('jumlah', 'total')
        ->get()->getRow();

        $data = [
            'title' => "Laporan Kas",
            'dataKas' => $getKas,
            'total' => $getTotal
        ];

        return view('kas/v_laporan_kas', $data);
    }
}
