<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use Validator;
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $res=Books::get();
         return view('books.index',['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/books/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //接收数据
          $data=request()->except('_token');
          //dd($data);
          $validator=Validator::make($data,[
              'b_name'=>'required|unique:books|between:2,15',
              'b_man'=>'required',
          ],[
              'b_name.required'=>'图书名称必填',
              'b_name.unique'=>'图书名称已存在',
              'b_name.between'=>'由2-15的数字、字母、下划线、中文组成',
              'b_man.required'=>'作者必填'
          ]);

          if($validator->fails()){
                  return redirect('/books/create')
                  ->withErrors($validator)
                  ->withInput();
          }

          //文件上传
           if($request->hasFile('b_img')){
                $data['b_img']=upload('b_img');
                // dd($img);
           }

           $res=Books::create($data);
        //    dd($res);
             if($res){
                  return redirect('/books/index');
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
