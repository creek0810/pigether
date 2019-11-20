@extends('layouts.master')

@section('title', "signUp")

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/signUp.css') }}" >
	<script src="{{ asset('js/SignUp.js') }}"></script>
@endsection

@section('content')
<div class="register-container">
	<div class="col-md-8">
		<div class="register-data-container">
			<div class="header col-md-6 text-md-left">{{ __('登入') }}</div>
			<hr style="background-color: #00FFFF" align="center" width="480px">
			
			<div class="row justify-content-center">
				<form method="POST" action="{{ route('register') }}">
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
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

							@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="password-confirm" class="col-md-6 col-form-label">{{ __('再輸入一次密碼:') }}</label>
					</div>
					
					<div class="form-group row">
						<div class="col-md-6">
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
						</div>
					</div>
					
					 <div class="form-group row">
						<label for="name" class="col-md-6 col-form-label">{{ __('姓名:') }}</label>
					</div>
					
					<div class="form-group row">
						<div class="col-md-6">
							<input id="name" type="text" class="form-control" name="name" required autocomplete="name">
						</div>
					</div>
					
					<div class="form-group row">
						<label for="department" class="col-md-6 col-form-label">{{ __('科系:') }}</label>
					</div>
					
					<div class="form-group row">
						<div class="col-md-6">
							<select id="major" class="form-control" name="department" required autocomplete="department">
								<option value="" selected></option>
									@foreach($departments as $department)
										<option value="{{ $department['name_en']}}">{{ $department['name_ch'] }}</option>
									@endforeach
							</select>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="email" class="col-md-6 col-form-label">{{ __('信箱:') }}</label>
					</div>
					
					<div class="form-group row">
						<div class="col-md-6">
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					
					
					<div class="form-group row">
						<div class="col-md-6">
							<button id="signIn" type="submit" class="btn">
								{{ __('已有帳號') }}
							</button>
							
							<button type="submit" class="btn">
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
