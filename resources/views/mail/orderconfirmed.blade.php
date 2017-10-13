<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="">
</head>
<body style="font-family: sans-serif; width: 100%">
<table style="font-family: sans-serif; width: 620px">
    <tbody>
    <tr>
        <td colspan="3"  style="border-bottom: 1px solid #353535">
            <h2>Ödeme işleminiz başarıyla gerçekleşmiştir.</h2>
            <h1>Referans Kodunuz: <b>{{ $order->reference }}</b></h1>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <br>
            <p>{{ $order->event->title }} etkinliğinin online canlı yayın izleme biletini satın aldığınız için teşekkür ederiz.</p>
            <p>Bu mail satın alma işleminiz için bilgilendirme amacıyla gönderilmiştir. <br> Aşağıda satın aldığınız etkinliği izleyebilmeniz için gerekli olan adımları ve izleme bağlantısını görebilirsiniz.<br><br></p>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="5" bordercolor="#fff" style="border: solid 1px #fff; width: 620px">
    <tbody>
    <tr style="text-align:center; background:#353535; color:#fff; font-weight: bold">
        <td>Etkinlik Adı</td>
        <td>Etkinlik Tarihi ve Saati</td>
        <td>Etkinlik Mekanı</td>
    </tr>
    <tr style="text-align:center; background:#e0e0e0; color:#000; font-weight: bold">
        <td>{{ $order->event->title }}</td>
        <td>{{ \Acikgise\Helpers\Helpers::getTurkishTime($order->event->start_date) }}</td>
        <td>{{ $order->event->location }}</td>
    </tr>
    <tr style="text-align:right; background:#fcb131; color:#000;">
        <td colspan="3">Ödenen Toplam Tutar: <b>{{ $order->total }} TL</b></td>
    </tr>
    </tbody>
</table>
<table style="width: 620px">
    <tbody>
    <tr>
        <td>
            <br>Etkinliği izlemek için lütfen etkinlik saatinde aşağıdaki bağlantıya tıklayarak izleme sayfasına gidiniz.
            <br><br>
            <a href="#" style="color: black"><b>{{ $order->video_link }}</b></a>
            <br><br><br>
            <a href="#" style="color: black;">Bu Sayfayı Yazdır</a>
            &nbsp;
            <a href="#" style="color: black;">Fatura Al</a>
            <br><br>
            <p style="font-size: 14px"><i><b>Uyarı:</b> Bağlantı adresi tek izleme hakkıyla size özel oluşturulmuştur. İzleme sırasında aynı bağlantı üzerinden ikinci bir izleme başlatılması, yayınınızın kesilmesine neden olacağından, bağlantı adresinizi lütfen başkalarıyla paylaşmayınız.</i><br><br></p>
        </td>
    </tr>
    </tbody>
</table>
<table style="background: #f1f1f1; width: 620px" border="0">
    <tbody>
    <tr >
        <td style="text-align: left"><a href="http://neredeysenorada.com/" target="_blank"><img src="http://neredeysenorada.com/img/logo.png"></a></td>
        <td>&nbsp;</td>
        <td style="text-align: right; font-size: 12px">© 2017 Neredeysen Orada. Tüm hakları saklıdır.&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
    </tbody>
</table>
</body>
</html>