<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use RealRashid\SweetAlert\Facades\Alert;
use Hash;

class LoginController extends Controller
{
    

    public function getLoginForm(Request $request)
    {

        if($request->session()->has('Admin_Login'))
        {
            return redirect('admin/dashboard');
        }
        else
        {
            return view('admin.layouts.loginlayout');
        }

        


    }

    public function adminVerify(Request $request)
    {

       if($request->isMethod('post'))
       {
        $request->validate([

            "email"=>"required",
            "password"=>"required"

        ]);
       }

       $email = $request->email;
       $password = $request->password;

    // $result = Admin::where(['email'=>$email,'password'=>$password])->get();

    $result = Admin::where(['email'=>$email])->first();

    if($result)
    {
        if(Hash::check($password,$result->password))
        {

            $request->session()->put('Admin_Login',true);
            $request->session()->put('Admin_ID',$result->id);
            
            return redirect('admin/dashboard');

        }
        else
        {
            return redirect('admin')->with('msg','please enter correct password details');
        }

    }
    else
    {
        return redirect('admin')->with('msg','please enter valid credential details.');
    }


    }

    // public function updatePassword()
    // {
    //     $result = Admin::find(1);

    //     $result->password = Hash::make('12345678');

    //     $result->save();
    // }


}
