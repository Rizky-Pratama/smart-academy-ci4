<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $model = new \App\Models\penggunaModel();
        $get = $model->getData();
        $data = array(
            'title' => 'Management User',
            'menu' => ['user'],
            'get'   => $get
        );
        return view('pages/admin/user', $data);
    }

    public function showAddUser()
    {
        $data = [
            'title' => 'Managemnet User',
            'menu' => ['user'],
        ];
        return view('pages/admin/addUser', $data);
    }

    public function addUser()
    {
        $rules = [
            'email' => [
                'rules' => 'required|is_unique[user.email]',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'is_unique' => 'Email {value} sudah terdaftar'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username {value} sudah terdaftar'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 8 karakter'
                ]
            ],
            'user_level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'User level harus diisi'
                ]
            ]
        ];


        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            session()->setFlashdata('errors', $errors);
            return redirect()->to('/pengguna/add')->withInput();
        }
        
        $password = $this->request->getPost('password');
        if (is_array($password) || is_null($password)) {
            throw new \Exception("Invalid password.");
        }

        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $hashPassword,
            'user_level' => $this->request->getPost('user_level'),
        ];

        $model = new \App\Models\userModel();
        $model->addUser($data);

        session()->setFlashdata('success', 'User berhasil ditambahkan');
        return redirect()->to('/pengguna');
    }
}
