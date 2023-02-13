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
<h1>CREATE POST</h1>
<form class="form-horizontal form-material mx-2" method="post" action="{{route('posts.store')}}"
      enctype="multipart/form-data">

    @csrf
    <div class="form-group">
        <label class="col-md-12">Title</label>
        <div class="col-md-12">
            <input name="title" type="text"
                   class="form-control form-control-line {{$errors->has('title') ? 'is-invalid':''}}"
                   value="{{old('title')}}">
        </div>
{{--        @error('name')--}}
{{--        <div>{{ $message }}</div>--}}
{{--        @enderror--}}
    </div>
    <div class="form-group">
        <label class="col-md-12">Content</label>
        <div class="col-md-12">
            <input name="content" type="text"
                   class="form-control form-control-line {{$errors->has('content') ? 'is-invalid':''}}"
                   value="{{old('content')}}">
        </div>
{{--        @error('description')--}}
{{--        <div>{{ $message }}</div>--}}
{{--        @enderror--}}
    </div>
    <div class="form-group">
        <label class="col-md-12">Image</label>
        <div class="col-md-12">
            <input multiple="multiple" name="image[]" type="file"
                   class="form-control form-control-line {{$errors->has('image') ? 'is-invalid':''}}" value="">
        </div>
        @error('image')
        <div>{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label class="col-md-12">Active</label>
        <div class="col-md-12">
            <input name="active" type="checkbox"
                   class="{{$errors->has('active') ? 'is-invalid':''}}" value="1">
        </div>
        @error('active')
        <div>{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-success text-white">Save</button>
        </div>
    </div>
</form>
</body>
</html>
