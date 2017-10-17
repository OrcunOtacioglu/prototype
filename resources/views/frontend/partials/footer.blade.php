<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3>
                    <a href="http://www.fbbentertainment.com/" target="_blank">
                        <img src="{{ asset('frontend/img/logo-fbb.png') }}" style="width: 150px; margin-left: -35px;"></a>
                </h3>
                <p>
                    Güzeloba Mah. Rauf Denktaş Cad.
                    No:60/A Muratpaşa / ANTALYA
                </p>
            </div>
            <div class="col-md-3">
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
            <div class="col-md-3">
                <h3>Şirket Profili</h3>
                <ul>
                    <li>
                        <a href="http://www.fbbentertainment.com/#about" target="_blank">Hakkımızda</a>
                    </li>
                    <li>
                        <a href="http://www.fbbentertainment.com/#contact" target=”_blank”>İletişim</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul>
                    <li>
                        <h3>Bizi Takip Edin</h3>
                        <a href="https://www.facebook.com/neredeysenoradacom/" target="_blank" class="pr-15 font-size-20"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="https://twitter.com/neredeysenorada" target="_blank" class="pr-15 font-size-20"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="https://www.instagram.com/neredeysenorada/" target="_blank"  class="pr-15 font-size-20"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-partner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-partner-padding">
                        <ul class="list-inline valign-midd ellipses">
                            <li><strong style="color: #8c8c8c;">Anlaşmalı Kartlar</strong></li>
                            <li class="pr-15">
                                <img id="imgVisaLogo" src="{{ asset('frontend/img/footer/visaMastercard.png') }}" alt="Visa">
                            </li>
                            <li class="footer-partner-border-left pl-15"><strong style="color: #8c8c8c;">Güvenlik</strong></li>
                            <li>
                                <img id="Image2" src="{{ asset('frontend/img/footer/secure.png') }}" alt="Secure">
                            </li>
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
                        <p>© 2017 Neredeysen Orada. Tüm hakları saklıdır.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>