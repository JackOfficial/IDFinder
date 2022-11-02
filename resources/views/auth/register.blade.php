@extends('auth.app')
@section('title', 'Register')
@section('content')

<div class="container my-5">
	<!-- /page_header -->
			<div class="row justify-content-center">
			<div class="col-xl-3 col-lg-3 col-md-12">
			</div>
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">Register</h3>
					<div class="form_container">
                        <div class="row mb-2">
							<div class="col-lg-6 pl-lg-1 pr-1">
								<a href="{{ url('/redirect') }}" class="btn btn-danger d-block social_bt google">Login with Google</a>
							</div>
							<div class="col-lg-6 pr-lg-1 pl-1">
								<a href="{{ url('/redirect') }}" class="btn btn-success d-block social_bt facebook">Login with Facebook</a>
							</div>
						</div>
                        <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
							<input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name*" required autocomplete="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
						<div class="form-group">
							<input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email*" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
						</div>

                        <div class="row no-gutters">
                            <div class="col-6 pr-1">
                                <div class="form-group">
                                    <input type="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password*" autocomplete="password" required />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-6 pl-1">
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="Re-type password*" class="form-control @error('password_confirmation') is-invalid @enderror" autocomplete="new-password" required />
                                </div>
                            </div>
                        </div>

                        <div class="row no-gutters">
                            <div class="col-6 pr-1">
                                <div class="form-group">
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" autocomplete="address" required placeholder="Address*" />
                                </div>
                            </div>
                            <div class="col-6 pl-1">
                                <div class="form-group">
                                    <input type="telephone" name="phone" value="{{old('phone')}}" placeholder="Mobile Phone*" class="form-control @error('phone') is-invalid @enderror" required autocomplete="phone">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subscribe">Subscribe to our newsletter and updates</label>
                            <div>
                                <label class="radio-inline">
                                    <input type="radio" name="subscribe" value="1" checked="checked"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="subscribe" value="0"> No
                                </label>
                            </div>
                        </div>
                        
						<hr>
						<div class="form-group">
							<label class="container_check">Accept <a href="#0">Terms and conditions</a>
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="text-center">
                            <input type="submit" value="Signup" class="btn btn-primary d-block">
                        </div>
                    </form>
					</div>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
			</div>
            <div class="col-xl-3 col-lg-3 col-md-12">
			</div>
		</div>
		<!-- /row -->
		</div>

@endsection