<?php

namespace App\Modules\Dashboard\Controller;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    function index()
    {
        if(!auth()->user()->can('users.detail')){
            return redirect()->to('/');
        }
        $userModel = model('UserModel');
        // var_dump($userModel->findAll());
        // var_dump(auth()->user());

        echo view('App\Modules\Dashboard\Views\index', ['usuarios' => $userModel->findAll()]);
    }

    function show($id)
    {
        if(!auth()->user()->can('users.detail')){
            return redirect()->to('/');
        }
       

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

        // var_dump($authGroups->matrix);

        echo view('App\Modules\Dashboard\Views\show', [
            'usuario' => $userModel->find($id),
            'groups' => $authGroups->groups,
            'permissions' => $authGroups->permissions,
            'matrix' => $authGroups->matrix
        ]);
    }

    function manageGroups($id, $group)
    {
        if(!auth()->user()->can('users.edit')){
            return ;
        }
        $userModel = model('UserModel');
        $group = str_replace('_', ' ', $group);
        if (in_array($group, $userModel->find($id)->getGroups())) {
            $userModel->find($id)->removeGroup($group);
            return json_encode(0);

        } else {
            $userModel->find($id)->addGroup($group);
            return json_encode(1);
        }
    }

    function managePermissions($id)
    {
        if(!auth()->user()->can('users.edit')){
            return ;
        }
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