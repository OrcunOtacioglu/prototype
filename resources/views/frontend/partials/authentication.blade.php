<ul class="nav nav-tabs nav-justified" role="tablist">
    @if($errors->has('email') || $errors->has('password'))
        <li role="presentation" class="active">
            <a href="#authenticate" aria-controls="home" role="tab" data-toggle="tab">GİRİŞ YAP</a>
        </li>
        <li role="presentation">
            <a href="#registration" aria-controls="profile" role="tab" data-toggle="tab">KAYIT OL</a>
        </li>
    @else
        <li role="presentation" class="@if($errors->has('email') || $errors->has('password'))
                ''
            @else
                active
            @endif">
            <a href="#registration" aria-controls="profile" role="tab" data-toggle="tab">KAYIT OL</a>
        </li>
        <li role="presentation">
            <a href="#authenticate" aria-controls="home" role="tab" data-toggle="tab">GİRİŞ YAP</a>
        </li>
    @endif
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane @if($errors->has('email') || $errors->has('password'))
            active
        @endif" id="authenticate">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-3 control-label">E-Mail</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

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

            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Beni Hatırla
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary" style="background-color: #fcb131; border: none; padding: 6px 25px;">
                        Giriş Yap
                    </button>
                </div>
                <div class="col-md-12 text-center">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Parolamı Unuttum
                    </a>
                </div>
            </div>
        </form>
    </div>
    <div role="tabpanel" class="tab-pane @if($errors->has('email') || $errors->has('password'))
            ''
        @elseif(request()->is('register'))
            active
        @else
            active
        @endif" id="registration">
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('registerName') ? ' has-error' : '' }}">
                <label for="registerName" class="col-md-3 control-label">Ad</label>

                <div class="col-md-6">
                    <input id="registerName" type="text" class="form-control" name="registerName" value="{{ old('registerName') }}" required autofocus maxlength="100">

                    @if ($errors->has('registerName'))
                        <span class="help-block">
                        <strong>{{ $errors->first('registerName') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('registerSurname') ? ' has-error' : '' }}">
                <label for="registerSurname" class="col-md-3 control-label">Soyad</label>

                <div class="col-md-6">
                    <input id="registerSurname" type="text" class="form-control" name="registerSurname" value="{{ old('registerSurname') }}" required maxlength="100">

                    @if ($errors->has('registerSurname'))
                        <span class="help-block">
                        <strong>{{ $errors->first('registerSurname') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('registerEmail') ? ' has-error' : '' }}">
                <label for="registerEmail" class="col-md-3 control-label">E-Mail</label>

                <div class="col-md-6">
                    <input id="registerEmail" type="email" class="form-control" name="registerEmail" value="{{ old('registerEmail') }}" required maxlength="100">

                    @if ($errors->has('registerEmail'))
                        <span class="help-block">
                        <strong>{{ $errors->first('registerEmail') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('registerPhone') ? ' has-error' : '' }}">
                <label for="registerPhone" class="col-md-3 control-label">Telefon Numarası</label>

                <div class="col-md-6">
                    <input id="registerPhone" type="text" class="form-control" name="registerPhone" value="{{ old('registerPhone') }}" required pattern=".{10,25}">

                    @if ($errors->has('registerPhone'))
                        <span class="help-block">
                        <strong>{{ $errors->first('registerPhone') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('registerPassword') ? ' has-error' : '' }}">
                <label for="registerPassword" class="col-md-3 control-label">Parola</label>

                <div class="col-md-6">
                    <input id="registerPassword" type="password" class="form-control" name="registerPassword" required maxlength="25">

                    @if ($errors->has('registerPassword'))
                        <span class="help-block">
                        <strong>{{ $errors->first('registerPassword') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="registerPassword_confirmation" class="col-md-3 control-label">Parola Doğrulama</label>

                <div class="col-md-6">
                    <input id="registerPassword_confirmation" type="password" class="form-control" name="registerPassword_confirmation" required maxlength="25">
                </div>
            </div>

            <p><strong>Uyarı: Satın almış olduğunuz etkinliklerin canlı yayın izleme bilgileri, kayıt olurken girmiş olduğunuz mail adresinize gönderilecektir. Lütfen geçerli bir e-posta adresi giriniz!</strong></p>
            <hr>

            <div class="checkbox">
                <input type="checkbox" required>
                    <small>Şirketiniz’in www.neredeysenorada.com uzantılı sayfasında detayları yer alan
                    <a href="{{ action('Util\PageController@show', ['slug' => 'gizlilik-ve-kisisel-verilerin-korunumu']) }}">
                        “Kişisel Verilerin Korunması Kanunu (“Kanun”) Hakkındaki Bilgilendirme metnini”
                    </a>
                    okuduğumu ve içeriğini anladığımı, bu meyanda kişisel ve/veya özel nitelikli kişisel verilerimin;
                    Şirketiniz tarafından ve/veya Şirketiniz adına her türlü kanal aracılığı ile elde edilmesine,
                    Kanunda tanımı yapılan en geniş şekilde işlenmesine, gerekmesi durumunda yurt içi ve yurt dışındaki
                    ilgili üçüncü kişilere aktarılmasına, aydınlatılmış açık rızam ile açık onay veriyorum.</small>
            </div>
            <hr>
            <small>Neredeysen Orada'ya üye olup bu siteyi kullanmaya başlayınca Neredeysen Orada Gizlilik Beyanı'nı kabul etmiş olursunuz.
                Neredeysen Orada, Gizlilik Beyanı’nındaki hükümleri değiştirme, düzenleme, ekleme ve çıkarma hakkına sahiptir.
                Gizlilik Beyanı’nın güncellemiş haline her zaman Site’den ulaşabilirsiniz. Site’mizi sık sık ziyaret ederek,
                Gizlilik Beyanı’nın son güncel halini okumanızı önemle rica ederiz.</small>
            <div class="form-group">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary" style="background-color: #fcb131; border: none; padding: 6px 25px;">
                        Kayıt Ol
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>