@extends('frontend.layout')

@section('content')
    <div style="
        background: url('/frontend/img/loginImg.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        min-height: 450px;
        ">
        <div style="
        background: rgba(0,0,0,0.4);
        display: block;
        z-index: 100;
        height: 100% !important;
        min-height: 450px;
    "></div>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Yeni Şifre Belirleme</h3>
            <p>Yeni şifrenizi aşağıdaki alanları doldurarak belirleyebilirsiniz.</p>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-3 control-label">E-Mail</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-3 control-label">Parola</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="col-md-3 control-label">Parola Doğrulama</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <button type="submit" class="btn btn-primary" style="background-color: #fcb131; border: none; padding: 6px 25px;">
                            Parolayı Sıfırla
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
