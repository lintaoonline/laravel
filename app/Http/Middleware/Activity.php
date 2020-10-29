<?php
/**
 * Created by PhpStorm.
 * User: Lint
 * Date: 2020/10/29
 * Time: 21:37
 */

namespace App\Http\Middleware;

use Closure;

class Activity
{
    // 前置
    // public function handle($request, Closure $next)
    // {
    //     if (time() < strtotime('2020-10-30')) {
    //         return redirect('activity0');
    //     }
    //     return $next($request);
    // }

    // 后置
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        var_dump($response);
        // 后置操作逻辑
        echo 111;
    }

}
