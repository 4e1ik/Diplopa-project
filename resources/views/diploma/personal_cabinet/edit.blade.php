@extends('layouts.diploma.diploma')
@section('content')
    <div class="main-container">
        <div class="vendor-page-header">
            <div class="vendor-profile-img"></div>
            <div class="vendor-profile-info">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 hidden-xs">
                            <div class="vendor-profile-block">
                                @foreach($avatarImages as $image)
                                    <div>
                                        <img class="img-rounded" src="{{asset('storage/'.$image->avatar)  }}" alt="просто">
                                        <br>
                                    </div>
                                @endforeach
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
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="dashboard-page-head">--}}
{{--                        <div class="page-header">--}}
{{--                            <h1>{{$user->nickname}} <small>редактируй и изменяй свой профиль</small></h1>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="container">
            <div class="row">
                <div class="col-md-12 profile-dashboard">
                    <div class="row">
                        <div class="col-md-12 dashboard-form">
                            <div class="bg-white pinside20 mb30">

                                <form class="form-horizontal" method="post" action="{{ route('account_update') }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <!-- Text input-->
                                    <h2 class="form-title">Редактировать данные</h2>

                                    <div class="form-group">
                                        <p>Аватарка пользователя</p>
                                        @foreach($avatarImages as $image)
                                            <div>
                                                <img class="img-rounded" src="{{asset('storage/'.$image->avatar)  }}" alt="просто">
                                                <br>
                                            </div>
                                        @endforeach
{{--                                        <div class="col-md-4">--}}
{{--                                            <div class="photo-upload">--}}
{{--                                                <img src="images/profile-dashbaord.png" alt="">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

                                        <div class="col-md-8 upload-file">
                                            <input id="filebutton" name="avatar"
                                                   class="input-file {{$errors->has('avatar') ? 'is-invalid':''}}"
                                                   type="file">
                                        </div>
                                            @if (session('error'))
                                                <div class="alert alert-danger">{{ session('error')}}<a target="_blank" class="alert-link" href="https://image.online-convert.com/ru/convert-to-png"> тут.</a></div>
                                            @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="name">Имя пользователя</label>
                                        <div class="col-md-8">
                                            <input id="name" name="name" type="text" value="{{$user->name}}"
                                                   class="form-control input-md">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="name">Фамилия пользователя</label>
                                        <div class="col-md-8">
                                            <input id="name" name="surname" type="text" value="{{$user->surname}}"
                                                   class="form-control input-md" >
                                            @error('surname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="name">О себе</label>
                                        <div class="col-md-8">
                                            <input id="name" name="about" type="text" value="{{$user->about}}"
                                                   class="form-control input-md" >
                                            @error('about')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Button -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="submit"></label>
                                        <div class="col-md-4">
                                            <button id="submit" name="submit" class="btn btn-primary">Сохранить</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
