<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        echo "我是首页";
    }
    public function goods(){
        echo "我是商品";
    }

    public function add(){
         if(request()->isMethod('get')){
             return  view('add');
         }
         
         if(request()->isMethod('post')){
              echo request()->name;
              return redirect('/goods');
         }
         
    }

    public function adddo(){
         echo request()->name;
    }

    public function cate($id=null,$name=null){
         echo '可以 ';
         echo $id.'--'.$name;
    }
}
