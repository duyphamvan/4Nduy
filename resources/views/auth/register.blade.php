@extends('home.index')

@section('content')
    <div class="container-fluid loginview">
        <div class="row justify-content-center login">
            <div class="col-md-8 loginbg"
                 style="background-image: url({{asset('storage/images/slider-1.jpg')}}); background-position: center; background-size: cover">

            </div>
            <div class="col-sm-4 pl-0 pr-0">
                <form method="POST" action="{{ route('register') }}" class="register100-form validate-form">
                    @csrf
                    <span class="login100-form-title pb-3">
						Register
					</span>
                    <div class="form-group">
                        <label for="exampleInputName">User Name</label>
                            <input id="exampleInputName" type="text"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                   value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                            <input id="exampleInputEmail1" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Passwords</label>
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
                        <label for="exampleInputPassword1-confirm">Confirm Passwords</label>

                            <input id="exampleInputPassword1-confirm" type="password" class="form-control"
                                   name="password_confirmation" required>
                    </div>

                    <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Register') }}
                            </button>
                    </div>
                </form>
            </div>

        </div>
    </div>


@endsection
