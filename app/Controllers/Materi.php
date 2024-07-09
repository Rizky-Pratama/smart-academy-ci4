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

        $vidio = $this->request->getFile('vidio');
        $vidioOld = $this->request->getPost('oldvidio');

        $thumbnail = $this->request->getFile('thumbnail');
        $thumbnailOld = $this->request->getPost('oldThumbnail');

        // jika thumbnail di kosongkan maka tidak perlu di validasi
        // jika thumbnail di isi maka perlu di validasi
        if ($thumbnail->getError() == 4) {
            $thumbnailRules = [
                'rules' => 'max_size[thumbnail,1024]|ext_in[thumbnail,png,jpg,jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'ext_in' => 'Format gambar tidak sesuai. Harus {param}',
                ],
            ];
        } else {
            $thumbnailRules = [
                'rules' => 'uploaded[thumbnail]|max_size[thumbnail,1024]|ext_in[thumbnail,png,jpg,jpeg]',
                'errors' => [
                    'uploaded' => 'Thumbnail harus diisi',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'ext_in' => 'Format gambar tidak sesuai. Harus {param}',
                ],
            ];
        }

        // jika vidio di kosongkan maka tidak perlu di validasi
        // jika vidio di isi maka perlu di validasi
        if ($vidio->getError() == 4) {
            $vidioRules = [
                'rules' => 'max_size[vidio,1024]|ext_in[vidio,png,jpg,jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'ext_in' => 'Format gambar tidak sesuai. Harus {param}',
                ],
            ];
        } else {
            $vidioRules = [
                'rules' => 'uploaded[vidio]|max_size[vidio,20480]|ext_in[vidio,mp4]',
                'errors' => [
                    'uploaded' => 'Video harus diisi',
                    'max_size' => 'Ukuran video terlalu besar, max 20mb',
                    'ext_in' => 'Format video tidak sesuai. Harus {param}',
                ],
            ];
        }
        // if ($vidio->getError() == 4) {
        //     $rules = [
        //         'judul' => [
        //             'rules' => 'required|is_unique[materi.judul,id,' . $id . ']',
        //             'errors' => [
        //                 'required' => 'Judul harus diisi',
        //                 'is_unique' => 'Judul {value} sudah terdaftar',
        //             ],
        //         ],
        //     ];
        // } else {
        //     $rules = [
        //         'judul' => [
        //             'rules' => 'required|is_unique[materi.judul,id,' . $id . ']',
        //             'errors' => [
        //                 'required' => 'Judul harus diisi',
        //                 'is_unique' => 'Judul {value} sudah terdaftar',
        //             ],
        //         ],
        //         'vidio' => [
        //             'rules' => 'max_size[vidio,10240]|ext_in[vidio,png,jpg,jpeg]',
        //             'errors' => [
        //                 'max_size' => 'Ukuran video terlalu besar',
        //                 'ext_in' => 'Format video tidak sesuai. Harus {param}',
        //             ],
        //         ],
        //     ];
        // }

        $rules = [
            'judul' => [
                'rules' => 'required|is_unique[materi.judul,id,' . $id . ']',
                'errors' => [
                    'required' => 'Judul harus diisi',
                    'is_unique' => 'Judul {value} sudah terdaftar',
                ],
            ],
            'thumbnail' => $thumbnailRules,
            'vidio' => $vidioRules,
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->to('/materi/edit/' . $id)->withInput();
        }

        $data = array(
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tipe' => $this->request->getPost('tipe'),
            'harga' => $this->request->getPost('harga')
        );

        if (!$vidio->getError() == 4) {

            $vidio = $this->request->getFile('vidio');
            $nameVidio = $vidio->getRandomName();

            $data['video'] = $nameVidio;
        }

        if (!$thumbnail->getError() == 4) {

            $thumbnail = $this->request->getFile('thumbnail');
            $nameThumbnail = $thumbnail->getRandomName();

            $data['thumbnail'] = $nameThumbnail;
        }

        // $data = array(
        //     'judul' => $this->request->getPost('judul'),
        //     'deskripsi' => $this->request->getPost('deskripsi'),
        //     'tipe' => $this->request->getPost('tipe'),
        //     'harga' => $this->request->getPost('harga')
        // );
        // dd($data);

        $model->updateData($data, $id);

        if (!$thumbnail->getError() == 4) {
            $thumbnail->move("thumbnail", $nameThumbnail);
            unlink("thumbnail/" . $thumbnailOld);
        }

        if (!$vidio->getError() == 4) {
            $vidio->move("vidio", $nameVidio);
            unlink("vidio/" . $vidioOld);
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
            'thumbnail' => [
                'rules' => 'uploaded[thumbnail]|max_size[thumbnail,1024]|ext_in[thumbnail,png,jpg,jpeg]',
                'errors' => [
                    'uploaded' => 'Video harus diisi',
                    'max_size' => 'Ukuran gambar terlalu besar, max 1mb',
                    'ext_in' => 'Format video tidak sesuai. Harus {param}',
                ],
            ],
            'vidio' => [
                'rules' => 'uploaded[vidio]|max_size[vidio,20480]|ext_in[vidio,mp4]',
                'errors' => [
                    'uploaded' => 'Video harus diisi',
                    'max_size' => 'Ukuran video terlalu besar, max 20mb',
                    'ext_in' => 'Format video tidak sesuai. Harus {param}',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->to('/materi/add')->withInput();
        }

        $thumbnail = $this->request->getFile('thumbnail');
        $thumbnailName = $thumbnail->getRandomName();

        $vidio = $this->request->getFile('vidio');
        $vidioName = $vidio->getRandomName();

        $model = new \App\Models\materiModel();
        $data = array(
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tipe' => $this->request->getPost('tipe'),
            'harga' => $this->request->getPost('harga'),
            'thumbnail' => $thumbnailName,
            'video' => $vidioName,
        );

        $model->insertData($data);

        if (!$vidio->hasMoved()) {
            $vidio->move("vidio", $vidioName);
        }

        if (!$thumbnail->hasMoved()) {
            $thumbnail->move("thumbnail", $thumbnailName);
        }

        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/materi');
    }

    public function Delete($id)
    {
        $model = new \App\Models\materiModel();

        $get = $model->getData($id);
        if (!$get) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $thumbnail = $get->thumbnail;
        $vidio = $get->video;

        $model->deleteData($id);

        unlink("thumbnail/" . $thumbnail);
        unlink("vidio/" . $vidio);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/materi');
    }
}
