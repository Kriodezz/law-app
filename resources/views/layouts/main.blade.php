<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Юридическая консультация</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
    <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand" href="{{ route('application.index') }}">На главную</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false" id="1">Заявки</a>
                    <div class="dropdown-menu" aria-labelledby="1">
                        <a class="dropdown-item" href="{{ route('application.index') }}">Все заявки</a>

                        @if(auth()->user() && auth()->user()->role == 2)
                            <form class="d-flex mr-3" action="{{ route('application.index') }}">
                                <button class="dropdown-item" type="submit">Показать только мои заявки</button>
                                <input type="hidden" name="client" value="{{ auth()->user()->id }}">
                            </form>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('application.create') }}">Оставить заявку</a>
                        @endif

                        @if(auth()->user() && auth()->user()->role == 1)
                            <form class="d-flex mr-3" action="{{ route('application.index') }}">
                                <button class="dropdown-item" type="submit">Заявки в работе</button>
                                <input type="hidden" name="lawyer" value="{{ auth()->user()->id }}">
                            </form>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input type="submit" class="btn btn-outline-secondar" value="Выйти">
                </form>
            </li>
        </ul>
    </div>
</nav>
@yield('content')
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</body>
</html>
