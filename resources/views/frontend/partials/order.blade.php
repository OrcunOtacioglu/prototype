<h3>Siparişiniz</h3>
<div class="row">
    <div class="col-md-2">
        <img src="/images/cover-images/{{ $order->event->cover_image }}" alt="" class="img-responsive">
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-4">
                <p>Yayın Adı: {{ $order->event->title }}</p>
            </div>
            <div class="col-md-4">
                <p>Tarih: {{ \Acikgise\Helpers\Helpers::getTurkishTime($order->event->start_date) }}</p>
            </div>
            <div class="col-md-4">
                <p>Tutar: {{ $order->total }} TL</p>
            </div>
        </div>
    </div>
</div>
