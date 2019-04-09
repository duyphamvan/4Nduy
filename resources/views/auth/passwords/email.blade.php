@extends('home.index')

@section('content')
    <div class="container-fluid loginview">
        <div class="row justify-content-center login">
            <div class="col-md-8 loginbg"
                 style="background-image: url({{asset('storage/images/slider-1.jpg')}}); background-position: center; background-size: cover">

            </div>
            <div class="col-sm-4 pl-0 pr-0">
                <form method="POST" action="{{ route('password.email') }}"  class="login100-form validate-form">
                    @csrf
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                    <span class="login100-form-title pb-3">
						Reset Password
					</span>

                    <div class="form-group">
                        <label for="email" >E-Mail Address</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                    </div>
                            <button type="submit" class="btn btn-info btn-block">
                               Send Password Reset Link
                            </button>
                </form>
            </div>

        </div>
    </div>
@endsection
