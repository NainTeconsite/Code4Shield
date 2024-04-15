<?php

namespace App\Modules\Base\Controller;

use App\Controllers\BaseController;

class Base extends BaseController
{
    protected $title = 'Base';
    protected $content = 'Base';
    protected $viewPath = '';

    protected $permision = '';
    protected $userMustAuth = false;



    function new()
    {
        if ($this->userMustAuth) {
            if (auth()->loggedIn()) {
                if (auth()->user()->can($this->permision)) {

                } else
                    return redirect()->to('/');
            } else
                return redirect()->to('/');
        }
        echo view('App\Modules\\' . $this->viewPath . '\Views\new', [
            'title' => $this->title,
            'content' => $this->content

        ]);
    }
    function create()
    {
        if ($this->userMustAuth) {
            if (auth()->loggedIn()) {
                if (auth()->user()->can($this->permision)) {

                } else
                    return redirect()->to('/');
            } else
                return redirect()->to('/');
        }

        echo view('App\Modules\\' . $this->viewPath . '\Views\create', [
            'title' => $this->title,
            'content' => $this->content

        ]);
    }
    function edit()
    {
        if ($this->userMustAuth) {
            if (auth()->loggedIn()) {
                if (auth()->user()->can($this->permision)) {

                } else
                    return redirect()->to('/');
            } else
                return redirect()->to('/');
        }

        echo view('App\Modules\\' . $this->viewPath . '\Views\edit', [
            'title' => $this->title,
            'content' => $this->content

        ]);
    }
    function update()
    {
        if ($this->userMustAuth) {
            if (auth()->loggedIn()) {
                if (auth()->user()->can($this->permision)) {

                } else
                    return redirect()->to('/');
            } else
                return redirect()->to('/');
        }

        echo view('App\Modules\\' . $this->viewPath . '\Views\update', [
            'title' => $this->title,
            'content' => $this->content

        ]);
    }
    function delete()
    {
        if ($this->userMustAuth) {
            if (auth()->loggedIn()) {
                if (auth()->user()->can($this->permision)) {

                } else
                    return redirect()->to('/');
            } else
                return redirect()->to('/');
        }

        echo view('App\Modules\\' . $this->viewPath . '\Views\delete', [
            'title' => $this->title,
            'content' => $this->content

        ]);
    }

    function index()
    {
        if ($this->userMustAuth) {
            if (auth()->loggedIn()) {
                if (auth()->user()->can($this->permision)) {

                } else
                    return redirect()->to('/');
            } else
                return redirect()->to('/');
        }

        echo view('App\Modules\\' . $this->viewPath . '\Views\index', [
            'title' => $this->title,
            'content' => $this->content
        ]);
    }
}