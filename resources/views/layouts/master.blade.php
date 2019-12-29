<html>

<head>
    <title>Pigether - @yield('title')</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
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
                    @if(URL::current() == url('/pigether'))
                    <a href="#" class="nav-link" id="post-btn">發帖子</a>
                    @else
                    <a href="/pigether" class="nav-link" id="post-btn">發帖子</a>
                    @endif
                </li>
            </ul>
            @if(URL::current() == url('/pigether'))
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="搜尋帖子" aria-label="Search" id="post-search-content">
                <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="post-search">搜尋</button>
            </form>
            @endif

            <ul class="navbar-nav ml-auto">
                @if (Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/pigether/logOut">登出</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/pigether/user/{{Auth::user()->account}}">查看個人資料</a>
                        <a class="dropdown-item" href="/pigether/user/{{Auth::user()->account}}/editInfo">修改個人資料</a>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="#login-modal" data-toggle="modal">登入</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#register-modal" data-toggle="modal">註冊</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>

    @unless (Auth::check())
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">登入</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="login-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="login-user-name" class="col-form-label">{{ __('帳號:') }}</label>
                            <input id="account" type="text" class="form-control @error('account') is-invalid @enderror" name="account" value="{{ old('account') }}" required autocomplete="account" autofocus>
                            @error('account')
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">{{ __('密碼:') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-orange">登入</button>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="register-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">註冊</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="register-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="account" class="col-form-label">{{ __('帳號:') }}</label>
                            <input id="account" type="text" class="form-control @error('account') is-invalid @enderror" name="account" value="{{ old('account') }}" required autocomplete="account" autofocus>

                            @error('account')
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">{{ __('密碼:') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label">{{ __('再輸入一次密碼:') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-form-label">{{ __('姓名:') }}</label>
                            <input id="name" type="text" class="form-control" name="name" required autocomplete="name">
                        </div>

                        <div class="form-group">
                            <label for="department" class="col-form-label">{{ __('科系:') }}</label>
                            <select id="major" class="form-control" name="department" required autocomplete="department">
                                <option value="" selected></option>
                                @foreach($departments as $department)
                                <option value="{{ $department['name_en']}}">{{ $department['name_ch'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-form-label">{{ __('信箱:') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-orange">註冊</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endunless




    <div class="container-fluid">
        @yield('content')
    </div>
</body>

</html>