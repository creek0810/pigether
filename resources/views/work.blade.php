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
            作品
        </div>
        <div class="title-container">
            題目: {{ $work['title'] }}
        </div>
        <div class="content-container"></div>
        <div class="picture-container"></div>
    </div>
</div>
@endsection