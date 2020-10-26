<?php
/**
 * Created by PhpStorm.
 * User: Lint
 * Date: 2020/10/26
 * Time: 21:44
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function info($id = 1)
    {
        return 'user-info' . $id;
    }
}


