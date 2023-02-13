<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>EDIT POST</h1>
{{--{{ collect($post[0])->all()['id'] }}--}}
{{--{{ dd($post['id'])}}--}}

{{--{{ dd($post) }}--}}

{{--@foreach($post as $p)--}}
{{--    {{ dd($post) }}--}}
<form method="post" action="{{ route('posts.update', $post) }} " enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <p>Название</p>
    {{--        {{dd($post)}}--}}
    <input name="title" type="text" value="{{$post->title}}">
    @error('title')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <p>Контент</p>
    <input name="content" type="text" value="{{$post->content}}">
    @error('content')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <p>Картинки</p>
    @foreach($images as $image)
        <img src="{{asset('storage/'.$image->image)  }}" alt="просто">
        {{--        <form action="{{ route('image_destroy', compact('post','image')) }}" method="post">--}}
        {{--            @method('DELETE')--}}
        {{--            @csrf--}}
        {{--            <button class="btn btn-danger" href="" type="submit">DELETE IMAGE</button>--}}
        {{--        </form>--}}
        <br>
    @endforeach
    <div class="col-md-12">
        <input multiple="multiple" name="image[]" type="file"
               class="form-control form-control-line {{$errors->has('image') ? 'is-invalid':''}}" value="">
    </div>
    <br>
    <button type="submit">Сохранить</button>
</form>
</body>
</html>
