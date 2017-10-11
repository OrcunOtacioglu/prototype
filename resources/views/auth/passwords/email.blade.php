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
                <h3>Parolamı Unuttum</h3>
                <p>Sisteme kayıtlı olan email adresinizi girerek parola sıfırlama talimatlarını içeren emaili alabilirsiniz.</p>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-3 control-label">E-Mail</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3 text-center">
                            <button type="submit" class="btn btn-primary" style="background-color: #fcb131; border: none; padding: 6px 25px;">
                                Şifre Sıfırlama Linkini Gönder
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
