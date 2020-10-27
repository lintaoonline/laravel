<?php
/**
 * Created by PhpStorm.
 * User: Lint
 * Date: 2020/10/26
 * Time: 21:44
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Student;
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

    public function orm()
    {
        // $students = Student::all();
        // $students = Student::find(1);
        // $students = Student::findOrFail(11111);
        // $students = Student::where('id','>=',1001)->get(['id','name','age']);
        // $num = Student::count();

        // 模型新增
        // $students = new Student();
        // $students->name = 'hh';
        // $students->age = 18;
        // $bool = $students->save();
        // dd($students);

        // create
        // Student::create(
        //     ['name' => 'hasds', 'age' => '38']
        // );

        // 查找，没有则新增
        // $students = Student::firstOrCreate(
        //     ['name' => 'lintts', 'age' => 36]
        // );

        // 查找，没有则建立新的实例 需要保存调用save即可
        // $students = Student::firstOrNew(
        //     ['name' => 'lintts', 'age' => 46]
        // );
        // $bool = $students->save();

        // update
        // $student = Student::find(1);
        // $student->name = 'lint';
        // $bool = $student->save();
        // dd($bool);

        // $num = Student::where('id', '=', 1)->update(['age' => 11]);
        // dd($num);

        // del
        // 模型删除
        // $student = Student::find(1019);
        // $bool = $student->delete();
        // dd($bool);

        // 主键删除
        // $num = Student::destroy(1018);
        // $num = Student::destroy(1016,1017);
        // $num = Student::destroy([1014, 1015]);

        $num = Student::where('id','>',1012)->delete();
    }
}


