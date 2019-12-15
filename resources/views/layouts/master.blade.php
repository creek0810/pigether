<html>
    <head>
        <title>Pigether - @yield('title')</title>
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
        @yield('header')
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-green">
            <a class="navbar-brand" href="/pigether">Pigether</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id='navBarNav'>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/pigether/search" class="nav-link">搜尋隊友</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">發帖子</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="搜尋帖子" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">搜尋</button>
                </form>
                <ul class="navbar-nav ml-auto">
                    @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/pigether/logOut">登出</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/pigether/user/{{Auth::user()->account}}">查看個人資料</a>
                            <a class="dropdown-item" href="/pigether/user/{{Auth::user()->account}}/editInfo">修改個人資料</a>
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="/pigether/signIn">登入</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pigether/signUp">註冊</a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            @yield('content')
        </div>
    </body>
</html>