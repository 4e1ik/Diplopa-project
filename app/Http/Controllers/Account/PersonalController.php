<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CordinatsHelper;
use App\Http\Requests\UserRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $users = User::where('id', Auth::id())->get();
        $i = 1;
        return view('diploma.personal_cabinet', compact('user', 'users', 'i'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user_places = Post::where('user_id', Auth::id())->where('active', 1)->get();
        $places = new CordinatsHelper($user_places);
        return $places->getCordinats();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('diploma.personal_cabinet.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        $user = User::find(Auth::id());
        $user->fill($request->all())->save();
        return redirect(route('account'));
    }

}
