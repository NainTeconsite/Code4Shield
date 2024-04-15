<?php

namespace App\Modules\Admin\Controller;

use App\Modules\Base\Controller\Base;

class Admin extends Base
{
    protected $viewPath = 'Admin';
    protected $title = 'Admin';
    protected $content = 'Admin';

    protected $permision = 'admin.admin';
    protected $userMustAuth = true;
}