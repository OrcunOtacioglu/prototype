<h3>Siparişiniz</h3>
@foreach($order->orderItems as $item)
    <div class="row">
        <div class="col-md-2">
            <img src="/images/cover-images/{{ $order->event->cover_image }}" alt="" class="img-responsive">
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-5">
                    <p>Etkinlik Adı: {{ $order->event->title }}</p>
                    <p>Etkinlik Tarihi: {{ $order->event->start_date }}</p>
                    <p>Etkinlik Mekanı: {{ $order->event->location }}</p>
                </div>
                <div class="col-md-3">
                    <p>Bilet Kategorisi: {{ $item->product_name }}</p>
                    <p>Bilet Adedi: {{ $item->quantity }}</p>
                </div>
                <div class="col-md-4">
                    <p>Toplam Tutar: {{ $item->unit_price * $item->quantity }} TL</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
