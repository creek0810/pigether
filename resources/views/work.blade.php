@extends('layouts.master')

@section('title', "作品")

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/work.css') }}" >
    <script src="{{ asset('js/work.js') }}"></script>
@endsection

@section('content')
<div class="app">
    <div class="work-container">
        <div class="btn div-green title-div">
            <h2>
                作品
            </h2>
        </div>
        <div class="title-container">
            <h4>
                題目: {{ $work['title'] }}
            </h4>
        </div>
        <div class="content-container">
            <h4>
                內容: {{ $work['content'] }}
            </h4>
        </div>
        <div class="picture-container">
            @foreach($work['images'] as $image)
                <img class="work-img" src="data:image/jpeg;base64,{{ $image['image'] }}">
            @endforeach
        </div>
    </div>
</div>
@endsection