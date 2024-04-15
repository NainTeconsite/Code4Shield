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

    function show($id)
    {
        $userModel = model('UserModel');

        $authGroups = config('AuthGroups');

        // $userModel->find($id)->addGroup('admin');
        // $userModel->find($id)->removeGroup('admin');
        // foreach($authGroups->groups as $key) {
        //     var_dump($key['title']);
        // }
        // foreach($authGroups->permissions as $key => $value) {
        //     var_dump($key);
        // }
        // var_dump($userModel->find($id)->getPermissions());


        echo view('App\Modules\Dashboard\Views\show', [
            'usuario' => $userModel->find($id),
            'groups' => $authGroups->groups,
            'permissions' => $authGroups->permissions
        ]);
    }

    function manageGroups($id, $group)
    {
        $userModel = model('UserModel');
        $authGroups = config('AuthGroups');
        $group = str_replace('_', ' ', $group);
        if (in_array($group, $userModel->find($id)->getGroups())) {
            $userModel->find($id)->removeGroup($group);
        } else {
            $userModel->find($id)->addGroup($group);
        }
        echo view('App\Modules\Dashboard\Views\show', [
            'usuario' => $userModel->find($id),
            'groups' => $authGroups->groups,
            'permissions' => $authGroups->permissions
        ]);
    }

    function managePermissions($id)
    {
        $permission = $this->request->getPost('permissionValue');
        $userModel = model('UserModel');
        if ($userModel->find($id)->hasPermission($permission)) {

            $userModel->find($id)->removePermission($permission);
            return json_encode(0);
        } else {
            $userModel->find($id)->addPermission($permission);
            return json_encode(1);
        }

    }
}