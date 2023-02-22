@extends('layouts.diploma.diploma')
@section('content')
    <div class="vendor-page-header">
        <div class="vendor-profile-img"></div>
        <div class="vendor-profile-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 hidden-xs">
                        <div class="vendor-profile-block">
                            @if($avatars != null)
                                @foreach($avatars as $image)
                                    <div>
                                        <img class="img-rounded" src="{{asset('storage/'.$image->avatar)  }}" alt="просто">
                                        <br>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="profile-meta mb30">
                            <div class="row">
                                <div class="col-md-12">
                                    @if($user->name || $user->surname)
                                        <h1 class="vendor-profile-title">{{$user->name}} {{$user->surname}}</h1>
                                        <h1 class="vendor-profile-title">{{$user->nickname}}</h1>
                                    @else
                                        <h1 class="vendor-profile-title">{{$user->nickname}}</h1>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8"><span class="meta-address"> <i class="fa fa-book"></i> <span
                                            class="address"> {{ $user->about }} </span> </span>
                                </div>
                            </div>
                            <a href="{{ route('account_edit') }}">
                                <button style="margin: 10px 0px 10px 0px" type="button" class="btn btn-secondary">Редактировать
                                    данные пользователя
                                </button>
                            </a>
                            <a href="{{ route('posts.create') }}">
                                <button type="button" class="btn btn-success">Добавить место</button>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        @include('diploma.includes.user-map')

    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Заголовок</th>
                    <th scope="col">Текст</th>
                    <th scope="col">Изображения</th>
                    <th scope="col">Адрес</th>
                    <th scope="col">Тип места</th>
                    <th scope="col">Создан</th>
                    <th scope="col">Отредактирован</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    @foreach($user->posts as $post)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td class="text-align">{{$post->title}}</td>
                            <td style="width: 400px">{{$post->content}}</td>
                            <td>
                                @foreach($post->images as $image)
                                    <img src="{{asset('storage/'.$image->image)  }}" alt="просто">
                                    <br>
                                @endforeach
                            </td>
                            <td>{{$post->address}}</td>
                            <td>@include('diploma.includes.places')</td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                            <td>
                                <a href="{{ route('posts.edit', compact('post')) }}">
                                    <button class="btn btn-info">ИЗМЕНИТЬ</button>
                                </a>
                                <form action="{{ route('posts.destroy', compact('post')) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" href="" type="submit">УДАЛИТЬ</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
