<?php

namespace App\Controllers;

class Course extends BaseController
{
  public function index($id)
  {
    $user_id = session()->get('user_id');
    $model = new \App\Models\materiModel();
    $get = $model->getData($id);

    if (!$get) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $modelTransaksi = new \App\Models\TransaksiModel();
    $cekTransaksi = $modelTransaksi->where('user_id', $user_id)->where('materi_id', $id)->first();
    
    $data = [
      'get' => $get,
    ];

    if (!$cekTransaksi) {
      return view('pages/user/course', $data);
    }

    if ($cekTransaksi['status'] != 'sukses') {
      return view('pages/user/course', $data);

    }

    return view('pages/user/courseFull', $data);
  }
}
