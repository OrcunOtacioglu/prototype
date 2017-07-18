<?php


namespace Acikgise\Payment\Common;


use Acikgise\Payment\Exception\RuntimeException;
use Acikgise\Payment\Helper\Helper;
use App\Models\Attendee;
use App\Models\Order;

class GatewayFactory
{

    protected $paymentGateway;

    public function preparePayment($gateway, Attendee $attendee, Order $order)
    {

        $this->paymentGateway = Helper::getGatewayClassName($gateway);

        if (!class_exists($this->paymentGateway)) {
            throw new RuntimeException("Payment gateway '$this->paymentGateway' not found");
        }

        return new $this->paymentGateway($attendee, $order);
    }

    public function initializeGateway($paymentObject)
    {
        return $paymentObject->initialize();
    }
}