@extends('layouts.shop')
@section('title','注册')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{'/reg/regDo'}}" method="get" class="reg-login">
      <h3>已经有账号了？点此<a class="orange" href="{{'/log'}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList">
         <input type="text" name='user_acount' placeholder="输入手机号码或者邮箱号" />
         <b style="color:red;">{{$errors->first('user_acount')}}</b>
       </div>
       <div class="lrList2"><input type="text" name='user_code' placeholder="输入短信验证码" />
        <button type="button">获取验证码</button>
       </div>
       <div class="lrList">
           <input type="password" name='user_pwd' placeholder="设置新密码（6-18位数字或字母）" />
           <b style="color:red;">{{$errors->first('user_pwd')}}</b>
       </div>
       <div class="lrList">
          <input type="password" name='user_paw' placeholder="再次输入密码" />
          <b style="color:red;">{{$errors->first('user_paw')}}</b>
       </div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即注册" />
      </div>
     </form><!--reg-login/-->
     @include('index.public.footer');
        <script>
            $(document).on('click','button',function(){
                 var acount=$('input[name="user_acount"]').val();
                 var Treg=/^1[3|5|6|7|8|9]\d{9}$/;
                 if(Treg.test(acount)){
                     //发送手机验证码
                     $.get('/reg/sendSMS',{acount:acount},function(result){
                            if(result.code='00001'){
                              alert(result.msg);
                            }
                            if(result.code='00000'){
                              alert(result.msg);
                            }
                            
                     },'json')
                     return;
                 }
                 var Ereg=/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;
                  // alert(Ereg.test(acount));
                 if(Ereg.test(acount)){
                     //发送邮箱验证码
                     $.get('/reg/sendEmail',{acount:acount},function(result){
                       
                            if(result.code='00001'){
                              alert(result.msg);
                            }
                            if(result.code='00000'){
                              alert(result.msg);
                            }
                            
                     },'json')
                     return;
                 }


                 alert('请输入正确的手机号或邮箱');
                 return;
            })
        </script>
        @endsection