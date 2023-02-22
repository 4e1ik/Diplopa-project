<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Путешествуй по Беларуси</title>
    <!-- Bootstrap -->
    <link href="{{asset('/diploma_assets/dist/css/Diploma/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Template style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('/diploma_assets/dist/css/Diploma/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/diploma_assets/dist/css/Diploma/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/diploma_assets/dist/css/Diploma/owl.theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/diploma_assets/dist/css/Diploma/owl.transitions.css')}}">
    <!-- Font used in template -->
    <link
        href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Roboto:400,400italic,500,500italic,700,700italic,300italic,300'
        rel='stylesheet' type='text/css'>
    <!--font awesome icon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">


    {{--    Яндекс карта--}}
    <script src="https://api-maps.yandex.ru/2.1/?apikey=c12c269b-9fc8-41b7-871a-8864673cb03e&lang=ru_RU"
            type="text/javascript"></script>
    <link rel="stylesheet" href="{{ asset('/diploma_assets/dist/css/Diploma/map/newMap.css') }}">
{{--    Яндекс карта--}}


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="collapse" id="searcharea">
    <!-- top search -->
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for...">
        <span class="input-group-btn">
              <button class="btn btn-primary" type="button">Search</button>
          </span>
    </div>
</div>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 logo">
                <div class="navbar-brand">
                    <a href="{{ route('home') }}"><img
                            src="{{asset('/diploma_assets/dist/images/Diploma/BigLogo.png')}}" alt="Логотип"
                            class="img-rounded" style="height:50px"></a>
                </div>
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="navigation" id="navigation">
                    <ul>
                        @if(auth()->check())
                            @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'account')
                                <li><a href="{{route('home')}}">Главная</a></li>
                            @else
                                <li><a href="{{route('account')}}">Личный кабинет</a></li>
                            @endif
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Выйти') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li><a href="{{route('login')}}">Войти</a></li>
                            <li><a href=""></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider end-->

@yield('content')

<!-- /. Testimonial Section -->
<!-- /. Call to action -->
<div class="footer">
    <!-- Footer -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 ft-aboutus">
                <h2>Travel In Belarus</h2>
                <p>Этот сервис позволит вам вести учет мест, где вы побывали и делиться вашими впечатлениями от их посещения
                    с другими пользователями! <a href="{{ route('posts.create') }}">Добавить место!</a></p>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4 newsletter">
                <div style="margin-top: 0px" class="social-icon">
                    <h2>Связаться с разработчиком</h2>
                    <ul>
                        <li><a href="https://www.instagram.com/4e1ovek.by"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://vk.com/4e1ovek_by"><i class="fa fa-vk"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.Footer -->
<div class="tiny-footer">
    <!-- Tiny footer -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">Разработано © 2022. Артемий Севостьян</div>
        </div>
    </div>
</div>
<!-- /. Tiny Footer -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('/diploma_assets/dist/js/Diploma/jquery.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('/diploma_assets/dist/js/Diploma/bootstrap.min.js')}}"></script>
<!-- Flex Nav Script -->
<script src="{{asset('/diploma_assets/dist/js/Diploma/jquery.flexnav.js')}}" type="text/javascript"></script>
<script src="{{asset('/diploma_assets/dist/js/Diploma/navigation.js')}}"></script>
<!-- slider -->
<script src="{{asset('/diploma_assets/dist/js/Diploma/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/diploma_assets/dist/js/Diploma/slider.js')}}"></script>
<!-- testimonial -->
<script type="text/javascript" src="{{asset('/diploma_assets/dist/js/Diploma/testimonial.js')}}"></script>
<!-- sticky header -->
<script src="{{asset('/diploma_assets/dist/js/Diploma/jquery.sticky.js')}}"></script>
<script src="{{asset('/diploma_assets/dist/js/Diploma/header-sticky.js')}}"></script>

{{--Яндекс карта--}}
@if(\Illuminate\Support\Facades\Route::currentRouteName() == 'account')
    <script type="module" src="{{ asset('/diploma_assets/dist/js/Diploma/map/userMap.js') }}"></script>
@else
    <script type="module" src="{{ asset('/diploma_assets/dist/js/Diploma/map/allUsersMap.js') }}"></script>
@endif
{{--<script src="{{ asset('/diploma_assets/dist/js/Diploma/map/newMap.js') }}"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
{{--Яндекс карта--}}
</body>

</html>
