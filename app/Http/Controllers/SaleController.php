<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res=Sale::get();
        return view('sale.index',['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('sale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $data=request()->except('_token');
          //单文件上传
          if($request->hasFile('sale_img')){
            $data['sale_img']=$this->upload('sale_img');
            // dd($img);
          }
         
          //多文件上传
          if($request->hasFile('sale_imgs')){
            $sale_imgs=$this->MoreUploads('sale_imgs');
            $data['sale_imgs']=implode('|',$sale_imgs);
          }
        //  dd($data);
         $res=Sale::create($data);
        //  dd($res);
         if($res){
            return redirect('/sale/index');
         }
    }

    //文件上传
     public function upload($img){
             //接收文件
          $file=request()->file($img);
         //判断上传 过程中有无错
         if($file->isValid()){
            
             $store_result=$file->store('uploads');
             return $store_result;
         }
     }
    
    //多文件上传
      public function MoreUploads($img){
            //接收文件
            $file=request()->file($img);
            // dd($file);
            foreach($file as $k=>$v){
                //判断上传过程中有无错误
                if($v->isValid()){
                   $store_result[$k]=$v->store('uploads');
                }else{
                    $store_result[$k]='未获取到上传未见或上传过程出错';
                }
            }

            return $store_result;
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
