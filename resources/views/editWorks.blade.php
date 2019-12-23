@extends('layouts.master')

@section('title', "editWorks")

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/editWorks.css') }}" >
    <script src="{{ asset('js/editWorks.js') }}"></script>
@endsection

@section('content')

<div class="app">
    
    <div class="col-md-10">
        <div class="edit-work-container">
            <form action = "/pigether/updateWork" method = "post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="account" value="{{ $work['account'] }}">
                <input type="hidden" name="id" value="{{ $work['id'] }}">
                <div class="form-group row">
                    <div class="col-sm-8">
                        <button class="btn" id="hint-box" onclick="return false;">歷年作品</button>
                    </div>
                    <div class="col-sm-4">
                        <label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                        <button class="btn btn-orange" id="delete-btn">刪除該歷年作品</button>
                        <button class="btn btn-orange float-right" id="submit-btn">確認修改</button>
                        <input type="hidden" id="select-work" name="select-work" value="0">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">題目: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" value="{{ $work['title'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="content" class="col-sm-2 col-form-label">內容:</label>
                    <div class="col-sm-10">
                        <textarea rows="5" class="form-control" id="content" name="content">{{ $work["content"] }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pictures" class="col-sm-2 col-form-label">相關圖片: </label>
                    <div class="col-sm-10">
                        <input type="file" class="btn btn-orange" id="update-work-pic" name="images[]" multiple>
                        <button class="btn btn-orange" id="update-img">上傳圖片</button>
                        
                    </div>
                </div>
            </form>
            <div class="form-group row">
                <label for="works" class="col-sm-2 col-form-label">作品集: </label>
                <div class="col-sm-10">
                    <div class="form-group row">
                        <div style="position: relative">
                        @foreach($work['images'] as $image)
                            <div class="col-md-2">
                                <div style="position: absolute">
                                    <form action="/pigether/deleteWork" id="form1" method="get">
                                        <input type="hidden" name="account" value="{{ $work['account'] }}">
                                        <input type="hidden" name="id" value="{{ $work['id'] }}">
                                        <img class="work-img" src="data:image/jpeg;base64,{{ $image['image'] }}">
                                        <input type="hidden" name="imageno" value="{{ $image['id'] }}">          
                                        <button class="btn btn-orange btn-default" style="padding: 0; position: absolute; top: 1px; right: 1px">X</button>
                                    </form>
                                </div>
                            </div>    
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</div>
@endsection