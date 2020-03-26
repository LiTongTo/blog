@extends('layouts.shop')
@section('title','商品详情页')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>产品详情</h1>
      </div>
     </header>
     <div id="sliderA" class="slider">
         @php $goods_imgs=explode('|',$gInfo->goods_imgs);@endphp
        @foreach($goods_imgs as $v)
        <img src="{{env('UPLOADS_URL')}}{{$v}}" />
       @endforeach
     </div><!--sliderA-->
     <table class="jia-len">
      <tr>
       <th><strong class="orange">￥{{$gInfo->goods_price}}</strong></th>
       <td>
        <input type="text" class="spinnerExample" />
       </td>
      </tr>
      <tr>
       <td>
        <strong>{{$gInfo->goods_name}}</strong>
        <p class="hui">访问量:{{$count}}</p>
       </td>
       <td align="right">
        <a href="javascript:;" class="shoucang"><span class="glyphicon glyphicon-star-empty"></span></a>
       </td>
      </tr>
     </table>
     <div class="height2"></div>
     <h3 class="proTitle">商品规格</h3>
     <ul class="guige">
      <li class="guigeCur"><a href="javascript:;">50ML</a></li>
      <li><a href="javascript:;">100ML</a></li>
      <li><a href="javascript:;">150ML</a></li>
      <li><a href="javascript:;">200ML</a></li>
      <li><a href="javascript:;">300ML</a></li>
      <div class="clearfix"></div>
     </ul><!--guige/-->
     <div class="height2"></div>
     <div class="zhaieq">
      <a href="javascript:;" class="zhaiCur">商品简介</a>
      <a href="javascript:;">商品参数</a>
      <a href="javascript:;" style="background:none;">订购列表</a>
      <div class="clearfix"></div>
     </div><!--zhaieq/-->
     <div class="proinfoList">
      <img src="{{env('UPLOADS_URL')}}{{$gInfo->goods_img}}" width="636" height="822" />
     </div><!--proinfoList/-->
     <div class="proinfoList">
      暂无信息....
     </div><!--proinfoList/-->
     <div class="proinfoList">
      暂无信息......
     </div><!--proinfoList/-->
     <table class="jrgwc">
      <tr>
       <th>
        <a href="{{url('/')}}"><span class="glyphicon glyphicon-home"></span></a>
       </th>
       <td><a id='addcar' href="javascript:void(0)">加入购物车</a></td>
      </tr>
     </table>
      @include('index.public.footer');
        <script>
            $(document).on('click','#addcar',function(){
                 //购买数量
                 var buy_number=$('.spinnerExample').val();
                   if(buy_number<1){
                       alert('请更改购买数量');
                   }
                 var goods_id={{$gInfo->goods_id}};
                 $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                 $.post('/addcar',{goods_id:goods_id,buy_number:buy_number},function(result){
                    if(result.code=='00004'){
                         alert(result.msg);
                         return;
                    }
                    if(result.code=='00000'){
                         alert(result.msg);
                         location.href="/car";
                    }
                 },'json')
            });
        </script>
     @endsection