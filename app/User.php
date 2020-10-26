<?php
/**
 * Created by PhpStorm.
 * User: Lint
 * Date: 2020/10/26
 * Time: 22:22
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public static function getInfo()
    {
        return 'this is user info';
    }
}
