<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
  protected $table = 'transaksi';
  protected $primaryKey = 'id';
  protected $allowedFields = [
    'user_id', 'materi_id', 'rekening_id', 'total', 'tgl_transaksi', 'status'
  ];

  public function getTransaksi()
  {
    return $this->select('transaksi.id AS transaksi_id, user.username AS username, materi.judul AS judul_materi, rekening.nama_bank AS nama_bank, rekening.nomor_rekening AS nomor_rekening, transaksi.total AS total_transaksi, transaksi.tgl_transaksi AS tanggal_transaksi, transaksi.status AS status_transaksi')
      ->join('user', 'transaksi.user_id = user.id')
      ->join('materi', 'transaksi.materi_id = materi.id')
      ->join('rekening', 'transaksi.rekening_id = rekening.rekening_id')
      ->orderBy('transaksi.tgl_transaksi', 'DESC')
      ->findAll();
  }

  public function getTransaksiByUserId($user_id)
  {
    return $this->select('transaksi.id AS transaksi_id, materi.thumbnail AS thumbnail, materi.judul AS judul_materi, rekening.nama_bank AS nama_bank, rekening.nomor_rekening AS nomor_rekening, transaksi.total AS total_transaksi, transaksi.tgl_transaksi AS tanggal_transaksi, transaksi.status AS status_transaksi')
      ->join('user', 'transaksi.user_id = user.id')
      ->join('materi', 'transaksi.materi_id = materi.id')
      ->join('rekening', 'transaksi.rekening_id = rekening.rekening_id')
      ->where('transaksi.user_id', $user_id)
      ->orderBy('transaksi.tgl_transaksi', 'DESC')
      ->findAll();
  }

  public function addTransaksi($data)
  {
    return $this->insert($data);
  }

  public function updateTransaksi($data, $id)
  {
    return $this->update($id, $data);
  }
}
