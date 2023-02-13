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
<h1>Edit User</h1>
{{--{{ dd($user) }}--}}
<p>{{$user->name}}</p>

<form method="post" action="{{ route('account_update') }}">
{{--<form method="post" action="{{ route('personal_cabinet.update',auth()->user(), ['User'=>$user]) }}">--}}
    @method('PUT')
    @csrf
    <p>Имя</p>
    <input name="name" type="text" value="{{$user->name}}">
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <p>Фамилия</p>
    <input name="surname" type="text" value="{{$user->surname}}">
    @error('surname')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <p>О себе</p>
    <input name="about" type="text" value="{{$user->about}}">
    @error('about')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
{{--    <input name="password" type="text" value="{{$user->password}}">--}}
    <button type="submit">Сохранить</button>
</form>
</body>
</html>
