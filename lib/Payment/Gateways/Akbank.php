<?php


namespace Acikgise\Payment\Gateways;


use Acikgise\Payment\Common\GatewayInterface;
use App\Models\Attendee;
use App\Models\Order;

class Akbank implements GatewayInterface
{

    protected $attendee;

    protected $order;

    protected static $options;

    public function __construct(Attendee $attendee, Order $order)
    {
        $this->attendee = $attendee;
        $this->order = $order;
        self::setOptions();
        $this->preparePayment();
        $this->makePayment();
    }

    public function preparePayment()
    {
        // TODO: Implement preparePayment() method.
    }

    public function makePayment()
    {
        // TODO: Implement makePayment() method.
    }

    public function initialize()
    {
        // TODO: Implement initialize() method.
    }

    public static function setOptions()
    {
        self::$options['clientId'] = "100300000";
        self::$options['amount'] = "91.96";
        self::$options['oid'] = "1291899411421";
        self::$options['okUrl'] = "http://acikgise.dev/order-complete";
        self::$options['failUrl'] = "http://acikgise.dev/order-complete";
        self::$options['rnd'] = "asdf";
        self::$options['taksit'] = "";
        self::$options['islemtipi'] = 'Auth';
        self::$options['storekey'] = "123456";

        self::$options['storetype'] = '3d_pay_hosting';
        self::$options['currency'] = '949';
        self::$options['callbackurl'] = 'http://acikgise.dev/order-complete';
        self::$options['lang'] = 'tr';
        self::$options['hash'] = self::makeHash();
    }

    public static function getOptions()
    {
        if (isEmpty(self::$options)) {
            self::setOptions();
        }

        return self::$options;
    }

    public static function makeHash()
    {
        $options = self::getOptions();
        $hashString = $options['clientId'] . $options['oid'] . $options['amount'] . $options['okUrl'] . $options['failUrl'] . $options['islemtipi'] . $options['taksit'] . $options['rnd'] . $options['storekey'];

        return base64_encode(pack('H*', sha1($hashString)));
    }
}