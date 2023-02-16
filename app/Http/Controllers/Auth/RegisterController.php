<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
//            'name' => ['string','min:3', 'max:50', 'alpha'],
            'nickname' => ['required', 'string','min:3', 'max:50', 'unique:users', 'alpha_dash'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'max:20', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()], //Как сделать правило для Password::min...
        ])->setCustomMessages([
            'name.min' => 'Поле :attribute должно быть не менее :min букв!',
            'nickname.min' => 'Поле :attribute должно быть не менее :min букв!',
            'name.max' => 'Поле :attribute должно быть не более :max букв!',
            'nickname.max' => 'Поле :attribute должно быть не более :max букв!',
            'email.max' => 'Поле :attribute должно быть не более :max символов!',
            'password.max' => 'Поле :attribute должно быть не более :max символов!',
            'name.alpha' => 'Поле :attribute должно состоять только из букв!',
            'nickname.required' => 'Поле :attribute обязательно для заполнения!',
            'nickname.unique:users' => 'Упс, такой никнейм уже существует!',
            'email.unique:users' => 'Упс, такая почта уже существует!',
            'email.email' => 'Почта введена некорректно!',
            'email.required' => 'Поле :attribute обязательно для заполнения!',
            'password.required' => 'Поле :attribute обязательно для заполнения!',
            'nickname.string' => 'Поле :attribute не должно быть пустым!',
            'email.string' => 'Поле :attribute не должно быть пустым!',
            'password.string' => 'Поле :attribute не должно быть пустым!',
        ]);
    }

    /**
     * Create a new users instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
//            'name' => $data['name'],
            'nickname' => $data['nickname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
