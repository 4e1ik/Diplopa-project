@extends('layouts.diploma.diploma')
@section('content')
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-page-head">
                        <div class="page-header">
                            <h1>{{$user->nickname}} <small>Отредактируй место.</small></h1>
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
                                      action="{{route('posts.update', compact('post'))}}"
                                      enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <!-- Form Name -->
                                    <h2 class="form-title">Изображения</h2>
                                    <!-- File Button -->
                                    <div class="form-group">
                                        @foreach($images as $image)
                                            <div>
                                                <img src="{{asset('storage/'.$image->image)  }}" alt="просто">
                                                <br>
                                            </div>
                                        @endforeach
                                        <div class="col-md-4">
                                            <div class="photo-upload">
                                                <img src="images/profile-dashbaord.png" alt="">
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
{{--                                                   old('title')--}}
                                                   value="{{$post->title}}">
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
                                                   value="{{$post->content}}">
                                        </div>
                                        @error('content')
                                        <div>{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="name">Показывать место на карте?</label>
                                        <div class="col-md-8">
                                            <input name="active" type="checkbox" value="1">
                                            <input name="active" type="hidden" value="0">
                                        </div>
                                        @error('active')
                                        <div>{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Button -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="submit"></label>
                                        <div class="col-md-4">
                                            <button id="submit" name="submit" class="btn btn-primary">Сохранить изменения</button>
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
