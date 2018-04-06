@extends('layouts.app')

@section('css')
    <style type="text/css">
        label {
            font-size: 20px;
        }
        input[type='text'], input[type='email'], input[type='password'] {
            font-size: 20px;
            padding: 2rem 1rem;
        }

    </style>
@endsection

@section('main')
    <div class="row">
        <div class="column small-12">
            <div class="callout training-callout secondary margin-top-2">
                <h1>Login</h1>
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <label class="large-6">E-Mail Address

                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </label>
                    <label class="large-6">Password

                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </label>
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>

                    <button type="submit" class="button large">
                        Login
                    </button>

                    <a class="button clear" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
