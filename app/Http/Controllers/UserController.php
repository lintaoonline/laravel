<?php
/**
 * Created by PhpStorm.
 * User: Lint
 * Date: 2020/10/26
 * Time: 21:44
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;

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

    public function session1(Request $request)
    {
        $request->session()->put('key1', 'value1');
        echo $request->session()->get('key1');

        session()->put('key2', 'value2');
        echo session()->get('key2');

        Session::put('key3', 'value3');
        echo Session::get('key3', 'default');

        // 数组
        Session::push('student', 'a');
        Session::push('student', 'b');
        // dd(Session::get('student'));

        // 取所有值
        Session::all();
        // 判断是否存在
        Session::has('key1');
        // 删除
        Session::forget('key1');
        // 删除所有
        // Session::flush();
        dd(Session::all());

        // 暂存数据 只有第一次访问有数据 暂无用
        // Session::flash('key-flash','val-flash');
        // echo Session::get('key-flash');


    }

    public function session2()
    {
        echo Session::get('msg');
    }

    public function response()
    {
        $data = [
            'state' => 1,
            'msg' => 'ok',
            'data' => [1, 2],
        ];
        // return response()->json($data);

        // 重定向
        return redirect('session1');
        return redirect('session2')->with('msg', 'aaa');
        return redirect()->action('UserController@info')->with('msg', 'aaa');
        return redirect()->route('session2')->with('msg', 'aaa');
        return redirect()->back();
    }

    public function activity0()
    {
        return '活动将要开始';
    }

    public function activity1()
    {
        return '活动进行中';
    }

    public function activity2()
    {
        return '活动已结束';
    }

    /**
     * Notes:加入到队列
     * User: Lint
     * Date: 2020/10/29 22:30
     */
    public function queue()
    {
        // php artisan queue:table
        // php artisan migrate
        // php artisan make:job SendEmail
        // php artisan queue:listen
        // php artisan queue:failed-table 创建失败队列表 失败的队列会在失败表中
        // php artisan migrate
        // php artisan queue:failed 查看失败队列
        // php artisan queue:retry uuid 重试失败的队列 推回到队列表
        // php artisan queue:retry all 重试所有失败列队
        // php artisan queue:forget uuid 舍弃某一条失败队列
        // php artisan queue:flush删除所有失败队列
        dispatch(new SendEmail('3333@qq.com'));
    }

}


