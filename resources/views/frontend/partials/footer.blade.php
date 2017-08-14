<footer style="bottom: 0; position: relative; z-index: 0; width: 100%; margin-top: 30px;">
    <div class="container">
        <div class="col-md-4">
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
    </div>
</footer>