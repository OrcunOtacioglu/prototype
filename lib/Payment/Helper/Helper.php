<?php


namespace Acikgise\Payment\Helper;


use App\Events\OrderSuccessful;
use App\Models\Order;

class Helper
{
    /**
     * Turns regular gatewayname into class name.
     *
     * @param $gatewayName
     *
     * @return string
     */
    public static function getGatewayClassName($gatewayName)
    {
        $gateway = ucfirst($gatewayName);
        return '\\Acikgise\\Payment\\Gateways\\'.$gateway;
    }

    public static function getPaymentGateways()
    {
        // return all payment gateways.
    }

    /**
     * Handles successfull order and creates an Event.
     *
     * @param Order $order
     *
     * @return OrderSuccessful
     */
    public static function handleOrder(Order $order)
    {
        return new OrderSuccessful($order);
    }
}