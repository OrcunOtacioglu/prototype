<?php


namespace Acikgise\Payment\Helper;


class Helper
{
    public static function getGatewayClassName($gatewayName)
    {
        $gateway = ucfirst($gatewayName);
        return '\\Acikgise\\Payment\\Gateways\\'.$gateway;
    }

    public static function getPaymentGateways()
    {
        // return all payment gateways.
    }
}