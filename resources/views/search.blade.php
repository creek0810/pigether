@extends('layouts.master')

@section('title', "search")

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}" >
    <script src="{{ asset('js/search.js') }}"></script>
@endsection

@section('content')
<div class="app">
    <div class="search-container">
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
                    <option value="all" selected>不限</option>
                    <option value="male">男</option>
                    <option value="female">女</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="major" class="col-sm-2 col-form-label">科系: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="major" >
            </div>
        </div>
        <div class="form-group row">
            <label for="grade" class="col-sm-2 col-form-label">年級: </label>
            <div class="col-sm-10">
                <select id="grade" class="form-control">
                    <option value="all">不限</option>
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
        <div class="form-group row">
            <button class="btn btn-primary" id="submit">submit</button>
        </div>
    </div>
    <div class="result-container" id="result-container">
</div>
@endsection