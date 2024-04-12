<?php

namespace App\Modules\Base\Controller;

use App\Controllers\BaseController;

class Base extends BaseController
{
    protected $title = 'Base';
    protected $content = 'Base';
    protected $viewPath = '';

    function new()
    {
        echo view('App\Modules\\'.$this->viewPath.'\Views\new', [
            'title' => $this->title,
            'content' => $this->content

        ]);
    }
    function create()
    {
        echo view('App\Modules\\'.$this->viewPath.'\Views\create', [
            'title' => $this->title,
            'content' => $this->content

        ]);
    }
    function edit()
    {
        echo view('App\Modules\\'.$this->viewPath.'\Views\edit', [
            'title' => $this->title,
            'content' => $this->content

        ]);
    }
    function update()
    {
        echo view('App\Modules\\'.$this->viewPath.'\Views\update', [
            'title' => $this->title,
            'content' => $this->content

        ]);
    }
    function delete()
    {
        echo view('App\Modules\\'.$this->viewPath.'\Views\delete', [
            'title' => $this->title,
            'content' => $this->content

        ]);
    }

    function index()
    {
        echo view('App\Modules\\'.$this->viewPath.'\Views\index', [
            'title' => $this->title,
            'content' => $this->content
        ]);
    }
}