<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $transaksiModel = new \App\Models\TransaksiModel();
        $userModel = new \App\Models\UserModel();
        $materiModel = new \App\Models\MateriModel();

        $data = array(
            'title' => 'Dashboard',
            'menu' => ['dashboard']
        );
        $data['totalTransaksiSukses'] = $transaksiModel->where('status', 'sukses')->countAllResults();
        $data['totalTransaksiGagal'] = $transaksiModel->where('status', 'gagal')->orWhere('status', 'dibatalkan')->countAllResults();
        $data['totalMateri'] = $materiModel->countAllResults();
        $data['totalUser'] = $userModel->countAllResults();

        return view('pages/admin/dashboard', $data);
    }
}
