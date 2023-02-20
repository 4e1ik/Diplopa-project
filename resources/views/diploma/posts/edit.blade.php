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
                                        @if (session('error'))
                                            <div class="alert alert-danger">{{ session('error') }}</div>
                                        @endif
                                    </div>

                                    <!-- Text input-->
                                    <h2 class="form-title">Информация о месте</h2>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="name">Заголовок<span
                                                class="required">*</span></label>
                                        <div class="col-md-8">
                                            <input id="name" name="title" type="text" placeholder="Заголовок"
                                                   class="form-control input-md {{$errors->has('title') ? 'is-invalid':''}}"
                                                   value="{{$post->title}}" required>
                                        </div>
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="name">Описание места<span
                                                class="required">*</span></label>
                                        <div class="col-md-8">
                                            <input id="name" name="content" type="text" placeholder="Описание места"
                                                   class="form-control input-md {{$errors->has('title') ? 'is-invalid':''}}"
                                                   value="{{$post->content}}" required>
                                        </div>
                                        @error('content')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="name">Адрес места<span
                                                class="required">*</span></label>
                                        <p>Например: Минск, Жудро, 5</p>
                                        <div class="col-md-8">
                                            <input id="name" name="address" type="text" placeholder="Адрес места"
                                                   class="form-control input-md {{$errors->has('title') ? 'is-invalid':''}}"
                                                   value="{{$post->address}}" required>
                                        </div>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="name">Показывать место на
                                            карте?</label>
                                        <div class="col-md-8">
                                            <input type="radio" name="active" value="1">
                                            <label>Да</label>
                                            <input type="radio" name="active" value="0">
                                            <label>Нет</label>
                                        </div>
                                        @error('active')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="name">Выберите тип места</label>
                                        <div class="col-md-8">
                                            <select name="place" id="">
                                                <option disabled>Выберите тип места</option>
                                                <option value="1">Парк</option>
                                                <option value="2">Достопримечательность</option>
                                                <option value="3">Кафе</option>
                                                <option value="4">Ресторан</option>
                                                <option value="5">Музей</option>
                                                <option value="6">Театр</option>
                                                <option value="7">Кинотеатр</option>
                                                <option value="8">Другое</option>
                                            </select>
                                        </div>
                                        @error('place')
                                        <div>{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Button -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="submit"></label>
                                        <div class="col-md-4">
                                            <button id="submit" name="submit" type="submit" class="btn btn-primary">
                                                Сохранить изменения
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                @dump($errors->all())
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
