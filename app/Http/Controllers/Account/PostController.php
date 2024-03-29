<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Jobs\AddPlaceJob;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Helpers\SavePostImagesHelper;

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

        $data['user_id'] = Auth::id();
        $data['post_rate'] = 1;
        $post = Post::create($data);
        $data['post_id'] = $post->id;
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $saveImage = new SavePostImagesHelper($file, $data);
                $saveImage->saveImage();
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
                $saveImage = new SavePostImagesHelper($file, $data);
                $saveImage->saveImage();
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
}
