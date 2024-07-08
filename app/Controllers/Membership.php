<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Membership extends BaseController
{
    public function index()
    {
        $model = new \App\Models\MembershipModel();
        $get = $model->getAllData();

        $data = array(
            'title' => 'Membership',
            'menu' => ['membership'],
            'get' => $get,
        );
        return view('pages/admin/membership', $data);
    }
}
