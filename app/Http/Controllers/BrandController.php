<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
use App\Http\Requests\StoreBrandPost;
use Validator;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         //DB
        // $BrandInfo=DB::table('brand')->get();

        //ORM
            //第一种
           // $BrandInfo=Brand::all();//返回模型表的所有结果

           //接收搜索条件
              $brand_name=request()->brand_name;
              // dump($brand_name);
              $where=[];
              if($brand_name){
                  $where[]=['brand_name','like',"%$brand_name%"];
              }
             $brand_url=request()->brand_url;
             if($brand_url){
                $where[]=['brand_url','like',"%$brand_url%"];
            }
           //第二种
           $query=request()->all();
           
           $pageSize=config('app.pageSize');
           $BrandInfo=Brand::where($where)->orderBy('brand_id','desc')->paginate($pageSize);   // 可以添加约束条件查询 然后使用get方法获取对应结果
        //   dd($BrandInfo);
        return view('/brand/index',['BrandInfo'=>$BrandInfo,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *添加界面
     * @return \Illuminate\Http\Response
     */
        public function create()
        {
            return view('brand.create');
        }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreBrandPost $request)
    // {   
        public function store(Request $request)
      {
           //第一种表单验证
        //   $validateData= $request->validate([
               
        //      'brand_name'=>'required|unique:brand|max:20',
        //      'brand_url'=>'required',
        //   ],[
        //       'brand_name.required'=>'品牌名称必填',
        //       'brand_name.unique'=>'品牌名称已存在',
        //       'brand_name.max'=>'品牌名称最大长度不超过20位',
        //       'brand_url.required'=>'品牌网址必填',
        //   ]);

          $data=request()->except('_token');
            $validator=Validator::make($data,[
                  'brand_name'=>'required|unique:brand|max:20',
                  'brand_url'=>'required',
                ],[
                    'brand_name.required'=>'品牌名称必填',
                    'brand_name.unique'=>'品牌名称已存在',
                    'brand_name.max'=>'品牌名称最大长度不超过20位',
                    'brand_url.required'=>'品牌网址必填',
            ]); 
            if ($validator->fails()) {
                return redirect('brand/create')
                ->withErrors($validator)
                ->withInput();
           }
                
        //文件上传
          if($request->hasFile('brand_logo')){
              $data['brand_logo']=$this->upload('brand_logo');
            //   dd($img);
          }

        // $res= DB::table('brand')->insert($data);  DB
        //  dd($res); 结果为布尔类型的 true

        //ORM
          //第一种
        //$brand= new Brand;
        // $brand->brand_name=$request->brand_name; 
        // $brand->brand_url=$request->brand_url; 
        // $brand->brand_logo=$request->brand_logo; 
        //$res=$brand->save();

        //第二种
           $res=Brand::create($data);

        //第三种 $res=Brand::insert($data);
         //dd($res);
        if($res){
           return redirect('/brand/index');
        }
    }

     //文件上传
        public function upload($img){
            //判断  上传过程中有无错误
            if(request()->file($img)->isValid()){
                  //接收文件
                  $file=request()->file($img); //request()->$img;
                  $store_result=$file->store('uploads');
                  return $store_result;

            }

            exit('未获取 到上传文件或上传文件过程中出错');
        }

    /**
     * Display the specified resource.
     *详情页展示--预览功能
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *展示编辑页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //DB
        // $data=DB::table('brand')->where('brand_id',$id)->first();
        //ORM
        //    $data=Brand::find($id);//第一种
           $data=Brand::where('brand_id',$id)->first();
        // dd($data);
        return view('brand.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *执行编辑
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $Info=request()->except(['_token','brand_logo']);//except  排除指定对象  only 接收指定对象
         //文件上传
         if($request->hasFile('brand_logo')){
            $Info['brand_logo']=$this->upload('brand_logo');
          //   dd($img);
        }
        // //  dd($Info);
        //  $res=DB::table('brand')->where('brand_id',$id)->update($Info);
        //  dd($res);

        //ORM  第一种 save 更新
        //   $brand=Brand::find($id);
        //   $brand->brand_name=$request->brand_name;
        //   $brand->brand_url=$request->brand_url;
        //   $brand->brand_logo=$request->brand_logo;
        //   $brand->brand_desc=$request->brand_desc;
        //   $res=$brand->save();

        // 第二种
            $res=Brand::where('brand_id',$id)->update($Info);
           if($res!==false){
              return redirect('/brand/index');
         }

    }

    /**
     * Remove the specified resource from storage.
     *删除的方法
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  echo $id;
        // $res=DB::table('brand')->where('brand_id',$id)->delete();

        //ORM
           $res=Brand::destroy($id);
        // dd($res);
        if($res){
            return redirect('/brand/index');
        }
    }
}
