@extends('layouts.master')

@section('title', "search")

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}" >
    <script src="{{ asset('js/search.js') }}"></script>
    <script src="{{ asset('js/fetchData.js') }}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-5 col-sm-12 padding-10">
        <div class="search-container">
            <div class="form-group row">
                <div class="col-sm-12">
                    <button class="btn" id="hint-box">請輸入以下欄位進行查詢</button>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">姓名: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" >
                </div>
            </div>
            <div class="form-group row">
                <label for="gender" class="col-sm-2 col-form-label">性別: </label>
                <div class="col-sm-10">
                    <select id="gender" class="form-control">
                        <option value="" selected>不限</option>
                        <option value="male">男</option>
                        <option value="female">女</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="major" class="col-sm-2 col-form-label">科系: </label>
                <div class="col-sm-10">
                    <select id="major" class="form-control">
                        <option value="" selected>不限</option>
                        @foreach($departments as $department)
                            <option value="{{ $department['name_en']}}">{{ $department['name_ch'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="grade" class="col-sm-2 col-form-label">年級: </label>
                <div class="col-sm-10">
                    <select id="grade" class="form-control">
                        <option value="">不限</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5+</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="score" class="col-sm-2 col-form-label">評分: </label>
                <div class="col-sm-10">
                    <select id="score" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="btn-right-container">
                <button class="btn btn-orange" id="submit">submit</button>
            </div>
        </div>
    </div>
    <div class="col-lg-7 col-sm-12 padding-10">
        <div id="result-container" class="overflow-auto result-container"></div>
    </div>
</div>
@endsection