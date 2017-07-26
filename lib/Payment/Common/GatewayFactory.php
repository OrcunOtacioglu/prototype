<?php


namespace Acikgise\Payment\Common;


use Acikgise\Payment\Exception\RuntimeException;
use Acikgise\Payment\Helper\Helper;
use App\Models\Attendee;
use App\Models\Order;

class GatewayFactory
{

    /**
     * Creates the payment gateway object.
     *
     * @param $gateway
     * @param Attendee $attendee
     * @param Order $order
     *
     * @return mixed
     */
    public function preparePayment($gateway, Attendee $attendee, Order $order)
    {

        $paymentGateway = Helper::getGatewayClassName($gateway);

        if (!class_exists($paymentGateway)) {
            throw new RuntimeException("Payment gateway '$paymentGateway' not found");
        }

        return new $paymentGateway($attendee, $order);
    }

    /**
     * Initializes the payment gateway.
     *
     * @param $paymentObject
     *
     * @return mixed
     */
    public function initializeGateway($paymentObject)
    {
        return $paymentObject->initialize();
    }

    /**
     * Validates the payment.
     *
     * @param $gateway
     * @param $request
     *
     * @return mixed
     */
    public static function validatePayment($gateway, $request)
    {
        $gateway = Helper::getGatewayClassName($gateway);

        $results = $gateway::validate($request);

        if ($results['status'] == 'success') {
            $order = Order::where('reference', '=', $results['orderRef'])->first();
            Helper::handleOrder($order);
        }

        return $results;
    }
}