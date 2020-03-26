<?php

namespace App\Http\Middleware;

use Closure;

class CheckLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         $user_acount=$request->session()->get('user_acount');
        //  dd($user_acount);
         if(!$user_acount){
              return redirect('/log')->with('msg','请您先登录！');
         }
        return $next($request);
    }
}
