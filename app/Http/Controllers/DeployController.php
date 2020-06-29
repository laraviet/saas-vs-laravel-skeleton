<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeployController extends Controller
{
    public function index()
    {
        #TODO: change the path
        `cd /var/www/sites/papiu.laraviet.com && git pull origin master`;

        return 'DONE';
    }
}
