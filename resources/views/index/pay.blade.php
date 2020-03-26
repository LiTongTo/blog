@extends('layouts.shop')
@section('title','确认结算')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>购物车</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <div class="dingdanlist" onClick="window.location.href='address.html'">
      <table>
       <tr>
        <td class="dingimg" width="75%" colspan="2">新增收货地址</td>
        <td align="right"><img src="/static/index/images/jian-new.png" /></td>
       </tr>
       <tr><td colspan="3" style="height:10px; background:#efefef;padding:0;"></td></tr>
       <tr>
        <td class="dingimg" width="75%" colspan="2">选择收货时间</td>
        <td align="right"><img src="/static/index/images/jian-new.png" /></td>
       </tr>
       <tr><td colspan="3" style="height:10px; background:#efefef;padding:0;"></td></tr>
       <tr>
        <td class="dingimg" width="75%" colspan="2">支付方式</td>
        <td align="right"><span class="hui">网上支付</span></td>
       </tr>
       <tr><td colspan="3" style="height:10px; background:#efefef;padding:0;"></td></tr>
       <tr>
        <td class="dingimg" width="75%" colspan="2">优惠券</td>
        <td align="right"><span class="hui">无</span></td>
       </tr>
       <tr><td colspan="3" style="height:10px; background:#efefef;padding:0;"></td></tr>
       <tr>
        <td class="dingimg" width="75%" colspan="2">是否需要开发票</td>
        <td align="right"><a href="javascript:;" class="orange">是</a> &nbsp; <a href="javascript:;">否</a></td>
       </tr>
       <tr>
        <td class="dingimg" width="75%" colspan="2">发票抬头</td>
        <td align="right"><span class="hui">个人</span></td>
       </tr>
       <tr>
        <td class="dingimg" width="75%" colspan="2">发票内容</td>
        <td align="right"><a href="javascript:;" class="hui">请选择发票内容</a></td>
       </tr>
       <tr><td colspan="3" style="height:10px; background:#fff;padding:0;"></td></tr>
       <tr>
        <td class="dingimg" width="75%" colspan="3">商品清单</td>
       </tr>
       
       @foreach($goodsInfo as $v)
       <tr>
        <td class="dingimg" width="15%"><img src="{{env('UPLOADS_url')}}{{$v->goods_img}}" /></td>
        <td width="50%">
         <h3>{{$v->goods_name}}</h3>
         <time>下单时间:@php date('Y-m-d H:i:s',$v->add_time)@endphp</time>
        </td>
        <td align="right"><span class="qingdan">X{{$v->buy_number}}</span></td>
       </tr>
       <tr>
        <th colspan="3"><strong class="orange"></strong></th>
       </tr>
      @endforeach
     
      </table>
     </div><!--dingdanlist/-->
     
     
    </div><!--content/-->
    
    <div class="height1"></div>
    <div class="gwcpiao">
     <table>
     @foreach($goodsInfo as $v)
      <tr goods_id='{{$v->goods_id}}'  address_id='{{$v->address_id}}'>
       <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
       <td width="50%">总计：<strong class="orange">￥{{$money}}</strong></td>
       <td width="40%"><a href="javascript:void(0)" class="jiesuan">提交订单</a></td>
      </tr>
      @endforeach
     </table>
    </div><!--gwcpiao/-->
    </div><!--maincont-->
     
       <script>
               //给确认订单绑定点击事件
        $(document).on('click','.jiesuan',function(){
               //    alert('123');
               //  //获取商品id
                  var goods_id=$(this).parents('tr').attr('goods_id');
                 
                //收货地址id 
               //   var address_id=$(this).parents('tr').attr('address_id');
               //  //支付方式
               //  var pay_type=$('.checked').attr('pay_type');
               //  //订单留言
               //  var order_talk=$("#order_talk").val();
             
               //  //通过ajax把四个值传过去
               //   $.post(
               //      "{:url('order/confirmOrder')}",
               //      {goods_id:goods_id,
               //      address_id:address_id,
               //      pay_type:pay_type,
               //      order_talk:order_talk},
               //      function(res){
               //       if(res.code==1){
               //          alert(res.font);
               //         location.href="{:url('order/oSuccessly')}?order_id="+res.order_id;//传过去一个订单id
               //       }else{
               //         alert(res.font);
               //       }
               //      },
               //      'json'
               //   )
        })
       
       </script>
    
    @endsection