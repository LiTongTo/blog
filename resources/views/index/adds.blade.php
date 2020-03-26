@extends('layouts.shop')
@section('title','添加收货地址')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>收货地址</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url('/adds/addsDo')}}" method="get" class="reg-login">
      <div class="lrBox">
       <div class="lrList"><input type="text" placeholder="收货人" name='address_name' /></div>
       <div class="lrList"><input type="text" placeholder="详细地址" name='address_detail' /></div>
       <div class="lrList">
        <select name="province">
        <option>省份/直辖市</option>
          @foreach($pInfo as $v)
           <option value="{{$v->id}}">{{$v->name}}</option>
          @endforeach
        </select>
       </div>
       <div class="lrList">
        <select name='city'>
         <option>区县</option>
        </select>
       </div>
       <div class="lrList">
        <select name='area'>
         <option>详细地址</option>
        </select>
       </div>
       <div class="lrList"><input type="text" placeholder="手机" name='address_tel'/></div>
       <div class="lrList2"><input type="text" placeholder="设为默认地址" /> <button name='is_default' value='2'>设为默认</button></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="保存" />
      </div>
     </form><!--reg-login/-->
     
    
 @include('index.public.footer');


   <script>
         
   
   </script>

 @endsection;