<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    

    public function getLoginForm()
    {

        return view('admin.layouts.loginlayout');


    }


}
