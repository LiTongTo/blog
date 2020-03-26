<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;
use App\Brand;
use App\Category;
use Validator;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res=Goods::leftjoin("brand","brand.brand_id","=","goods.brand_id")
         ->leftjoin("category","category.cate_id","=","goods.cate_id")
         ->get();
        //  dd($res);
        return view('/goods/index',['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $BrandInfo=Brand::get();//品牌
        //  dd($BrandInfo);
         $Cate=Category::get();//分类
         $CateInfo=CateInfo($Cate);
         return view('goods.create',['BrandInfo'=>$BrandInfo,'CateInfo'=>$CateInfo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data=request()->except('_token');//获取到所有的数据
        //  dd($data);
         $validator=Validator::make($data,[
             'goods_name'=>'required|unique:goods|alpha_dash|between:2,50',
             'brand_id'=>'required',
             'cate_id'=>'required',
             'goods_num'=>'required|numeric',
             'goods_price'=>'required|numeric'
         ],[
             'goods_name.required'=>'商品名称必填',
             'goods_name.unique'=>'商品名称已存在',
             'goods_name.alpha_dash'=>'可以是字母、数字、下划线、',
             'goods_name.between'=>'商品名称长度为2-50位',
             'brand_id.required'=>'品牌必填',
             'cate_id.required'=>'分类必填',
             'goods_num.required'=>'商品库存必填',
             'goods_num.numeric'=>'必须是数字',
            // 'goods_num.between'=>'不超过八位',
             'goods_price.required'=>'商品价格必填',
             'goods_price.numeric'=>'必须是数字'

         ]);
         if ($validator->fails()) {
            return redirect('goods/create')
            ->withErrors($validator)
            ->withInput();
       }
        
       //文件上传
       if($request->hasFile('goods_img')){
            $data['goods_img']=$this->upload('goods_img');
            // dd($data['goods_img']);
       }

         //多文件上传
         if($request->hasFile('goods_imgs')){
            $goods_imgs=$this->MoreUploads('goods_imgs');
            $data['goods_imgs']=implode('|',$goods_imgs);
            //  dd($data['goods_imgs']);
       }
       
       $res=Goods::create($data);
       //dd($res);
       if($res){
         return redirect('/goods/index');
       }

    }

    //文件上传
      public function upload($img){
          $file=request()->file($img);//接收文件
          //判断上传过程中有无错误
          if($file->isValid()){
              $store_result=$file->store('uploads');
              return $store_result;
          }

          exit('未获取到上传文件或上传文件过程中出错');
      }

      //多文件上传
       public function MoreUploads($img){
           //接收文件
           $file=request()->file($img);
          //dd($file);
          foreach($file as $k=>$v){
             if($v->isValid()){
                 $store_result[$k]=$v->store('uploads');
             }else{
                 $store_result[$k]='未获取到上传文件或上传文件过程中出错';
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
        $BrandInfo=Brand::get();//品牌
        //  dd($BrandInfo);
        $Cate=Category::get();//商品
        $CateInfo=CateInfo($Cate);
         $res=Goods::find($id);
         return view('/goods/edit',['res'=>$res,'BrandInfo'=>$BrandInfo,'CateInfo'=>$CateInfo]);
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
        $data=request()->except('_token');//获取到所有的数据
        //  dd($data);
         $validator=Validator::make($data,[
             'goods_name'=>'regx:/^[\x{4e00}-\x{u9fa5}\w]{2,50}$/u|unique:goods',
             'brand_id'=>'required',
             'cate_id'=>'required',
             'goods_num'=>'required|numeric',
             'goods_price'=>'required|numeric'
         ],[
             'goods_name.required'=>'商品名称必填',
             'goods_name.unique'=>'商品名称已存在',
             'goods_name.regx'=>'可以是字母、数字、下划线、中文商品名称长度为2-50位',
             
             'brand_id.required'=>'品牌必填',
             'cate_id.required'=>'分类必填',
             'goods_num.required'=>'商品库存必填',
             'goods_num.numeric'=>'必须是数字',
            //  'goods_num.between'=>'不能超过八位 ',
             'goods_price.required'=>'商品价格必填',
             'goods_price.numeric'=>'必须是数字'

         ]);
         if ($validator->fails()) {
            return redirect('goods/create')
            ->withErrors($validator)
            ->withInput();
       }
        
       //文件上传
       if($request->hasFile('goods_img')){
            $data['goods_img']=$this->upload('goods_img');
            // dd($data['goods_img']);
       }

         //多文件上传
         if($request->hasFile('goods_imgs')){
            $goods_imgs=$this->MoreUploads('goods_imgs');
            $data['goods_imgs']=implode('|',$goods_imgs);
            //  dd($data['goods_imgs']);
       }
       
       $res=Goods::where('goods_id',$id)->update($data);
       //dd($res);
       if($res!==false){
         return redirect('/goods/index');
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
        $res=Goods::destroy($id);
        if($res){
           return redirect('/goods/index');
        }
    }
}
