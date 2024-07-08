<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $model = new \App\Models\materiModel();
        $get = $model->getAllData();

        $data = array(
            'title' => 'Dashboard',
            'content' => 'userPages/home',
            'get' => $get
        );

        return view('pages/user/home', $data);
    }
}
