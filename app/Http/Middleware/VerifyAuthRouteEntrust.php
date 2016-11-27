<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use Entrust;
use Auth;
class VerifyAuthRouteEntrust
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

        if (!$this->verifyAuthRouteEntrust()) {
            //不能访问
            dd('拦截，无权限访问');
        }
        return $next($request);
    }


    /**
     * 验证当前用户是否有权限访问当前路由
     * @return bool
     */
    public function verifyAuthRouteEntrust()
    {
        $currentRouteName = Route::currentRouteName();
        return Entrust::can($currentRouteName);
    }

}
