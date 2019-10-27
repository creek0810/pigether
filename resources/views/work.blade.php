@extends('layouts.master')

@section('title', "作品")

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/work.css') }}" >
    <script src="https://kit.fontawesome.com/ecddf4d37d.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/work.js') }}"></script>
@endsection

@section('content')
<div class="app">
    <div class="work-container">
        <div class="btn div-green">
            <h3>
                作品
            </h3>
        </div>
        <div class="title-container">
            <h4>
                題目: {{ $work['title'] }}
            </h4>
        </div>
        <div class="content-container">
            <h4>
                內容:
            </h4>
            <h5>
                {!! $work['content'] !!}
            </h5>
        </div>
        <div class="picture-container">
            <i class="fas fa-chevron-left fa-3x" id="pre-img"></i>
            @for($i = 0; $i < count($work['images']); $i++)
                @if($i == 0)
                    <img class="work-img" src="data:image/jpeg;base64,{{ $work['images'][$i]['image'] }}">
                @else
                    <img class="work-img hidden" src="data:image/jpeg;base64,{{ $work['images'][$i]['image'] }}">
                @endif
            @endfor
            <i class="fas fa-chevron-right fa-3x" id="next-img"></i>
        </div>
    </div>
</div>
@endsection