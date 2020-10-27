<?php
/**
 * Created by PhpStorm.
 * User: Lint
 * Date: 2020/10/27
 * Time: 21:27
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // 指定表名
    protected $table = 'student';
    // 指定id
    protected $primaryKey = 'id';
    // 时间戳
    protected $dateFormat = 'U';
    // 自动更新时间
    public $timestamps = true;
    // 允许批量赋值的字段
    protected $fillable = ['name', 'age'];
    // 不允许批量赋值的字段
    protected $guarded = [];
}
