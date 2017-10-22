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
            <h2>Merhaba!</h2>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <br>
            <p>Bu maili parola sıfırlama talebinde bulunduğunuz için alıyorsunuz.</p>
            <br>
        </td>
    </tr>
    <tr>
        <td colspan="3"  style="text-align: center;">
            <a href="{{ $actionUrl }}" class="btn btn-primary" style="background-color: #fcb131; border: none; padding: 6px 25px; color: white;">Parolamı Sıfırla</a>
        </td>
    </tr>
    </tbody>
</table>
<table style="font-family: sans-serif; width: 620px">
    <tbody>
    <tr>
        <td colspan="3">
            <br>
            <p>Bu yönde bir talebiniz olmadıysa, herhangi bir işlem yapmanıza gerek yoktur!</p>
            <p style="font-size: 12px;">"{{ $actionText }}" butonuna tıklamakta sorun yaşıyorsanız, aşağıdaki URL'yi kopyalayarak
                tarayıcınıza yapıştırabilirsiniz: [{{ $actionUrl }}]({{ $actionUrl }})</p>
            <br>
        </td>
    </tr>
    </tbody>
</table>
<table style="background: #f1f1f1; width: 620px" border="0">
    <tbody>
    <tr >
        <td style="text-align: left"><a href="http://neredeysenorada.com/" target="_blank"><img src="http://neredeysenorada.com/frontend/img/logo.png"></a></td>
        <td>&nbsp;</td>
        <td style="text-align: right; font-size: 12px">© 2017 Neredeysen Orada. Tüm hakları saklıdır.&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
    </tbody>
</table>
</body>
</html>