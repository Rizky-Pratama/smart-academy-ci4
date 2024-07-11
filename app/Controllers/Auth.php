<?php

namespace App\Controllers;
use Exception;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('username') != '') {
            return redirect()->to('dashboard');
        }
        return view('login');
    }

    public function login()
    {
        $model = new \App\Models\userModel();
        $rules = [
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email harus diisi.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password minimal 8 karakter.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->to('login')->withInput();
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        if (is_array($password) || is_null($password)) {
            throw new Exception("Invalid password.");
        }
        $user = $model->findUserByEmail($email);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                session()->set('username', $user['username']);
                session()->set('email', $user['email']);
                session()->set('user_level', $user['user_level']);
                session()->set('user_id', $user['id']);

                session()->setFlashdata('success', 'Login berhasil.');

                if ($user['user_level'] == 'admin') {
                    return redirect()->to('dashboard');
                } else {
                    return redirect()->to('/');
                }
            } else {
                session()->setFlashdata('error', 'Password salah.');
                return redirect()->to('login')->withInput();
            }
        } else {
            session()->setFlashdata('error', 'Email tidak terdaftar.');
            return redirect()->to('login')->withInput();
        }

    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function destroy($id)
    {
        $user = new \App\Models\userModel();
        $user->hapus($id);
        return redirect()->to('pengguna');
        session()->setFlashdata('success', 'data berhasil dihapus.');
    }

    public function indexRegister()
    {
        return view('register');
    }

    public function register()
    {
        $rules = [
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'is_unique' => 'Username {value} sudah terdaftar.'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[user.email]',
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'is_unique' => 'Email {value} sudah terdaftar.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password minimal 8 karakter.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->to('register')->withInput();
        }

        $password = $this->request->getPost('password');
        if (is_array($password) || is_null($password)) {
            throw new Exception("Invalid password.");
        }
        
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $hashPassword,
            'user_level' => 'user'
        ];
        $model = new \App\Models\userModel();

        $model->addUser($data);
        session()->setFlashdata('success', 'Registrasi berhasil.');
        return redirect()->to('login');
    }
}
