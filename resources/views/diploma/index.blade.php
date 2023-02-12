<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://api-maps.yandex.ru/2.1/?apikey=c12c269b-9fc8-41b7-871a-8864673cb03e&lang=ru_RU"
            type="text/javascript"></script>
    <link rel="stylesheet" href="{{ asset('/diploma_assets/dist/css/Diploma/map/newMap.css') }}">
    <title>Document</title>
</head>
<body>
<h1>Главная</h1>
{{--<a href="{{route('diploma.show', auth()->users()->getAuthIdentifier())}}">Личный кабинет</a>--}}

{{--<a href="--}}
{{--@if(auth()->check())--}}
{{--{{route('diploma.show', auth()->users()->getAuthIdentifier())}}--}}
{{--@else--}}
{{--{{route('login')}}--}}
{{--@endif--}}
{{--    ">Личный кабинет</a>--}}



@if(auth()->check())
    <a href="{{route('account')}}">Личный кабинет</a>
@else
    <a href="{{route('login')}}">Войти</a>
@endif
<div id="map-test" class="map-test"></div>

{{--@foreach($users as $users)--}}
{{--    @foreach($users->posts as $posts)--}}
{{--        <div>{{$posts->id}}</div>--}}
{{--    @endforeach--}}
{{--@endforeach--}}


{{--@foreach($users as $users)--}}
{{--    @foreach($users->posts as $posts)--}}
{{--        <div>{{$posts->title}}</div>--}}
{{--    @endforeach--}}
{{--@endforeach--}}

{{--@foreach($posts as $posts)--}}
{{--    @foreach($posts->images as $image)--}}
{{--        <div>{{$image->id}}</div>--}}
{{--    @endforeach--}}
{{--@endforeach--}}


{{--@foreach($posts->images as $image)--}}
{{--    <div>{{$image->id}}</div>--}}
{{--@endforeach--}}
<script src="{{ asset('/diploma_assets/dist/js/Diploma/newMap1.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</body>
</html>
