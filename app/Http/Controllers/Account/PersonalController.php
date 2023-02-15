<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
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
//        $address = 'Москва, Тверская, д.7';

       // $response = Http::get('https://geocode-maps.yandex.ru/1.x/?apikey=c12c269b-9fc8-41b7-871a-8864673cb03e&format=json&geocode=' . urlencode($address));

//        $logUser = auth()->user()->getAuthIdentifier();

        $user = User::find(Auth::id());
        $users = User::where('id', Auth::id())->get();
        $i = 1;


        return view('diploma.personal_cabinet', compact('user', 'users', 'i'));
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
