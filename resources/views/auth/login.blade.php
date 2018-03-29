@extends('layouts.app')

@section('content')
  <div class="bg-light">
    <div class="container">
      <div class="row justify-content-md-center">
          <div class="col-md-4">
            <form method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}
          <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
          <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input name="email" type="email" id="inputmail" class="form-control" placeholder="Email address" required="" autofocus="">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
            <label for="inputPassword" class="sr-only">Password</label>
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
          </div>
          <a class="btn btn-link" href="{{ route('password.request') }}">
              Forgot Your Password?
          </a>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
        </form>
      </div></div>
        </div>
    </div>
  </div>
@endsection
