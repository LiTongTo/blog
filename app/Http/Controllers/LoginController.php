<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
class LoginController extends Controller
{
    public function  login(){
       return view('login.create');
    }

    public function logindo(){
        $data=request()->except('_token');
        // dd($data);
        $adminuser=Admin::where($data)->first();
        //  dd($adminuser);
       
        if($adminuser){
           request()->session()->put('adminuser',$adminuser);
           return redirect('/admins');
        }

        return redirect('/login')->with('msg','用户名或此密码错误');
    }
}
