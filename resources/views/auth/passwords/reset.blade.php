@extends('home.index')

@section('content')
    <div class="container-fluid loginview">
        <div class="row justify-content-center login">
            <div class="col-md-8 loginbg"
                 style="background-image: url({{asset('storage/images/slider-1.jpg')}}); background-position: center; background-size: cover">

            </div>
            <div class="col-sm-4 pl-0 pr-0">
                <form method="POST" action="{{ route('password.update') }}" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title pb-3">
						Reset Password
					</span>
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                            <input id="exampleInputEmail1" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                            <input id="exampleInputPassword1" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="password-confirm" >Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>

                            <button type="submit" class="btn btn-primary btn-block">
                                Reset Password
                            </button>
                </form>
            </div>

        </div>
    </div>
@endsection
