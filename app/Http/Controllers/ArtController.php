<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Art;
use App\Type;
use Validator;
class ArtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query=request()->all();
       
        // dump($query);
        $where=[];
        if(!empty($query['title'])){
          $where[]=['art_title',"like","%".$query['title']."%"];
        }
        // if(!empty($query['t_id'])){
        //     $where[]=['type.t_id',"=","%".$query['t_id']."%"];
        //   }
           $TypeInfo=Type::get();
         $pageSize=config('app.pageSize');
        $data=Art::leftjoin('type',"art.t_id","=","type.t_id")->where($where)->paginate($pageSize);
        // dd($data);
        return view('art.index',['data'=>$data,'TypeInfo'=>$TypeInfo,'query'=>$query]); 
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $TypeInfo=Type::get();
        return view('art.create',['TypeInfo'=>$TypeInfo]);
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
        //    dd($data);
           $validator=Validator::make($data,
               [
                'art_title'=>'required|regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u|unique:art',
                't_id'=>'required',
                'is_up'=>'required',
                'is_show'=>'required',
               ],[

                'art_title.required'=>'文章标题不能为空',
                'art_title.regex'=>'中文字母数字下划线',
                'art_title.unique'=>'标题已存在',
                't_id.required'=>'分类不能为空',
                'is_up.required'=>'是否重要不能为空',
                'is_show.required'=>'是否显示不能为空',
           ]);

             if($validator->fails()){
                  return redirect('/art/create')
                  ->withErrors($validator)
                  ->withInput();
             }

             //文件上传
             if($request->hasFile('art_img')){
                $data['art_img']=$this->upload('art_img');
                
             }

           $res=Art::create($data);
           if($res){
               return redirect('/art/index');
           }
            
    }

    //文件上传
      public function upload($img){
        $file=request()->file($img);
       //判断上传过程中有无错误 
         if($file->isValid()){
             $store_result=$file->store('upload');
             return $store_result;
         }
   
         exit('没有上传文件或上传过程中有错');
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

         $TypeInfo=Type::get();
         $data=Art::where('art_id',$id)->first();
        return view('art.edit',['TypeInfo'=>$TypeInfo,'data'=>$data]);
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
        //    dd($data);
           $validator=Validator::make($data,
               [
                'art_title'=>'required|regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u|unique:art',
                't_id'=>'required',
                'is_up'=>'required',
                'is_show'=>'required',
               ],[

                'art_title.required'=>'文章标题不能为空',
                'art_title.regex'=>'中文字母数字下划线',
                'art_title.unique'=>'标题已存在',
                't_id.required'=>'分类不能为空',
                'is_up.required'=>'是否重要不能为空',
                'is_show.required'=>'是否显示不能为空',
           ]);

             if($validator->fails()){
                  return redirect('/art/create')
                  ->withErrors($validator)
                  ->withInput();
             }

             //文件上传
             if($request->hasFile('art_img')){
                $data['art_img']=$this->upload('art_img');
                
             }

           $res=Art::where('art_id',$id)->update($data);
           if($res!==false){
            return redirect('/art/index');
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
        $res=Art::destroy($id);
        // dd($res);
        if($res){
            if(request()->ajax()){
               return json_encode(['code'=>'00000','msg'=>'删除成功']);
            }
            return redirect('/art/index');
        }
    }

    public function checkOnly(){
        $art_title=request()->art_title;
        echo $art_title;
    }
}
