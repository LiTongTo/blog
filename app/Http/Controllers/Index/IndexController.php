<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
use App\Category;
use App\Cart;
use App\Area;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
class IndexController extends Controller
{
   public function index(){
      
      //先去缓存中读取数据
      //   Cache::pull('is_img');
      //   $gInfo=Cache::get('goods_img');
        
        $gInfo=Redis::get('goods_img');
         // dd($gInfo);
          if(!$gInfo){
       
         //如果缓存中没有数据则去读取数据库
        
          $gInfo=Goods::select('is_img','goods_id','goods_img')->where('is_img',1)->get();
         //   dump($gInfo);
          //存入memcache
           $gInfo=serialize($gInfo);
         //  dump($gInfo);
           Redis::setex('is_slide',60*60*24,$gInfo);
         // Cache::put('goods_img',$gInfo,60*60*24);
       }
          $gInfo=unserialize($gInfo);
         //  dd($gInfo);
    $cInfo=Category::where('pid',0)->get();
    //  dd($cInfo);
    $bInfo=Goods::where('is_best',1)->limit(6)->get();
    $nInfo=Goods::where('is_new',1)->limit(3)->get();
     return view('index.index',['gInfo'=>$gInfo,'cInfo'=>$cInfo,'bInfo'=>$bInfo,'nInfo'=>$nInfo]);
    
   }
   //所有商品
   public function prolist(){
      $gInfo=Goods::where('is_new',1)->get();
     
      return view('index.prolist',['gInfo'=>$gInfo]);
   }

    //商品详情
    public function proinfo($id){
      //   dd($id);
        //统计访问量
         //  if(Cache::add('count_'.$id,1)){
         //     $count=Cache::get('count_'.$id); 
         //  }else{
         //     $count=Cache::increment('count_'.$id);
         //  }
         $count=Cache::add('count_'.$id,1) ? Cache::get('count_'.$id):Cache::increment('count_'.$id);
        $gInfo=Goods::where('goods_id',$id)->first();
        $goods_imgs=$gInfo['goods_imgs'];
      
      return view('index.proinfo',['gInfo'=>$gInfo,'goods_imgs'=>$goods_imgs,'count'=>$count]);
   }
   
   //加入购物车
     public function addcar(Request $request){  
        //判断用户有没有登录
         // $user_acount=session('user_acount');
         // dd($user_acount);
         // if(!$user_acount){
         //     return json_encode(['code'=>'00003','msg'=>'请您先登录']);
         // }
         $user_id=session('user_id');
         $goods_id=$request->goods_id;//商品ID
        $buy_number=$request->buy_number;//购买数量
        //根据商品id查询商品id
        $gInfo=Goods::find($goods_id);
        
        //判断库存
         if($gInfo->goods_num<$buy_number){
             return json_encode(['code'=>'00004','msg'=>'库存不足']);
         }

        //判断此商品是否已存在购物车 如果存在更改购买数量
            $cart=Cart::where(['user_id'=>$user_id,'goods_id'=>$goods_id])->first();
            // dd($cart);
            //库存判断
              
            if($cart){
                $buy_number=$cart->buy_number+$buy_number;
                  if($gInfo->goods_num<$buy_number){
                       $buy_number=$gInfo->goods_num;
                  }
                //更新购买数量
                $res=Cart::where('cart_id',$cart->cart_id)->update(['buy_number'=>$buy_number]);
            }else{
                  //购物车数据库入库
                  $data=[
                     'user_id'=>$user_id,
                     'goods_id'=>$goods_id,
                     'buy_number'=>$buy_number,
                     'goods_name'=>$gInfo->goods_name,
                     'goods_img'=>$gInfo->goods_img,
                     'goods_price'=>$gInfo->goods_price,
                     'goods_num'=>$gInfo->goods_num,
                     'add_time'=>time(),
                     'cart_del'=>1
                   ];
                  
                 $res=Cart::create($data);
              }
            if($res){
               return json_encode(['code'=>'00000','msg'=>'添加成功']);
           }
         
     }

   //购物车
   public function car(Request $request){
      $user_id=session('user_id');
      $cInfo=Cart::where(['user_id'=>$user_id,'cart_del'=>1])->get();
      $_id=Cart::value('goods_id');
      $goods_num=Goods::where('goods_id',$_id)->value('goods_num');
      // dd($goods_num);
      $num=Cart::where(['user_id'=>$user_id,'cart_del'=>1])->count();

     
        
      return view('index.car',['cInfo'=>$cInfo,'num'=>$num,'goods_num'=>$goods_num]);
   }

     //更改购买数量
       public function changeNumber(Request $request){
         $user_id=session('user_id');//用户id
         //接收更改购买数量数据
        $goods_id=$request->goods_id;
        $buy_number=$request->buy_number;
         $res=Cart::where(['user_id'=>$user_id,'goods_id'=>$goods_id,'cart_del'=>1])->update(['buy_number'=>$buy_number]);
          if($res){
              return json_encode(['code'=>'00000','msg'=>'']);
          }else{
             return json_encode(['code'=>'00001','msg'=>'您没有更改购买数量']);
          }
         
       }

   // //重新弄获取小计
    public function getToal(Request $request){
       //获取商品ID
       $goods_id=$request->goods_id;
       $user_id=session('user_id');
       //根据商品id 获取商品价格
         $goods_price=Goods::where(['goods_id'=>$goods_id])->value('goods_price');
         //获取购买数量
         $buy_number= Cart::where(['goods_id'=>$goods_id,'user_id'=>$user_id,'cart_del'=>1])->value('buy_number');
         echo $buy_number*$goods_price;
    }
  
    //获取总价
    public function getMoney(Request $request){
       $goods_id=$request->goods_id;
       $user_id=session('user_id');
       $where=[
          ['goods.goods_id','=',$goods_id],
          ['user_id','=',$user_id],
          ['cart_del','=',1]
       ];
       
       $info=Cart::leftjoin('goods','goods.goods_id','=','cart.goods_id')
       ->where($where)
       ->get();

       $money=0;
       foreach($info as $k=>$v){
         $money +=$v['goods_price']*$v['buy_number'];
         }
     return $money;
      
    }
  

    //去结算
     public function pay(Request $request){
         $goods_id=$request->goods_id;
         $user_id=session('user_id');
         
         $where=[
            ['goods.goods_id','=',$goods_id],
            ['user_id','=',$user_id],
            ['cart_del','=',1]
          ];

          $goodsInfo=Cart::
           leftjoin('goods','goods.goods_id','=','cart.goods_id')
          ->where($where)
          ->get();
            
         $money=0;
         foreach($goodsInfo as $k=>$v){
           $money +=$v['goods_price']*$v['buy_number'];
           }
     
         //   dd($goodsInfo);
        return view('index.pay',['goodsInfo'=>$goodsInfo,'money'=>$money]);
     }

     //个人中心
    public function user(){
       return view('index.user');
    }

    //收货地址
    public function address(){
       return view('index.address');
    }

   //添加收货地址
   public function adds(){

      //查询所有的省份 作为第一个下拉菜单的值  pid=0
      $pInfo=$this->getAreaInfo(0);
      // echo '1000';
      $cInfo=$this->getCityInfo();
      return view('index.adds',['pInfo'=>$pInfo]);
   }

   public function getAreaInfo($pid){
      $where=[
        ['pid','=',$pid]
      ];
     $info=Area::where($where)->get();
      //dd($info);
     return $info;
 }

   public function getCityInfo(){
       $where=['id','=','pid'];
       $info=Area::where($where)->get();
       dd($info);
   }

   // public function addsDo(Request $request){
   //    $data=$request->all();
    
   // }
}
