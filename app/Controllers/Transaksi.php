<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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
}
