<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Files\File;

class Materi extends BaseController
{
    public function index()
    {
        $model = new \App\Models\materiModel();
        $get = $model->getAllData();

        $data = array(
            'title' => 'Management Materi',
            'menu' => ['masterData', 'dataMateri'],
            'get' => $get,
        );
        return view('pages/admin/materi', $data);
    }

    public function Add()
    {
        $data = array(
            'title' => 'Tambah Materi',
            'menu' => ['masterData', 'dataMateri'],
        );
        return view('pages/admin/addMateri', $data);
    }

    public function showEdit($id)
    {
        $model = new \App\Models\materiModel();
        $get = $model->getData($id);

        if (!$get) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = array(
            'title' => 'Edit Materi',
            'menu' => ['masterData', 'dataMateri'],
            'get' => $get,
        );
        return view('pages/admin/editMateri', $data);
    }

    public function Edit($id)
    {
        $model = new \App\Models\materiModel();
        $get = $model->getData($id);

        if (!$get) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $img = $this->request->getFile('vidio');
        $imgOld = $this->request->getPost('oldvidio');

        if ($img->getError() == 4) {
            $rules = [
                'judul' => [
                    'rules' => 'required|is_unique[materi.judul,id,' . $id . ']',
                    'errors' => [
                        'required' => 'Judul harus diisi',
                        'is_unique' => 'Judul {value} sudah terdaftar',
                    ],
                ],
            ];
        } else {
            $rules = [
                'judul' => [
                    'rules' => 'required|is_unique[materi.judul,id,' . $id . ']',
                    'errors' => [
                        'required' => 'Judul harus diisi',
                        'is_unique' => 'Judul {value} sudah terdaftar',
                    ],
                ],
                'vidio' => [
                    'rules' => 'max_size[vidio,10240]|ext_in[vidio,png,jpg,jpeg]',
                    'errors' => [
                        'max_size' => 'Ukuran video terlalu besar',
                        'ext_in' => 'Format video tidak sesuai. Harus {param}',
                    ],
                ],
            ];
        }

        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->to('/materi/edit/' . $id)->withInput();
        }

        if ($img->getError() == 4) {
            $data = array(
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'tipe' => $this->request->getPost('tipe'),
                'harga' => $this->request->getPost('harga'),
            );

            $model->updateData($data, $id);
            session()->setFlashdata('success', 'Data berhasil diubah');
            return redirect()->to('/materi');
        } else {
            $name = $img->getRandomName();
            $data = array(
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'tipe' => $this->request->getPost('tipe'),
                'harga' => $this->request->getPost('harga'),
                'video' => $name
            );
        }

        $img = $this->request->getFile('vidio');
        $name = $img->getRandomName();

        $data = array(
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tipe' => $this->request->getPost('tipe'),
            'harga' => $this->request->getPost('harga'),
            'video' => $name
        );

        $model->updateData($data, $id);
        if (!$img->hasMoved()) {
            $img->move("uploads", $name);
            unlink("uploads/" . $imgOld);
        }

        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/materi');
    }

    public function save()
    {

        $rules = [
            'judul' => [
                'rules' => 'is_unique[materi.judul]|required',
                'errors' => [
                    'required' => 'Judul harus diisi',
                    'is_unique' => 'Judul {value} sudah terdaftar',
                ],
            ],
            'vidio' => [
                'rules' => 'uploaded[vidio]|max_size[vidio,1024]|ext_in[vidio,png,jpg,jpeg]',
                'errors' => [
                    'uploaded' => 'Video harus diisi',
                    'max_size' => 'Ukuran video terlalu besar',
                    'ext_in' => 'Format video tidak sesuai. Harus {param}',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->to('/materi/add')->withInput();
        }

        $img = $this->request->getFile('vidio');
        $name = $img->getRandomName();

        $model = new \App\Models\materiModel();
        $data = array(
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tipe' => $this->request->getPost('tipe'),
            'harga' => $this->request->getPost('harga'),
            'video' => $name
        );

        $model->insertData($data);
        if (!$img->hasMoved()) {
            $img->move("uploads", $name);
        }

        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/materi');
    }

    public function Delete($id)
    {
        $model = new \App\Models\materiModel();
        $model->deleteData($id);

        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/materi');
    }
}
