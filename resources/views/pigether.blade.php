@extends('layouts.master')
@extends('pigether_modal')

@section('title',"pigether")

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/pigether.css') }}">
<script src="{{ asset('js/pigether.js') }}"></script>
<script src="{{ asset('js/fetchData.js') }}"></script>
@endsection

@section('content')
<div class="app">
    <div class="post_container" id="post_result">
        @foreach($postDatas as $post)
        <div class="post_box{{$loop->index %2 +1}}" id="post{{$post->id}}">
            <div class="post_box_img">
                <img src="https://olivesanimals.weebly.com/uploads/5/1/4/6/51461719/989613_orig.jpg" alt="Oops something wrong~">
            </div>
            <div class="post_box_info">
                <div id="post_id{{$post->id}}" hidden>{{$post->id}}</div>
                <div id="post_owner_account{{$post->id}}" hidden>{{$post->account}}</div>
                <div class="post_title" id="post_title{{$post->id}}">{{$post->title}}</div>
                <div class="text-secondary post_time" id="post_update_time{{$post->id}}">
                    最後更新時間: {{ isset($post->updated_at) ? $post->updated_at : $post->created_at }}
                </div>
                <div>    
                    <div class="contentInfo">
                    <h5>課程資訊:</h5>
                        @foreach($post->course as $ci)
                            @if($loop->index <= 0) 
                                @for($i=0; $i < 12 ; $i++) 
                                    &nbsp 
                                @endfor 
                                {{$ci}}
                            @endif
                        @endforeach
                        ...
                        <div id="post_course{{$post->id}}" hidden>
                            @foreach($post->course as $i)
                            {{$i}}<br>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <h5>隊友條件:</h5>
                        <div class="contentInfo">
                        @foreach($post->teamAbility as $ti)

                            @if($loop->index <= 0) 
                                @for($i=0; $i < 12 ; $i++) 
                                    &nbsp 
                                @endfor 
                                {{$ti}}
                            @endif
                        @endforeach
                        ...
                        <div  id="post_team_ability{{$post->id}}" hidden>
                            @foreach($post->teamAbility as $i)
                            {{$i}}<br>
                            @endforeach
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="user_container" id="user_info">
        @if(count($user)!=0)
        <div class="user_image">
            @if($user[0]['propic'])
            <img src="data:image/jpeg;base64,{{$user[0]['propic']}}" alt="Oops~">
            @else
            <img src="https://images-na.ssl-images-amazon.com/images/I/51t3T95HZ%2BL._SX466_.jpg" alt="">
            @endif
        </div>
        <div class="user_info">
            <div class="user_name" id="current_user_name">{{$user[0]->name}}</div>
            <ul>
                <li>科系: {{$user[0]->department}}</li>
                @foreach($user[0]->skills as $skill)
                <li>技能{{$loop->index + 1}}: {{ $skill['skill'] }}</li>
                @endforeach
                @if(count($user[0]->skills) == 0)
                <li>技能 : 目前還沒有，趕快去新增吧~</li>
                @endif
            </ul>
        </div>
        @else
        <div class="user_image">
            <img src="https://images-na.ssl-images-amazon.com/images/I/51t3T95HZ%2BL._SX466_.jpg" alt="">
        </div>
        <div class="user_info">
            <div class="user_name" id="current_user_name">未登入</div>
        </div>
        @endif
    </div>
</div>
@endsection