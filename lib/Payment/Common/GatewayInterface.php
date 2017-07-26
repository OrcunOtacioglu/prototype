<?php


namespace Acikgise\Payment\Common;


interface GatewayInterface
{
    public function preparePayment();

    public function makePayment();

    public function initialize();

    public static function setOptions();
}