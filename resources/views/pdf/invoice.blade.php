<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/proforma.css') }}">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/purecss@0.6.1/build/tables-min.css">

    <title>{{ $transaction_id }} | Print Proforma</title>
</head>
<body>
<div class="wrapper">
    <p style="margin-top: 10px; margin-left: 50px;">Fatura-{{ $reference }}</p>
    <div class="date">
        <p>{{ $created_at }}</p>
    </div>

    <div class="image">
        <img src="{{ asset('frontend/img/logo_sticky_2x.png') }}" style="max-width: 300px; margin: 100px 250px 20px 325px; max-height: 50px;">
    </div>

    <div class="center">
        <h2>FBB ENTERTAINMENT</h2>
    </div>

    <div class="center">
        <p class="info">FBB Entertainment Güzeloba Mah. Rauf Denktas Cad. No:60/A</p>
        <p class="info">Muratpasa ANTALYA</p>
        <p class="info">VAT: Mecidiyekoy Vergi Dairesi | VAT Number: 0060483600</p>
    </div>

    <div class="center">
        <p class="info">Phone: 00 90 212 347 46 30     Fax: 00 90 212 347 46 34</p>
    </div>

    <div class="center mt70">
        <h2 class="title">FATURA</h2>
    </div>

    <div class="center">
        <table class="pure-table pure-table-bordered" style="width: 100%">
            <tbody>
            <tr style="max-height: 50px;">
                <td width="40%">
                    <b>DÜZENLENEN</b>
                </td>
                <td width="30%">
                    <p class="fs-14">{{ $customer_name }}</p>
                </td>
                <td width="30%"></td>
            </tr>
            <tr>
                <td width="40%">
                    <b>TARIH</b>
                </td>
                <td width="30%">
                    <b>HIZMET</b>
                </td>
                <td width="30%">
                    <b>TOPLAM</b>
                </td>
            </tr>
            <tr>
                <td width="40%">
                    <p class="fs-14">{{ $created_at }}</p>
                </td>
                <td width="30%">
                    <p class="fs-14">{{ $event_name }}</p>
                </td>
                <td width="30%">
                    <p class="fs-14">{{ $total }} TL</p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>