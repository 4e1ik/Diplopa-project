<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PersonalController1 extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index(){
        $logUser = auth()->user()->getAuthIdentifier();
        $user = User::find($logUser);
        $users = User::where('id', $logUser)->get();

        return view('diploma.personal_cabinet', compact('user', 'users'));
    }

    public function edit() {
        $logUser = auth()->user()->getAuthIdentifier();
        $user = User::find($logUser);
        return view('diploma.personal_cabinet.edit', compact('user'));
    }

}
