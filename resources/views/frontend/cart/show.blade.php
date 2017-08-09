@extends('frontend.layout')

@section('title', 'Your Order')

@section('content')
    <div style="
            background: url('/images/cover-images/coverBG.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            min-height: 450px;
            margin-bottom: 50px;
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
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Ödeme Detayları</h2>
                    </div>

                    <div class="panel-body">
                        @foreach($items as $item)
                            <p style="margin-bottom: 0;"><strong>{{ $item->options->event }}</strong></p>
                            <p>{{ $item->name }} x {{ $item->qty }}</p>
                            <a href="{{ action('CartController@deleteItem', ['id' => $item->rowId]) }}" class="text-danger">Kaldır</a>
                        @endforeach

                        <hr>
                        <p><strong>Ara Toplam {{ Cart::subtotal() }} TL</strong></p>
                        <p><strong>Vergi {{ Cart::tax() }} TL</strong></p>
                    </div>
                    
                    <div class="panel-footer text-center">
                        <p><strong>TOPLAM {{ Cart::total() }} TL</strong></p>
                        @if(request()->user('account'))
                            <a href="{{ action('CartController@proceed') }}" class="btn btn-block btn-success">Ödeme Yap</a>
                            <a href="{{ action('CartController@destroyCart') }}" class="text-danger" style="font-size: 12px;">Kartı İptal Et</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Katılımcı Bilgisi</h2>
                    </div>

                    <div class="panel-body">
                        <ul class="nav nav-tabs nav-justified" id="authentication">
                            <li role="presentation" class="active">
                                <a href="#registration">Kayıt Ol</a>
                            </li>
                            <li role="presentation">
                                <a href="#loginContent">Giriş Yap</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="registration">
                                <!-- Registration Form -->
                                <form action="{{ route('login') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="control-label">Ad</label>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="control-label">E-Mail</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="control-label">Parola</label>
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                     </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm" class="control-label">Parola Doğrulama</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        Kayıt Ol
                                    </button>
                                </form>
                            </div>
                            <div class="tab-pane" id="loginContent">
                                <!-- Login Form -->
                                <form method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">E-Mail</label>

                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label">Parola</label>

                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Beni Hatırla
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            Giriş Yap
                                        </button>
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Parolamı Unuttum
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer.scripts')
    <script>
        $('#authentication a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        });
    </script>
@stop