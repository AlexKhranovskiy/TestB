<?php

namespace App\Http\Controllers\Admin\Post;


use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('admin.post.index', ['users' => User::all()]);
    }
}
