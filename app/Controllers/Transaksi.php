<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BuktiModel;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
  public function index()
  {
    $model = new TransaksiModel();
    $get = $model->getTransaksi();

    $data = array(
      'title' => 'Management Transaksi',
      'menu' => ['transaksi', 'dataTransaksi'],
      'get' => $get,
    );
    return view('pages/admin/transaksi', $data);
  }

  public function showBukti()
  {
    $model = new BuktiModel();
    $get = $model->select('transaksi.id AS transaksi_id, rekening.nama_bank AS nama_bank, rekening.nomor_rekening AS nomor_rekening, transaksi.total AS total_transaksi, bukti_pembayaran.file_path AS gambar, transaksi.status AS status ')
      ->join('transaksi', 'bukti_pembayaran.transaksi_id = transaksi.id')
      ->join('rekening', 'transaksi.rekening_id = rekening.rekening_id')
      ->findAll();

    $data = array(
      'title' => 'Bukti Transaksi',
      'menu' => ['transaksi', 'buktiPembayaran'],
      'get' => $get,
    );
    return view('pages/admin/buktiPembayaran', $data);
  }

  public function showEdit($id){

    $model = new BuktiModel();
    $get = $model->select('transaksi.id AS transaksi_id, rekening.nama_bank AS nama_bank, rekening.nomor_rekening AS nomor_rekening, transaksi.total AS total_transaksi, bukti_pembayaran.file_path AS gambar, transaksi.status AS status ')
    ->join('transaksi', 'bukti_pembayaran.transaksi_id = transaksi.id')
    ->join('rekening', 'transaksi.rekening_id = rekening.rekening_id')
    ->where('transaksi.id', $id)
    ->first();

    if (!$get) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $data = array(
      'title' => 'Edit Transaksi',
      'menu' => ['transaksi', 'dataTransaksi'],
      'get' => $get,
    );
    return view('pages/admin/editTransaksi', $data);
  }

  public function edit($id)
  {
    $model = new TransaksiModel();
    $data = array(
      'status' => $this->request->getPost('status'),
    );

    if ($model->update($id, $data)) {
      session()->setFlashdata('success', 'Data Berhasil Diubah');
      return redirect()->to('/bukti_pembayaran');
    } else {
      session()->setFlashdata('errors', $model->errors());
      return redirect()->to('/transaksi/edit/' . $id);
    }
  }

}
