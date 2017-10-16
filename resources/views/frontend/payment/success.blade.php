@extends('frontend.layout')

@section('title', 'Siparişiniz Başarıyla Tamamlandı!')

@section('content')
    <div class="coverPhoto">
        <div style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/cover-images/{{$order->event->bg_cover_image}}'); background-repeat: no-repeat; background-size: cover">
            <div class="container">
                <div class="row">
                    <div class="coverPhotoImage">
                        <img src="/images/cover-images/{{$order->event->cover_image}}" alt="">
                        <div class="coverTitle">
                            <h1 class="eventTitle">{{ $order->event->title }}</h1>
                            <div class="eventLocation">{{ $order->event->location }}</div>
                            <div class="eventDate">{{ \Acikgise\Helpers\Helpers::getTurkishTime($order->event->start_date) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row" style="background: #fff">
                <div class="col-md-12">
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
                                <br>Etkinliği izlemek için lütfen etkinlik saatinde mail adresinize gönderilen bağlantıya tıklayarak izleme sayfasına gidiniz. Ayrıca profil sayfanızdan da etkinlik saatinde izleme sayfasına erişebilirsiniz.
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
                </div>
            </div>
        </div>
    </div>
@stop