@extends('layouts.master')

@section('title',"pigether")

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pigether.css') }}" >
    <script src="{{ asset('js/pigether.js') }}"></script>
    <script src="{{ asset('js/fetchData.js') }}"></script>
@endsection

@section('content')
<div class="app">

    <div class="search_container">
        <div class="search_box">
            <div class="post_box1">
                <div class="post_box_img"></div>
                <div class="post_box_info"></div>
            </div>
            <div class="post_box2">
                <div class="post_box_img"></div>
                <div class="post_box_info"></div>
            </div>
            <div class="post_box1">
                <div class="post_box_img"></div>
                <div class="post_box_info"></div>
            </div>
            <div class="post_box2">
                <div class="post_box_img"></div>
                <div class="post_box_info"></div>
            </div>
        </div>
    </div>
    <div class="user_container">    
        <div class="user_box" id="user_info">
            <div class="user_image">
                <img src="" alt="沒有圖片">
            </div>
            <div class="user_info">
                <div class="user_info_column"><h5><b>未登入</b></h5></div>
            </div>
    </div></div>

</div>

@endsection
