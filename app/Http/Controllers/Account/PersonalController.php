<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CordinatsHelper;
use App\Http\Requests\UserRequest;
use App\Models\AvatarImage;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $avatars = AvatarImage::query()->where('user_id', Auth::id())->get();
        $i = 1;
        return view('diploma.personal_cabinet', compact('user', 'users', 'i', 'avatars'));
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        $avatarImages = AvatarImage::where('user_id', Auth::id())->get();
        return view('diploma.personal_cabinet.edit', compact('user', 'avatarImages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
//        $user = User::find(Auth::id());
//        $user->fill($request->all())->save();
//        return redirect(route('account'));

        $user = User::find(Auth::id());
        $data = $request->all();
        $user->fill($data)->save();
        $data['user_id'] = $user->id;
        if ($request->hasFile('avatar')) {
            try {
                $file = $request->file('avatar');
                $name = $file->getClientOriginalName();
                $path = Storage::putFileAs('images/avatar', $file, $name); // Даем путь к этому файлу
                if ($file->clientExtension() != 'png') {
                    throw new \Exception('Загруженное изображение некорректного формата. Верный формат: .png. Попробуйте другое изображение.Можно конвертировать ');
                }
                $changedImage = \Intervention\Image\Facades\Image::make($file)->resize(200, 200, function ($constrait) {
                    $constrait->aspectRatio();
                });
                $changedImage->save(Storage::path($path));
                $data['avatar'] = $path;
                AvatarImage::query()->updateOrCreate(['user_id' => $data['user_id']], $data);
            } catch (\Exception $exception) {
                return back()->withError($exception->getMessage())->withInput();
            }
        }
        return redirect(route('account'));
    }

}
