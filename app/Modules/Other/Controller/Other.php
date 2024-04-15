<?php

namespace App\Modules\Other\Controller;

use App\Modules\Base\Controller\Base;

class Other extends Base
{
    protected $viewPath = 'Other';
    protected $title = 'Other';
    protected $content = 'Other';
    protected $userMustAuth = false;

    function contact() 
    {
        if(!auth()->loggedIn()){
            return redirect()->to('/');
        }
        echo 'Contacto!';    
    }
}