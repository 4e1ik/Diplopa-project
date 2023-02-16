@extends('layouts.diploma.diploma')

@section('content')
    <body>
    <div class="collapse" id="searcharea">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
    <button class="btn tp-btn-primary" type="button">Search</button>
    </span></div>
    </div>
    <div class="main-container">
        <div class="container">
            <div class="row ">
                <div class="col-md-8 st-tabs ">
                    <!-- Nav tabs -->
                    <div class="well-box">
                        <h3>Войти в свой аккаунт</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Ваш почтовый
                                    адрес</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email"
                                           placeholder="Ваш email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Пароль</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           placeholder="Ваш пароль" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-0" style="margin-top: 10px">
                                <div class="col-md-6 offset-md-4">
                                    <a class="btn btn-primary nav-link" href="{{ route('register') }}">Зарегистрироваться</a>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="well-box social-login"><a href="#" class="btn facebook-btn"><i
                                class="fa fa-facebook-square"></i>Facebook</a> <a href="#" class="btn twitter-btn"><i
                                class="fa fa-twitter-square"></i>Twitter</a> <a href="#" class="btn google-btn"><i
                                class="fa fa-google-plus-square"></i>Google+</a></div>
                </div>
            </div>
        </div>
        <!-- /.page header -->
        <div class="tp-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Login Page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

@endsection
