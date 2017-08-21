<footer style="bottom: 0; position: relative; z-index: 0; width: 100%; margin-top: 30px;">
    <div class="container">
        <div class="col-md-4">
            <h3>
                <img src="http://acikgise.dev/frontend/img/logo_2x.png" style="
                    width: 150px;
                    margin-left: -35px;">
            </h3>

            <p>FBB Entertainment
                Güzeloba Mah.Rauf Denktaş Cad.
                No:60/A Muratpaşa ANTALYA</p>
        </div>
        <div class="col-md-4">
            <h3>Şartlar ve Koşullar</h3>

            <ul>
                <li>
                    <a href="{{ action('Util\PageController@show', ['slug' => 'satis-sozlesmesi']) }}">Satış Sözleşmesi</a>
                </li>
                <li>
                    <a href="{{ action('Util\PageController@show', ['slug' => 'gizlilik-ve-kisisel-verilerin-korunumu']) }}">Gizlilik ve Kişisel Veriler</a>
                </li>
                <li>
                    <a href="{{ action('Util\PageController@show', ['slug' => 'kullanim-kosullari']) }}">Kullanım Şartları</a>
                </li>
            </ul>
        </div>
        <div class="col-md-4">
            <h3>Şirket Profili</h3>

            <ul>
                <li>
                    <a href="#">Hakkımızda</a>
                </li>
                <li>
                    <a href="#">İletişim</a>
                </li>
            </ul>
        </div>
    </div>
</footer>

<div class="footer-partner">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-6 col-xs-12">
                <div class="footer-partner-padding">
                    <ul class="list-inline valign-midd ellipses">
                        <li><strong style="color: #8c8c8c;">Anlaşmalı Kartlar</strong></li>
                        <li>
                            <img id="imgVisaLogo" src="{{ asset('frontend/img/footer/Visa.jpg') }}" alt="Visa">
                        </li>
                        <li>
                            <img id="imgMasterCardLogo" src="{{ asset('frontend/img/footer/Master-card.jpg') }}" alt="Master Card">
                        </li>
                        <li>
                            <img id="imgAmericanExpressLogo" src="{{ asset('frontend/img/footer/American-Express.jpg') }}" alt="American Express">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3 footer-partner-border-left">
                <div class="footer-partner-padding">
                    <ul class="list-inline valign-midd">
                        <li><strong style="color: #8c8c8c;">Güvenlik</strong></li>
                        <li>
                            <img id="Image2" src="{{ asset('frontend/img/footer/ssl.png') }}" alt="Secure"></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer-copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="social_footer">
                    <p>© 2017 OnlineFBB. Tüm hakları saklıdır.</p>
                </div>
            </div>
        </div>
    </div>
</div>