<?php

namespace App\Http\Middleware;

use Closure;

class CheckToken
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
        if($request->input('refer') != 'haodiandian.cn'){
            return redirect()->to('http://www.haodiandian.cn');
        }
        return $next($request);
    }
}
