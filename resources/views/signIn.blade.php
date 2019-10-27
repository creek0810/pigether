@extends('layouts.master')

@section('title', "SignIn")

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/signIn.css') }}" >
	<script src="{{ asset('js/SignIn.js') }}"></script>
@endsection

@section('content')
<div class="login-container">
	<div class="col-md-8">
		<div class="login-data-container">
			<div class="header col-md-6 text-md-left">{{ __('登入') }}</div>
			<hr style="background-color: #00FFFF" align="center" width="480px">
			
			<div class="row justify-content-center">
				<form method="POST" action="{{ route('login') }}">
					@csrf

					<div class="form-group row">
						<label for="account" class="col-md-4 col-form-label">{{ __('帳號:') }}</label>
					</div>
					<div class="form-group row">
						<div class="col-md-6">
							<input id="account" type="text" class="form-control @error('account') is-invalid @enderror" name="account" value="{{ old('account') }}" required autocomplete="account" autofocus>

							@error('account')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="password" class="col-md-4 col-form-label">{{ __('密碼:') }}</label>
					</div>
					
					<div class="form-group row">
						<div class="col-md-6">
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

							@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-6">
							<button type="submit" class="btn">
								{{ __('登入') }}
							</button>
						</div>
						
						<div class="col-md-8">
							@if (Route::has('password.request'))
								<a class="forgot-password btn-link" href="{{ route('password.request') }}">
									{{ __('忘記密碼?') }}
								</a>
							@endif
						</div>
					</div>
					
					<hr style="background-color: #00FFFF" align="center" width="480px">
					
					<div class="form-group row">
						<label class="col-md-4 col-form-label">{{ __('還沒註冊嗎？') }}</label>
					</div>
					
					<div class="form-group row">
						<div class="col-md-6">
							<button id="signUp" type="submit" class="btn">
								{{ __('註冊') }}
							</button>
						</div>
					</div>
				</form>	
            </div>
        </div>
    </div>
</div>
@endsection
