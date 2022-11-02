@extends('auth.app')
@section('title', 'Login')
@section('content')

<div class="container my-5">
	<!-- /page_header -->
			<div class="row justify-content-center">
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="box_account">
					<div class="d-flex justify-content-center my-5"> <img src="images/logo-dark.png" alt="" class="logo-dark w-25" /></div>
					<h3 class="client">Login</h3>
					<div class="form_container">
						<div class="row no-gutters">
							<div class="col-lg-6 pl-lg-1 pr-1">
								<a href="{{ url('/redirect') }}" class="btn btn-danger d-block">Login with Google</a>
							</div>
							<div class="col-lg-6 pr-lg-1 pl-1">
								<a href="{{ url('/redirect') }}" class="btn btn-primary d-block">Login with Facebook</a>
							</div>
						</div>
						<div class="my-2 text-center"><span>Or</span></div>
						<form method="POST" action="{{ route('login') }}">
							@csrf
						<div class="form-group">
							<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email*" required>
							@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>
						<div class="form-group">
							<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password*" required>
							@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>
						<div class="clearfix add_bottom_15">
							<div class="checkboxes float-left">
								<label class="container_check">Remember me
									<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
									<span class="checkmark"></span>
								</label>
							</div>

							@if (Route::has('password.request'))
							<div class="float-right"><a id="forgot" href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a></div>
							@endif
							
						</div>
						<div><input type="submit" value="Log In" class="btn btn-primary d-block"></div>
						</form>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
				<div class="mt-2">
					New to foxx-kennels? <a href="{{ route('register') }}">Sign up</a>
				</div>
				<div class="row d-none">
					<div class="col-md-6 d-none d-lg-block">
						<ul class="list_ok">
							<li>Find Locations</li>
							<li>Quality Location check</li>
							<li>Data Protection</li>
						</ul>
					</div>
					<div class="col-md-6 d-none d-lg-block">
						<ul class="list_ok">
							<li>Secure Payments</li>
							<li>H24 Support</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			
		</div>
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
		</div>
		<!-- /row -->
		</div>
	</div>
    
@endsection