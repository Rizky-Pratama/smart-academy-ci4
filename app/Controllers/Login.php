<?php

namespace App\Controllers;

class Login extends BaseController
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
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $model = new \App\Models\userModel();
        $session = $model->log($email, $password);


        if ($session) {
            session()->set('username', $session['username']);
            session()->set('email', $session['email']);
            session()->set('user_level', $session['user_level']);
            session()->set('password', $session['password']);

            session()->setFlashdata('success', 'Login berhasil.');

            if ($session['user_level'] == 'admin') {
                return redirect()->to('dashboard');
            } else {
                return redirect()->to('/');
            }
            
        } else {
            return redirect()->to('/login');
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
        dd($this->request);
        $data = [
            'username' => $this->request->getPost('username'),
            'alamat_email' => $this->request->getPost('alamat_email'),
            'password' => $this->request->getPost('password'),
            'user_level' => 'user'
        ];
        $model = new \App\Models\userModel();

        $model->register($data);

        return redirect()->to('login');
    }

}
