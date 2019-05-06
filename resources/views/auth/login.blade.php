@extends('home.index')

@section('content')
    <div class="container-fluid loginview">
        <div class="row justify-content-center login">
            <div class="col-md-8 loginbg"
                 style="background-image: url({{asset('storage/images/slider-2.jpg')}}); background-position: center; background-size: cover">

            </div>
            <div class="col-sm-4 pl-0 pr-0">
                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title pb-3">
						Login to continue
					</span>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input id="exampleInputEmail1" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input id="exampleInputPassword1" type="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                               name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 pl-0 pr-0">
                            <input class="" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link pl-0" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif

                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-12 pl-0 pr-0">
                            <button type="submit" class="btn btn-info btn-block">
                                {{ __('Login') }}
                            </button>
                        </div>

                    </div>
                </form>

            </div>

        </div>
    </div>

@endsection
