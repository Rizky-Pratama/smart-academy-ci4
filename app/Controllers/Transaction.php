<?php

namespace App\Controllers;

class Transaction extends BaseController
{
  public function index()
  {
    $transaksiModel = new \App\Models\TransaksiModel();

    $transaksi = $transaksiModel->getTransaksiByUserId(session()->get('user_id'));

    $data = array(
      'transaksi' => $transaksi
    );

    return view('pages/user/transactions', $data);
  }

  public function showBukti($transaksi_id)
  {
    $transaksiModel = new \App\Models\TransaksiModel();

    // ambil nama bank, nomor, total transaksi
    $transaksi = $transaksiModel->select('transaksi.id AS transaksi_id ,rekening.nama_bank AS nama_bank, rekening.nomor_rekening AS nomor_rekening, transaksi.total AS total_transaksi')
      ->join('rekening', 'transaksi.rekening_id = rekening.rekening_id')
      ->where('transaksi.id', $transaksi_id)
      ->first();

    $data = array(
      'transaksi' => $transaksi
    );

    return view('pages/user/bukti', $data);
  }

  public function uploadBukti()
  {
    $BuktiModel = new \App\Models\BuktiModel();

    $rules = [
      'gambar' => [
        'rules' => 'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'uploaded' => 'Pilih gambar terlebih dahulu',
          'max_size' => 'Ukuran gambar terlalu besar',
          'is_image' => 'File yang dipilih bukan gambar',
          'mime_in' => 'File yang dipilih bukan gambar'
        ]
      ]
    ];

    $transaksi_id = $this->request->getPost('transaksi_id');
    $gambar = $this->request->getFile('gambar');

    if (!$this->validate($rules)) {
      return redirect()->to('/bukti/' . $this->request->getPost('transaksi_id'))->withInput();
    }

    $nameGambar = $gambar->getRandomName();
    $data = array(
      'file_path' => $nameGambar,
      'transaksi_id' => $transaksi_id
    );

    $BuktiModel->save($data);
    $gambar->move('bukti', $nameGambar);

    return redirect()->to('/transaction');
  }
}
