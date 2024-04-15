<?php

namespace App\Modules\Dashboard\Controller;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    function index() 
    {
        $userModel = model('UserModel');
        // var_dump($userModel->findAll());
        echo view('App\Modules\Dashboard\Views\index', ['usuarios' => $userModel->findAll()]); 
    }
}