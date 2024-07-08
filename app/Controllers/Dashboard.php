<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {

        $data = array(
            'title' => 'Dashboard',
            'menu' => ['dashboard']
        );

        return view('pages/admin/dashboard', $data);
    }
}
