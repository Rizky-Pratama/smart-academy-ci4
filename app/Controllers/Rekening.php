<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RekeningModel;

class Rekening extends BaseController
{
  public function index()
  {
    $model = new RekeningModel();
    $get = $model->getRekening();

    $data = array(
      'title' => 'Management Transaksi',
      'menu' => ['transaksi', 'dataRekening'],
      'get' => $get,
    );
    return view('pages/admin/rekening', $data);
  }

  public function showAddRekening()
  {
    $data = array(
      'title' => 'Management Transaksi',
      'menu' => ['transaksi', 'dataRekening'],
    );
    return view('pages/admin/addRekening', $data);
  }

  public function add()
  {
    $rules = [
      'nama_bank' => [
        'rules' => 'required|is_unique[rekening.nama_bank]',
        'errors' => [
          'required' => 'Nama Bank harus diisi',
          'is_unique' => 'Nama Bank {value} sudah ada'
        ]
      ],
      'nomor_rekening' => [
        'rules' => 'required|is_unique[rekening.nomor_rekening]',
        'errors' => [
          'required' => 'Nomor Rekening harus diisi',
          'is_unique' => 'Nomor Rekening {value} sudah ada'
        ]
      ],
      'nama_pemilik_rekening' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama Pemilik Rekening harus diisi'
        ]
      ]
    ];

    if (!$this->validate($rules)) {
      session()->setFlashdata('errors', $this->validator->getErrors());
      return redirect()->to('/rekening/add')->withInput();
    }

    $model = new RekeningModel();
    $data = array(
      'nama_bank' => $this->request->getPost('nama_bank'),
      'nomor_rekening' => $this->request->getPost('nomor_rekening'),
      'nama_pemilik_rekening' => $this->request->getPost('nama_pemilik_rekening'),
    );

    if ($model->addRekening($data)) {
      session()->setFlashdata('success', 'Data berhasil ditambahkan');
      return redirect()->to('/rekening');
    } else {
      return redirect()->to('/rekening/add')->withInput()->with('errors', $model->errors());
    }
  }

  public function showEdit($id)
  {
    $model = new RekeningModel();
    $get = $model->getRekeningId($id);

    $data = array(
      'title' => 'Management Transaksi',
      'menu' => ['transaksi', 'dataRekening'],
      'get' => $get,
    );
    return view('pages/admin/editRekening', $data);
  }

  public function edit($id)
  {
    $rules = [
      'nama_bank' => [
        'rules' => 'required|is_unique[rekening.nama_bank,rekening_id,' . $id . ']',
        'errors' => [
          'required' => 'Nama Bank harus diisi',
          'is_unique' => 'Nama Bank {value} sudah ada'
        ]
      ],
      'nomor_rekening' => [
        'rules' => 'required|is_unique[rekening.nomor_rekening,rekening_id,' . $id . ']',
        'errors' => [
          'required' => 'Nomor Rekening harus diisi',
          'is_unique' => 'Nomor dengan {value} Rekening sudah ada'
        ]
      ],
      'nama_pemilik_rekening' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama Pemilik Rekening harus diisi'
        ]
      ]
    ];

    if (!$this->validate($rules)) {
      session()->setFlashdata('errors', $this->validator->getErrors());
      return redirect()->to('/rekening/edit/' . $id)->withInput();
    }

    $model = new RekeningModel();
    $data = array(
      'nama_bank' => $this->request->getPost('nama_bank'),
      'nomor_rekening' => $this->request->getPost('nomor_rekening'),
      'nama_pemilik_rekening' => $this->request->getPost('nama_pemilik_rekening'),
    );

    if ($model->editRekening($data, $id)) {
      session()->setFlashdata('success', 'Data berhasil diubah');
      return redirect()->to('/rekening');
    } else {
      return redirect()->to('/rekening/edit/' . $id)->withInput()->with('errors', $model->errors());
    }
  }

  public function delete($id)
  {
    $model = new RekeningModel();
    $get = $model->deleteRekening($id);

    if (!$get) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }



    session()->setFlashdata('success', 'Data berhasil dihapus');
    return redirect()->to('/rekening');
  }
}
