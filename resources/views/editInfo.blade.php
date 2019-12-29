@extends('layouts.master')

@section('title', "editInfo")

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/editInfo.css') }}" >
    <script src="{{ asset('js/editInfo.js') }}"></script>
@endsection

@section('content')
@if($info['account'] != (Auth::user()->account))
    @php
        header("Location: " . URL::to('/pigether'), true, 302);
        exit();
    @endphp
@endif
<?php
    $crypted = $info["password"];
    $msg = "";

    if(isset($_POST["old-password"]))
    {
        $oldpassword = $_POST["old-password"];
        $newpassword = $_POST["new-password"];
        $againpassword = $_POST["again-password"];
        $count = strlen($newpassword);

        if (password_verify($oldpassword, $info["password"])) {
            if($count > 7){
                if ($newpassword != $againpassword) {
                    $msg = "新密碼不一樣!請重新修改-->";		
                } else {
                    $crypted = password_hash($newpassword, PASSWORD_DEFAULT);	
                }
            }else{
                $msg = "新密碼長度應>=8位數";
            }
        } else {
            $msg = "舊密碼不符合!請重新修改-->";
        }
    }
?>		
<form action = "/pigether/updateInfo" method = "post" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="app">
        <div class="col-md-5">
            <div class="data-container">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button class="btn" id="hint-box" onclick="return false;">基本資料</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="account" class="col-sm-3 col-form-label">帳號: </label>
                    <input type="hidden" name="account" value="{{ $info['account'] }}">
                    <div class="col-sm-9">
                        <input type="text" disabled="disabled" class="form-control" id="account" value="{{ $info['account'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">密碼: </label>
                    <div class="col-sm-9">
                        <input type="hidden" name="password" id="ans-password" value="{{ $crypted }}">
                        <input type="password" disabled="disabled" class="form-control" id="password" value="{{ $crypted }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <label for="error-password" id="error-password">
                            {{ $msg }}
                        </label>
                        <button type="button" class="btn float-right" id="change-password" data-toggle="modal" data-target="#myModal2">修改密碼</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">姓名: </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $info['name'] }}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="department" class="col-sm-3 col-form-label">科系: </label>
                    <div class="col-sm-9">
                        <select id="major" class="form-control" name="department">
                            <option value="" selected>不限</option>
                            {{ $departments = App\Department::all() }}
                                @foreach($departments as $department)
                                <option value="{{ $department['name_en']}}" {{ ( $department['name_en'] == $info['departmentDetail']['name_en']) ? 'selected' : '' }}>{{ $department['name_ch'] }}</option>   
                                @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="grade" class="col-sm-3 col-form-label">年級: </label>
                    <div class="col-sm-9">
                        <select id="grade" class="form-control" name="grade">
                            <option value="">未知</option>
                            <option value="1" {{ ( $info->grade == "1") ? 'selected' : '' }}>1</option>
                            <option value="2" {{ ( $info->grade == "2") ? 'selected' : '' }}>2</option>
                            <option value="3" {{ ( $info->grade == "3") ? 'selected' : '' }}>3</option>
                            <option value="4" {{ ( $info->grade == "4") ? 'selected' : '' }}>4</option>
                            <option value="5" {{ ( $info->grade == "5") ? 'selected' : '' }}>5+</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gender" class="col-sm-3 col-form-label">性別: </label>
                    <div class="col-sm-9">
                        <select id="gender" class="form-control" name="gender">
                            <option value="" selected>未知</option>
                            <option value="male" {{ ( $info->gender == "男") ? 'selected' : '' }}>男</option>
                            <option value="female" {{ ( $info->gender == "女") ? 'selected' : '' }}>女</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="introduction" class="col-sm-3 col-form-label">自我描述: </label>
                    <div class="col-sm-9">
                        <textarea rows="3" class="form-control" id="personality" name="personality">@foreach($info['personality'] as $personality){{ $personality['personality'] }}@endforeach</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="skill" class="col-sm-3 col-form-label">技能: </label>
                    <div class="col-sm-9">
                        <textarea rows="3" class="form-control" id="skill" name="skill">@foreach($info['skills'] as $skill){{ $skill['skill'] }}@endforeach</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="contact-container">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button class="btn btn-orange" id="contact-btn" onclick="return false;">聯絡資料</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">email: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email" value="{{ $info['email'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">電話: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $info['phone'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="line_id" class="col-sm-3 col-form-label">line: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="line_id" name="line_id" value="{{ $info['line_id'] }}">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="work-container">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button class="btn btn-orange" id="work-btn" onclick="return false;">歷年作品</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            @foreach($info['works'] as $work)
                                <ul id="works-title">
                                    <li>
										<a href="/pigether/user/{{$work['account']}}/editWorks/{{$work['id']}}">{{ $work['title'] }}</a>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-orange float-right" id="update-work" data-toggle="modal" data-target="#myModal">新增</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="pic-container">
                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <img src="data:image/jpeg;base64,{{ $info['propic'] }}" style="display:block; margin:auto;" id="output" name="output"/>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="file" class="btn btn-orange" id="propic-btn" name="propic" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button class="btn btn-orange float-right" id="submit">儲存資料</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-sm">
        <form action = "/pigether/user/{{ $info['account'] }}/editInfo" method = "post">
        {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">修改密碼</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="edit-work-container">
                        <div class="form-group row">
                            <label for="old-password" class="col-sm-4 col-form-label">舊密碼: </label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="old-password" name="old-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new-password" class="col-sm-4 col-form-label">新密碼: </label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="new-password" name="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="again-password" class="col-sm-4 col-form-label">再輸一次: </label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="again-password" name="again-password">
                                <input type="hidden" id="acceptNewPassword" name="acceptNewPassword">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-orange btn-default" id="accept-new-password-button">確認</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="myModal" role="dialog" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">    <div class="modal-dialog modal-lg">
        <form action = "/pigether/newWork" method = "post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="modal-content">
                <input type="hidden" name="account" value="{{ $info['account'] }}">
                <div class="modal-header">
                    <h4 class="modal-title">新增歷年作品</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="edit-work-container">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">題目: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">內容:</label>
                            <div class="col-sm-10">
                                <textarea rows="3" class="form-control" id="content" name="content"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">相關圖片: </label>
                            <div class="col-sm-10">
                                <input type="file" class="btn btn-orange" id="image" name="images[]" multiple>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-orange btn-default" id="accept-new-work">確認</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection