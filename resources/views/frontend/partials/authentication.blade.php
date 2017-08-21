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
                <label for="email" class="col-md-4 control-label">E-Mail</label>

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
                <label for="password" class="col-md-4 control-label">Parola</label>

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
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Beni Hatırla
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Giriş Yap
                    </button>
                </div>
                <div class="col-md-6 col-md-offset-4">
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
                <label for="name" class="col-md-4 control-label">Ad</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Parola</label>

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
                <label for="password-confirm" class="col-md-4 control-label">Parola Doğrulama</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="checkbox">
                <input type="checkbox"><small>Şirketiniz’in www.onlinefbb.com uzantılı sayfasında detayları yer alan
                    <a href="{{ action('Util\PageController@show', ['slug' => 'gizlilik-ve-kisisel-verilerin-korunumu']) }}">“Kişisel Verilerin Korunması Kanunu (“Kanun”)Hakkındaki Bilgilendirme metnini”</a>
                    okuduğumu ve içeriğini anladığımı, bu meyanda kişisel ve/veya özel nitelikli kişisel verilerimin;
                    Şirketiniz tarafından ve/veya Şirketiniz adına her türlü kanal aracılığı ile elde edilmesine,
                    Kanunda tanımı yapılan en geniş şekilde işlenmesine, gerekmesi durumunda yurt içi ve yurt dışındaki
                    ilgili üçüncü kişilere aktarılmasına, aydınlatılmış açık rızam ile açık onay veriyorum.</small>
            </div>
            <hr>
            <small>OnlineFBB'ye üye olup bu siteyi kullanmaya başlayınca OnlineFBB Gizlilik Beyanı'nı kabul etmiş olursunuz.
                OnlineFBB, Gizlilik Beyanı’nındaki hükümleri değiştirme, düzenleme, ekleme ve çıkarma hakkına sahiptir.
                Gizlilik Beyanı’nın güncellemiş haline her zaman Site’den ulaşabilirsiniz. Site’mizi sık sık ziyaret ederek,
                Gizlilik Beyanı’nın son güncel halini okumanızı önemle rica ederiz.</small>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Kayıt Ol
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>