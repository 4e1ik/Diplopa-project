<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){

//        $regUser = auth()->users()->getAuthIdentifier();
        $users = User::all();
        $posts = Post::all();
        return view('diploma.index', compact('users', 'posts'));
    }
}
