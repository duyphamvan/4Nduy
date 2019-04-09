@extends('home.index')
@section('content')

<div class="container-fluid loginview">
    <div class="row justify-content-center login">
        <div class="col-md-8 loginbg"
             style="background-image: url({{asset('storage/images/slider-3.jpg')}}); background-position: center; background-size: cover">

        </div>
        <div class="col-sm-4 pl-0 pr-0">
                <form  class="login100-form validate-form" method="POST" action="{{ route('changePassword') }}">
                    {{ csrf_field() }}
                    <span class="login100-form-title pb-3">
						Change Password
					</span>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                        <label for="new-password">Current Password</label>
                            <input id="new-password" type="password" class="form-control" name="current-password" required>

                            @if ($errors->has('current-password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('current-password') }}</strong>
                            </span>
                            @endif
                    </div>

                    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                        <label for="new-password">New Password</label>
                            <input id="new-password" type="password" class="form-control" name="new-password" required>

                            @if ($errors->has('new-password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('new-password') }}</strong>
                            </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="new-password-confirm">Confirm New Password</label>
                            <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                    </div>
                            <button type="submit" class="btn btn-primary btn-block">
                                Change Password
                            </button>
                </form>

        </div>


    </div>
</div>

@endsection
