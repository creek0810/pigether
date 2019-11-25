@extends('layouts.master')

@section('title', "個人資料")

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/userInfo.css') }}" >
    <script src="https://kit.fontawesome.com/ecddf4d37d.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/userInfo.js') }}"></script>
    <script src="{{ asset('js/fetchData.js') }}"></script>
@endsection

@section('content')
<div class="content">
    <div class="general-info">
        <img src="data:image/jpeg;base64,{{ $info['propic'] }}" class="propic">
        <div class="custom-text-info">
            <div class="name">姓名: {{ $info["name"] }}</div>
            <div class="score">性別: {{ $info['gender'] }}</div>
            <div class="dept">科系: {{ $info['departmentDetail']['name_ch'] }} </div>
            <div class="grade">年級: {{ $info["grade"] }}</div>
            <div class="score">評價: {{ $info['score'] }}</div>
            <div class="contact-container">
                <div class="email">
                    <a href="mailto:{{$info['email']}}">
                        <i class="far fa-envelope fa-2x"></i>
                    </a>
                </div>
                <div class="phone">電話: {{ $info['phone'] }}</div>
                <div class="line">Line: {{ $info['line'] }}</div>
            </div>
            <div class="gender"></div>
            <div class="score"></div>
        </div>
    </div>
    <div class="detail-info">
        <div class="left-container">
            <div class="skills-container">
                <button class="btn div-orange">技能</button>
                <div class='scroll-container'>
                    @foreach($info['skills'] as $skills)
                        <div>{{ $skills['skill'] }}</div>
                    @endforeach
                </div>
            </div>
            <div class="personality-container">
                <button class="btn div-orange">個性</button>
                <div class="scroll-container">
                    @foreach($info['personality'] as $personality)
                        <div>{{ $personality['personality'] }}</div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="works-container">
            <button class="btn div-green">歷年作品</button>
            <div class="scroll-container">
                @foreach($info['works'] as $work)
                    <div>
                        <a href="/pigether/user/{{$work['account']}}/works/{{$work['id']}}">{{ $work['title'] }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="comment-container">
        <h4>評論</h4>
        <div class="scroll-container">
            @for($i = 0; $i < count($info['comments']); $i++)
            <div class="comment-{{ $i % 2 }}">
                <div class="comment-name">
                    <h6>
                        <a href="/pigether/user/{{ $info['comments'][$i]['comment_account'] }}">{{ $info['comments'][$i]['comment_account'] }}</a>
                    </h6>
                </div>
                <div class="comment-content">
                    {!! $info['comments'][$i]['content'] !!}
                </div>
            </div>
            @endfor
        </div>
    </div>
    @if (Auth::check())
    <div class="comment-form">
        <form action="">
            <div class="form-inline form-group">
                <label for="comment-score">請選擇評分</label>
                <input type="number" class="form-control mx-sm-3" id="comment-score" max="5" min="1">
            </div>
            <div class="form-inline form-group">
                <label for="comment-score">請輸入內容</label>
                <textarea id="comment-text" class="form-control mx-sm-3" rows="3"></textarea>
            </div>
            <button class="btn btn-orange" id="add-comment">新增評論</button>
        </form>
    </div>
    @endif
</div>
@endsection