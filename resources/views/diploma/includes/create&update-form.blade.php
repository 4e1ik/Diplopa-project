<div class="bg-white pinside40 mb30">
    <form class="form-horizontal form-material mx-2" method="post"
          action="{{$route_name == 'posts.edit' ? route('posts.update', compact('post')) : route('posts.store')}}"
          enctype="multipart/form-data">
    @if($route_name == 'posts.edit')
        @method('PUT')
    @endif
    @csrf
    <!-- Form Name -->
        <h2 class="form-title">Изображения</h2>
        <!-- File Button -->
        <div class="form-group">
            @if($route_name == 'posts.edit')
                @foreach($images as $image)
                    <div>
                        <img src="{{asset('storage/'.$image->image)  }}" alt="просто">
                        <br>
                    </div>
                @endforeach
            @endif
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
                        <div class="alert alert-danger">{{ session('error')}}<a target="_blank" class="alert-link" href="https://image.online-convert.com/ru/convert-to-png"> тут.</a></div>
                    @endif
                @error('image')
                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                @enderror
        </div>

        <!-- Text input-->
        <h2 class="form-title">Информация о месте</h2>
        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Заголовок<span
                    class="required">*</span></label>
            <div class="col-md-8">
                <input id="name" name="title" type="text" placeholder="Заголовок"
                       class="form-control input-md {{$errors->has('title') ? 'is-invalid':''}}"
                       value="{{$route_name == 'posts.edit' ? $post->title : old('title')}}" required>
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
                       value="{{ $route_name == 'posts.edit' ? $post->content : old('content')}}" required>
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
                       value="{{ $route_name == 'posts.edit' ? $post->address : old('address')}}" required>
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
                    <option selected disabled>Выберите тип места</option>
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
            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
            @enderror
        </div>
        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
                <button id="submit" name="submit" type="submit" class="btn btn-primary">
                    @if($route_name == 'posts.edit')
                        Сохранить изменения
                    @else
                        Добавить место
                    @endif
                </button>
            </div>
        </div>
    </form>
    {{--                                @dump($errors->all())--}}
</div>
