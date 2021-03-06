<?php

namespace App\Models\Finance;

use App\Models\Attendee;
use App\Models\Event;
use App\Models\Order;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Invoice extends Model
{
    protected $table = 'invoices';

    protected $fillable = [
        'order_id',
        'attendee_id',
        'event_id',
        'reference',
        'transaction_id',
        'is_cancelled',
        'customer_name',
        'address',
        'zip_code',
        'province',
        'country',
        'event_name',
        'total',
        'generated_at'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function attendee()
    {
        return $this->belongsTo(Attendee::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public static function generate($order)
    {
        $checkExists = Invoice::where('order_id', '=', $order->id)->count();

        if ($checkExists > 0) {
            $invoice = Invoice::where('order_id', '=', $order->id)->first();
        } else {
            $invoice = new Invoice();
        }

        $invoice->order_id = $order->id;
        $invoice->attendee_id = $order->attendee->id;
        $invoice->event_id = $order->event->id;
        $invoice->reference = $order->reference;
        $invoice->transaction_id = $order->transaction_id;
        $invoice->is_cancelled = 0;
        $invoice->customer_name = $order->attendee->name;
        $invoice->event_name = $order->event->title;
        $invoice->total = $order->total;
        $invoice->generated_at = Carbon::now('Europe/Istanbul');
        $invoice->created_at = Carbon::now('Europe/Istanbul');
        $invoice->updated_at = Carbon::now('Europe/Istanbul');
        $invoice->save();

        return $invoice;
    }

    public static function generatePdfOf(Invoice $invoice)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.invoice', $invoice)->save('invoices/' . $invoice->transaction_id . '.pdf');
    }
}
