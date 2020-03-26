<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//短信验证
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
//邮箱验证
use App\Mail\SendCode;
use Illuminate\Support\Facades\Mail;

use Validator;
use App\Userss;
use App\Goods;
class LoginController extends Controller
{
   public function log(){
     return view('index.login');
   }

   public function logDo(){
       $data=request()->all();
       $res=Userss::where($data)->first();
       //dd($res);
       if($res){
           session(['user_acount'=>$res['user_acount'],'user_id'=>$res['user_id']]);
           return redirect('/');
       }else{
        return redirect('/log')->with('msg','用户名或此密码错误');
       }
     
          
   }

   public function reg(){
    return view('index.reg');
  }
   //验证码
  public function sendSMS(){
      $acount= request()->acount;
      //php 验证 手机号
      $Treg='/^1[3|5|6|7|8|9]\d{9}$/';
        if(!preg_match($Treg,$acount)){
             return json_encode(['code'=>'00001','msg'=>'请输入正确的手机号或邮箱']);
        }

         $code=rand(100000,999999);
        $result= $this->send($acount,$code);
        if($result['Message']=='OK'){
             session(['code'=>$code]);
             //发送成功
            return json_encode(['code'=>'00000','msg'=>'发送成功!']);
        }
        //发送失败
        return json_encode(['code'=>'00000','msg'=>$result['Message']]);
  }

  //邮箱验证码
  public function sendEmail(){
    $acount= request()->acount;
    //php 验证邮箱
    $Ereg='/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/';
        // dd(preg_match($Ereg,$acount));
      if(!preg_match($Ereg,$acount)){
           return json_encode(['code'=>'00001','msg'=>'请输入正确的手机号或邮箱']);
      }
        //生成随机验证码
         $code=rand(100000,999999);
        //发送邮件
        Mail::to($acount)->send(new SendCode($code));
       //发送成功 存入session
       session(['code'=>$code]);
       return json_encode(['code'=>'00000','msg'=>'发送成功!']);
  }


  //发送短信验证码
  public function send($acount,$code){
    // Download：https://github.com/aliyun/openapi-sdk-php
    // Usage：https://github.com/aliyun/openapi-sdk-php/blob/master/README.md
    
    AlibabaCloud::accessKeyClient('LTAI4FpF93Xu6fnocdNJymNL', '97DSRCPCbmxGCwrbUFwjClZ02ex0av')
                            ->regionId('cn-hangzhou')
                            ->asDefaultClient();
    
          try {
                $result = AlibabaCloud::rpc()
                                    ->product('Dysmsapi')
                                    // ->scheme('https') // https | http
                                    ->version('2017-05-25')
                                    ->action('SendSms')
                                    ->method('POST')
                                    ->host('dysmsapi.aliyuncs.com')
                                    ->options([
                                            'query' => [
                                              'RegionId' => "cn-hangzhou",
                                              'PhoneNumbers' => $acount,
                                              'SignName' => "天天超市",
                                              'TemplateCode' => "SMS_183241803",
                                              'TemplateParam' =>"{code:$code}",
                                            ],
                                        ])
                              ->request();
               return $result->toArray();
            } catch (ClientException $e) {
                return $e->getErrorMessage() . PHP_EOL;
            } catch (ServerException $e) {
                return $e->getErrorMessage() . PHP_EOL;
            }
        }

   //注册执行
   public function regDo() {
       $data=request()->all();
       //验证
        $validator=Validator::make($data,[
            'user_acount'=>'required|unique:users',
            'user_pwd'=>'required|regex:/^[\w]{6,18}$/',
            'user_paw'=>'same:user_pwd',
        ],[
            'user_acount.required'=>'账号不能为空',
             'user_acount.unique'=>'账号已存在',
             'user_pwd.required'=>'密码不能为空',
             'user_pwd.regex'=>'密码是6-18位的字母或数字',
             'user_paw.same'=>'确认密码必须和密码保持一致'
        ]);
        if ($validator->fails()) {
            return redirect('/reg')
            ->withErrors($validator)
            ->withInput();
       }
     
       $res=Userss::create($data);
        if($res){
           return redirect('/');
        }
   }

   

   //退出
    public function qiue(){
        session(['user_acount'=>null]);
        return redirect('/');
    }
}
