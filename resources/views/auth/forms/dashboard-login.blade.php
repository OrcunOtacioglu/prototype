<form method="POST" action="{{ action('Auth\LoginController@login') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="sr-only">E-Mail Address</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

        @if ($errors->has('email'))
            <span class="text-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="sr-only">Password</label>
        <input id="password" type="password" class="form-control" name="password" required>

        @if ($errors->has('password'))
            <span class="text-danger">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group clearfix">
        <div class="checkbox-custom checkbox-inline checkbox-primary float-left">
            <label for="remember">Remember Me</label>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">
            Login
        </button>
    </div>
</form>
