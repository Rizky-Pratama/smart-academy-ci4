<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function index()
    {
        $profileModel = new \App\Models\ProfileModel();
        $userId = session()->get('user_id');
        $profile = $profileModel->select()->where('user_id', $userId)->first();

        $data = array(
            'profil' => $profile
        );

        return view('pages/user/profile', $data);
    }

    public function showEdit()
    {
        $profileModel = new \App\Models\ProfileModel();
        $userId = session()->get('user_id');
        $profile = $profileModel->select()->where('user_id', $userId)->first();

        $data = array(
            'profil' => $profile
        );

        return view('pages/user/editProfile', $data);
    }

    public function edit()
    {
        $profileModel = new \App\Models\ProfileModel();
        $userId = session()->get('user_id');
        $data = array(
            'user_id' => $userId,
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp')
        );
        if ($this->request->getPost('id')) {
            $data['id'] = $this->request->getPost('id');
        }

        $profileModel->save($data);
        session()->setFlashdata('success', 'Profile berhasil diubah');
        return redirect()->to('/profile');
    }
}
