<html>
    <head>
        <title>Pigether - @yield('title')</title>
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
        @yield('header')
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Pigether</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{Auth::user()->name}}</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">登入</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">註冊</a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
        @yield('content')
    </body>
</html>