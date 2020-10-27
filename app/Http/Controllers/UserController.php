<?php
/**
 * Created by PhpStorm.
 * User: Lint
 * Date: 2020/10/26
 * Time: 21:44
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function info($id = 1)
    {
        return User::getInfo();
        // return 'user-info' . $id;
        // return view('user/info', [
        //     'name' => 'lint',
        //     'id' => $id,
        // ]);
    }

    /**
     * Notes:依赖注入 获取request实例 createFromGlobals() createRequestFromFactory()
     * User: Lint
     * Date: 2020/10/27 22:38
     * @param Request $request
     */
    public function user(Request $request)
    {
        // echo $request->input('id');
        // echo $request->input('sex', 'unkonw');
        if ($request->has('id')) {
            echo $request->input('id');
        } else {
            echo '无此参数';
        }

        // 所有参数
        // dd($request->all());
        echo $request->method();
        echo $request->ajax();
        echo $request->isMethod('GET');

        // 是否符合url规则
        $res = $request->is('user');
        $res = $request->is('user/*');
        echo $res;
        // 获取当前url 不带参数
        echo $request->url();


    }
}


