<?php

namespace App\Http\Controllers\Web\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list_()
    {
        $users = DB::select('select * from users');

        //var_dump($users);
        //die;
        return view('user.index', ['users' => $users]);    }
}
