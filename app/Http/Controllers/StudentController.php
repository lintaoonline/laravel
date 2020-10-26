<?php
/**
 * Created by PhpStorm.
 * User: Lint
 * Date: 2020/10/26
 * Time: 21:44
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function info($id = 1)
    {
        $student = DB::select("select * from student where id = {$id}");
        $bool = DB::insert('insert into student (name,age) values (?,?)', ['wang', 18]);
        $num = DB::update('update student set age = ?,name = ? where id = ?', [20, 'lintt', 1]);
        $del = DB::delete('delete from student where id > ?', [1001]);
        // print_r($student);
        // print_r($bool);
        dd($num);
        return $id;
        // return 'user-info' . $id;
        // return view('user/info', [
        //     'name' => 'lint',
        //     'id' => $id,
        // ]);
    }

    public function query()
    {
        echo '<pre/>';
        // $id = DB::table('student')->insertGetId([
        //     'name'=>'hah',
        //     'age'=>18,
        // ]);
        // dd($id);

        // $bool = DB::table('student')->insert([
        //     ['name' => 'hah', 'age' => 18],
        //     ['name' => 'heh', 'age' => 19],
        // ]);
        // dd($bool);

        // $num = DB::table('student')
        //     ->where('id',1)
        //     ->update(['age'=>25]);
        // dd($num);

        // $inc = DB::table('student')->where('id', 1)->increment('age', 3);

        // $dec = DB::table('student')->where('id', 1)->decrement('age', 3);

        // $num = DB::table('student')->where('id', 1009)->delete();
        // $num = DB::table('student')->delete(1008);

        // 查询所有
        // $students = DB::table('student')->get(['id','name']);
        // 取符合条件的第一条
        // $students = DB::table('student')->first(['id','name']);

        // where
        // $students = DB::table('student')
        //     ->where('id','>=',1001)
        //     ->where('age','>=',19)
        //     ->get(['id','name','age']);

        // pluck
        // $students = DB::table('student')->pluck('name','id');

        // lists
        // $students = DB::table('student')->lists('name', 'id');
        // select
        // $students = DB::table('student')->select(['id', 'name', 'age'])->get()->toArray();

        // chunk 分段获取
        // DB::table('student')->orderBy('age')->chunk(2, function ($student) {
        //     var_dump($student);
        //     return false;
        // });

        // print_r($students);


    }
}


