<?php


namespace Acikgise\Payment;


use Acikgise\Payment\Common\GatewayFactory;

class Gateway
{

    /**
     * Factory Instance.
     */
    private static $factory;

    /**
     * Creates a new factory instance.
     *
     * @return GatewayFactory
     */
    public static function getFactory()
    {
        if (is_null(self::$factory)) {
            self::$factory = new GatewayFactory();
        }

        return self::$factory;
    }

    /**
     * Static accessor.
     *
     * @param $method
     * @param $parameters
     *
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        $factory = self::getFactory();

        return call_user_func_array(array($factory, $method), $parameters);
    }
}