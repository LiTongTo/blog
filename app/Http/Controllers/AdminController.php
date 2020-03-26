<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use Validator;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize=config('app.pageSize');
        $res=Admin::paginate($pageSize); 
        return view('admin.index',['res'=>$res,'pageSize'=>$pageSize]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.create');
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
         //dd($data);
         $validator=Validator::make($data,[
            'admin_name'=>'required|regex:/^[\x{4e00}-\x{9fa5}\w]{2,16}$/u|unique:admin',
            'admin_pwd'=>'required|between:6,6',
            'admin_paw'=>'required',
            // 'admin_email'=>
            // 'admin_pwd'=>
          ],[
            'admin_name.required'=>'管理员名称必填',
            'admin_name.unique'=>'管理员名称已存在',
            'admin_name.regex'=>'可以是字母、数字、下划线、中文商品名称长度为2-50位',
            'admin_pwd.required'=>'密码不能为空',
            'admin_pwd.between'=>'密码不少于6位',
            'admin_paw.required'=>'确认密码不能为空',
      ]); 
      if ($validator->fails()) {
          return redirect('admin/create')
          ->withErrors($validator)
          ->withInput();
     }

     //文件上传
     if($request->hasFile('admin_img')){
        $data['admin_img']=upload('admin_img');
        // dd($data['goods_img']);
   }

            $res=Admin::create($data);
            // dd($res);
            if($res){
                return redirect('/admin/index');
            }

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
        $res=Admin::where('admin_id',$id)->first();
    
        return view('admin.edit',['res'=>$res]);
         
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
         
        $data=request()->except('_token');
        //dd($data);
        $validator=Validator::make($data,[
           'admin_name'=>//[
               'required|regex:/^[\x{4e00}-\x{9fa5}\w]{2,16}$/u',
                // Rule::unique('admin')->ignore($id,'admin_id')
            //   ],
           'admin_pwd'=>'required|between:6,6',
           'admin_paw'=>'required',
           // 'admin_email'=>
           // 'admin_pwd'=>
         ],[
           'admin_name.required'=>'管理员名称必填',
           'admin_name.unique'=>'管理员名称已存在',
           'admin_name.regex'=>'可以是字母、数字、下划线、中文商品名称长度为2-50位',
           'admin_pwd.required'=>'密码不能为空',
           'admin_pwd.between'=>'密码不少于6位',
           'admin_paw.required'=>'确认密码不能为空',
     ]); 
     if ($validator->fails()) {
         return redirect('admin/create')
         ->withErrors($validator)
         ->withInput();
    }

    //文件上传
    if($request->hasFile('admin_img')){
       $data['admin_img']=upload('admin_img');
       // dd($data['goods_img']);
  }

           $res=Admin::where('admin_id',$id)->update($data);
           // dd($res);
           if($res!==false){
               return redirect('/admin/index');
           }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Admin::destroy($id);
        if($res){
           return redirect('admin/index');
        }
    }
}
