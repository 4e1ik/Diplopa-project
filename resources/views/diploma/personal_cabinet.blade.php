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
<h1>Личный кабинет</h1>
<a href="{{route('home')}}">Главная</a>
<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ route('logout') }}"
       onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">
        {{ __('Выйти') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
{{--@foreach($users as $users)--}}
<br>
{{$user->id}}
<br>
{{$user->name}}
<br>
{{$user->surname}}
<br>
{{$user->nickname}}
{{--    @endforeach--}}
<br>
<a href="{{ route('posts.create') }}">Добавить место</a>
<br>
{{--{{dd(url(route('personal_cabinet.edit', $user->name)))}}--}}
{{--<a href="{{route('personal_cabinet.edit', auth()->user()->getAuthIdentifierName())}}">Редактировать данные пользователя</a>--}}
<a href="{{ route('account_edit') }}">Редактировать данные пользователя</a>

<table border="1">
    <caption>Посты пользователя</caption>
    <tr>
        <th>id Поста</th>
        <th>id Пользователя</th>
        <th>Заголовок</th>
        <th>Текст</th>
        <th>Рейтинг поста</th>
        <th>Картинка</th>
        <th>Активный</th>
        <th>Опубликован</th>
        <th>Отредактирован</th>
    </tr>
    @foreach($users as $user)
{{--        {{ dd($users) }}--}}
        @foreach($user->posts as $post)
{{--            {{ dd($post) }}--}}
{{--            @if($post->active == 1)--}}
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user_id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->content}}</td>
                    <td>{{$post->post_rate}}</td>
                    <td>
                        @foreach($post->images as $image)
{{--                            {{dd($image->image)}}--}}
{{--                            <img src="{{asset('../storage/app/'.$image->image) }}" alt="просто">--}}
                            <img src="{{asset('storage/'.$image->image)  }}" alt="просто">
                            <br>
                        @endforeach
                    </td>
                    <td>{{$post->active}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('posts.edit', compact('post')) }}">
{{--                        <a class="btn btn-info" href="{{ route('posts.edit', $post->title) }}">--}}
                            <button class="btn btn-info">EDIT</button>
                        </a>
                        <form action="{{ route('posts.destroy', compact('post')) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" href="" type="submit">DELETE</button>
                        </form>
                    </td>
                </tr>
{{--            @endif--}}
        @endforeach
    @endforeach
</table>
</body>
</html>
