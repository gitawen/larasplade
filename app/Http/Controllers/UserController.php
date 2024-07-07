<?php

namespace App\Http\Controllers;

use App\Tables\Users;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', [
            // 'users' => SpladeTable::for(User::class)
            //     ->column('name')
            //     ->column('email')
            //     ->paginate(15),
            'users' => Users::class,
        ]);
    }
}
