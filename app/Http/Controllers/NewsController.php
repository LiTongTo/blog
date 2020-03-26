<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Cate;
use Validator;
use Illuminate\Support\Facades\Redis;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
            // Redis::flushall();
             $news_title=request()->input('news_title')??'';
            //  dump($news_title);
               $goods=Redis::get('goodslist');
                 dump($goods);
              if(!$goods){
                  echo "DB操作";
                $where=[];
                if($news_title){
                    $where[]=['news_title',"like","%$news_title%"];
                }

             $pageSize=config('app.pageSize');
            //ajax分页
        
            $res=News::leftjoin('cate','news.cate_id','=','cate.cate_id')->where($where)->paginate($pageSize); 
            if(request()->ajax()){
                return view('news.ajaxpage',['res'=>$res,'pageSzie'=>$pageSize]);
            }
                $goods=serialize($goods);
               Redis::set('goodslist',$goods);
            //  dd($goods);
        }
            $goods=unserialize($goods);
            return view('news.index',['res'=>$res,'pageSzie'=>$pageSize,'news_title'=>$news_title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $Cate=Cate::get();//分类
        $CateInfo=CateInfo($Cate);

        
        return view('news.create',['CateInfo'=>$CateInfo]);
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
         $data['news_time']=date('Y-m-d H:i:s',time());
         $validator=Validator::make($data,[
             'news_title'=>'required|regex:/^[\x{4e00}-\x{9fa5}\w]{2,30}$/u|unique:news',
             'news_man'=>'required',
         ],[
             'news_title.required'=>'新闻标题必填',
             'news_title.regex'=>'长度为2-30位，需是中文、字母、数字、下划线组成',
             'news_title.unqiue'=>'新闻标题已存在',
             'news_man.required'=>'新闻作者必填'
         ]);

         if($validator->fails()){
              return redirect('/news/create')
              ->withErrors($validator)
              ->withInput();
         }

         
        //dd($data);
        $res=News::create($data);
        // dd($res);
        if($res){
           return redirect('/news/index');
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
