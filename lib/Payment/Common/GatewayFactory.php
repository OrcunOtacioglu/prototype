<?php


namespace Acikgise\Payment\Common;


use Acikgise\Payment\Exception\RuntimeException;
use Acikgise\Payment\Helper\Helper;
use App\Models\Attendee;
use App\Models\Order;

class GatewayFactory
{
    public function pay($gateway, Attendee $attendee, Order $order)
    {

        $paymentGateway = Helper::getGatewayClassName($gateway);

        if (!class_exists($paymentGateway)) {
            throw new RuntimeException("Payment gateway '$paymentGateway' not found");
        }

        return new $paymentGateway($attendee, $order);
    }
}