@extends('layouts.diploma.diploma')
@section('content')
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-page-head">
                        <div class="page-header">
                            <h1>{{$user->nickname}} <small>Добавь новое место.</small></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 profile-dashboard">
                    <div class="row">
                        <div class="col-md-7 dashboard-form">
                            <div class="bg-white pinside40 mb30">
                                <form class="form-horizontal form-material mx-2" method="post"
                                      action="{{route('posts.store')}}"
                                      enctype="multipart/form-data">
                                @csrf
                                <!-- Form Name -->
                                    <h2 class="form-title">Изображения</h2>
                                    <!-- File Button -->
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="photo-upload"><img src="images/profile-dashbaord.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-8 upload-file">
                                            <input id="filebutton" name="image[]"
                                                   class="input-file {{$errors->has('image') ? 'is-invalid':''}}"
                                                   type="file" multiple="multiple">
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <h2 class="form-title">Информация о месте</h2>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="name">Заголовок<span
                                                class="required">*</span></label>
                                        <div class="col-md-8">
                                            <input id="name" name="title" type="text" placeholder="Заголовок"
                                                   class="form-control input-md {{$errors->has('title') ? 'is-invalid':''}}"
                                                   value="{{old('title')}}">
                                        </div>
                                        @error('title')
                                        <div>{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="name">Описание места<span
                                                class="required">*</span></label>
                                        <div class="col-md-8">
                                            <input id="name" name="content" type="text" placeholder="Описание места"
                                                   class="form-control input-md {{$errors->has('title') ? 'is-invalid':''}}"
                                                   value="{{old('content')}}">
                                        </div>
                                        @error('content')
                                        <div>{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="name">Адрес места<span
                                                class="required">*</span></label>
                                        <p>Например: Минск, Жудро, 5</p>
                                        <div class="col-md-8">
                                            <input id="name" name="address" type="text" placeholder="Адрес места"
                                                   class="form-control input-md {{$errors->has('title') ? 'is-invalid':''}}"
                                                   value="{{old('address')}}" required>
                                        </div>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="name">Показывать место на карте?</label>
                                        <div class="col-md-8">
                                            <input type="radio" name="active" value="1">
                                            <label>Да</label>
                                            <input type="radio" name="active" value="0">
                                            <label>Нет</label>
                                        </div>
                                        @error('active')
                                        <div>{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Button -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="submit"></label>
                                        <div class="col-md-4">
                                            <button id="submit" name="submit" class="btn btn-primary">Добавить место</button>
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
