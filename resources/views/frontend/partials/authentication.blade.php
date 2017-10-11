<ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" class="active">
        <a href="#authenticate" aria-controls="home" role="tab" data-toggle="tab">GİRİŞ YAP</a>
    </li>
    <li role="presentation">
        <a href="#registration" aria-controls="profile" role="tab" data-toggle="tab">KAYIT OL</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="authenticate">
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
    <div role="tabpanel" class="tab-pane" id="registration">
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-3 control-label">Ad</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                <label for="name" class="col-md-3 control-label">Soyad</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required autofocus>

                    @if ($errors->has('surname'))
                        <span class="help-block">
                        <strong>{{ $errors->first('surname') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

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

            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="name" class="col-md-3 control-label">Telefon Numarası</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                    @if ($errors->has('phone'))
                        <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
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
                <label for="password-confirm" class="col-md-3 control-label">Parola Doğrulama</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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