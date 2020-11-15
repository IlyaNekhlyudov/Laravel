<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .module {
            width: 250px;
            overflow: hidden;
        }

        .line-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        .footer {
            padding: 20px;
            margin-top: 50px;
            color: rgba(255,255,255,.5);
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .feedback-link {
            color: #fff;
            text-decoration: none;
            font-size: 0.8em;
            transition: all, 0.3s;
        }

        .feedback-link:hover {
            color: gray;
            text-decoration: none;
        }

        .content {
            padding: 0px 15px 0px 15px;
        }
    </style>
</head>
<body>

<div class="container" style='padding: inherit;'>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <i class="fa fa-globe fa-2x" aria-hidden="true"></i>
        </a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item @yield('welcome')">
                    <a class="nav-link" href="{{ route('welcome') }}">Главная <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item @yield('category')">
                    <a class="nav-link" href="{{ route('category') }}">Рубрики</a>
                </li>
                <li class="nav-item @yield('news')">
                    <a class="nav-link" href="{{ route('news') }}">Новости</a>
                </li>
                <li class="nav-item @yield('request')">
                    <a class="nav-link" href="{{ route('request.create') }}">Запрос информации</a>
                </li>
            </ul>
        </div>
        <a class="btn btn-light" href="{{ route('admin') }}">Войти</a>
    </nav>
    <br>
    <div class='content'>
        @if(isset($errors) && !empty($errors))
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{ $error }}</div>
            @endforeach
        @endif
        @yield('content')
    </div>
</div>
<footer class='container footer bg-dark'>
    <span style='font-size: 0.8em'>© Nekhlyudov Ilya</span>
    <a class='feedback-link' href="{{ route('feedback.create') }}"'>Форма обратной связи</a>
</footer>
</body>
</html>
