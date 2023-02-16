<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(Auth::id());

        return view('diploma.posts.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();
//        dd($data);
        $data['user_id'] = Auth::id();
        $data['post_rate'] = 1;

//        $address = 'Minsk, Zhodro 22';
        $post = Post::create($data);
        $data['post_id'] = $post->id;
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $name = $file->getClientOriginalName();
                $path = Storage::putFileAs('images', $file, $name);
                $changedImage = \Intervention\Image\Facades\Image::make($file)->resize(200,200, function($constrait){
                    $constrait->aspectRatio();
                });
                $changedImage->save(Storage::path($path));
                $data['image'] = $path; // Даем путь к этому файлу

                Image::create($data);
            }
        }

        return redirect(route('account'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
//        dd($image);
        $user = User::find(Auth::id());
        $images = Image::where('post_id', $post->id)->get();
        return view('diploma.posts.edit', compact('post', 'images', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {

        $data = $request->all();
        $post->fill($data)->save();
        $data['post_id'] = $post->id;

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $name = $file->getClientOriginalName();
                $path = Storage::putFileAs('images', $file, $name); // Даем путь к этому файлу
                $changedImage = \Intervention\Image\Facades\Image::make($file)->resize(200,200, function($constrait){
                    $constrait->aspectRatio();
                });
                $changedImage->save(Storage::path($path));
                $data['image'] = $path;
                Image::create($data);

            }
        }

        return redirect(route('account'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('account'));
    }

//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function imageDestroy(PostRequest $request ,Post $post, Image $image)
//    {
////        dd($image);
////        Image::where('id',$id)->delete();
////        $image->delete();
//        $post->fill($request->all())->save();
//        return redirect(route('account_edit'));
//    }
}
