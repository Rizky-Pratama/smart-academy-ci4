<?php

namespace App\Controllers;

class Checkout extends BaseController
{
  public function index($id)
  {
    $modelMateri = new \App\Models\materiModel();
    $modelRekening = new \App\Models\RekeningModel();

    $getRekening = $modelRekening->getRekening();
    $getMateri = $modelMateri->getData($id);

    $data = array(
      'getRekening' => $getRekening,
      'getMateri' => $getMateri,
    );

    return view('pages/user/checkout', $data);
  }

  public function checkout()
  {
    $materi_id = $this->request->getPost('materi_id');
    $user_id = $this->request->getPost('user_id');
    $rekening_id = $this->request->getPost('rekening_id');
    
    $modelMateri = new \App\Models\materiModel();
    $modelTransaksi = new \App\Models\TransaksiModel();
    $dataMateri = $modelMateri->getData($materi_id);

    $data = array(
      'materi_id' => $materi_id,
      'user_id' => $user_id,
      'rekening_id' => $rekening_id,
      'total' => $dataMateri->harga,
      'status' => 'belum_dibayar',
    );

    $modelTransaksi->addTransaksi($data);


    return redirect()->to('/transaction');
  }
}
