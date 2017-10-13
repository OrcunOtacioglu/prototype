<h3>Sipariş Detayı</h3>

<div class="row p-10">
    <table class="order-table">
        <thead>
        <tr>
            <th class="first-th"></th>
            <th class="default-th">Etkinlik</th>
            <th class="default-th">Tarih</th>
            <th class="default-th">Tutar</th>
        </tr>
        </thead>
        
        <tbody>
        <tr class="second-tr">
            <td class="img-td">
                <img src="/images/small-images/{{ $order->event->small_image }}" alt="" class="img-responsive">
            </td>
            <td class="default-td">{{ $order->event->title }}</td>
            <td class="default-td">{{ \Acikgise\Helpers\Helpers::getTurkishTime($order->event->start_date) }}</td>
            <td class="default-td"><strong>{{ $order->total }} TL</strong></td>
        </tr>
        </tbody>
    </table>
</div>
