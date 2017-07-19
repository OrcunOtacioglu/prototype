<?php


namespace Acikgise\Payment\Gateways;

use Iyzipay\Model\CheckoutForm;
use Iyzipay\Options;
use App\Models\Order;
use Iyzipay\Model\Buyer;
use App\Models\Attendee;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Address;
use Iyzipay\Model\Currency;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Model\CheckoutFormInitialize;
use Acikgise\Payment\Common\GatewayInterface;
use Iyzipay\Request\CreateCheckoutFormInitializeRequest;
use Iyzipay\Request\RetrieveCheckoutFormRequest;

class Iyzico implements GatewayInterface
{
    /**
     * Attendee instance.
     *
     * @var Attendee
     */
    protected $attendee;

    /**
     * Order instance.
     *
     * @var Order
     */
    protected $order;


    /**
     * Request instance.
     *
     * @var
     */
    protected $request;

    /**
     * Customer information.
     *
     * @var
     */
    protected $buyer;

    /**
     * Shipping Address Details.
     *
     * @var
     */
    protected $shipppingAddress;

    /**
     * Billing Address Details.
     *
     * @var
     */
    protected $billingAddress;

    /**
     * Iyzico Options.
     *
     * @var
     */
    protected static $options;

    public $checkoutFormInitialize;

    public function __construct(Attendee $attendee, Order $order)
    {
        $this->attendee = $attendee;
        $this->order = $order;

        $this->setOptions();
        $this->preparePayment();
        $this->makePayment();
    }

    /**
     * Prepares and sets necessary information for the payment.
     */
    public function preparePayment()
    {
        $this->prepareRequest();
    }

    /**
     * Makes the payment request.
     */
    public function makePayment()
    {
        $this->checkoutFormInitialize = CheckoutFormInitialize::create($this->request, $this->options);
    }

    /**
     * Initializes the form object for HTML
     *
     * @return mixed
     */
    public function initialize()
    {
        return $this->checkoutFormInitialize->getCheckOutFormContent();
    }

    public static function validate($request)
    {
        $token = $request->request->get('token');
        $request = new RetrieveCheckoutFormRequest();
        $request->setLocale(Locale::TR);
        $request->setToken($token);
        self::setOptions();
        $checkoutForm = CheckoutForm::retrieve($request, self::getOptions());

        if ($checkoutForm->getStatus() == "success")
        {
            return true;

        } else {
            return $checkoutForm->getErrorMessage();
        }
    }

    /**
     * Sets the configuration parameters for the gateway.
     * @TODO Change this functionality in order to get this values from account settings.
     */
    protected static function setOptions()
    {
        self::$options = new Options();
        self::$options->setApiKey("sandbox-XGqr0sVLwRM0CHputawzwlgAQNRrRqI9");
        self::$options->setSecretKey("sandbox-4eI1PwbJRV7w4R9DpsfMGlreysBfJoVP");
        self::$options->setBaseUrl("https://sandbox-api.iyzipay.com");
    }

    protected static function getOptions()
    {
        return self::$options;
    }

    /**
     * Prepares the request.
     */
    protected function prepareRequest()
    {
        $this->request = new CreateCheckoutFormInitializeRequest();
        // Get this based on User IP
        $this->request->setLocale(Locale::TR);
        $this->request->setConversationId($this->order->transaction_id);
        $this->request->setPrice($this->order->total);
        $this->request->setPaidPrice($this->order->total);
        // Get this based on Account currency.
        $this->request->setCurrency(Currency::TL);
        $this->request->setBasketId($this->order->reference);
        $this->request->setPaymentGroup(PaymentGroup::PRODUCT);
        // Get this from Account options
        $this->request->setCallbackUrl("http://acikgise.dev/order-complete");
        // Get this from Account options
        $this->request->setEnabledInstallments(array(2, 3, 6, 9));

        $this->setUser();
        $this->setShippingAddress();
        $this->setBillingAddress();
        $this->setBasket();
    }

    /**
     * Sets the Customer/Attendee information
     */
    protected function setUser()
    {
        $buyer = new Buyer();
        $buyer->setId($this->attendee->id);
        $buyer->setName($this->attendee->name);
        // Collect this information from Attendee
        $buyer->setSurname('Cabbar');
        // Collect this information from Attendee
        $buyer->setGsmNumber("+905350000000");
        $buyer->setEmail($this->attendee->email);
        // Collect this from Attendee
        $buyer->setIdentityNumber("74300864791");
        // Create a functionality for this.
        $buyer->setLastLoginDate("2015-10-05 12:43:35");
        // Create a functionality for this.
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        // Collect this information from Attendee.
        $buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        // Create a functionality for this.
        $buyer->setIp("85.34.78.112");
        // Collect this information from Attendee.
        $buyer->setCity("Istanbul");
        // Collect this information from Attendee.
        $buyer->setCountry("Turkey");
        // Collect this information from Attendee.
        $buyer->setZipCode("34732");

        $this->request->setBuyer($buyer);
    }

    /**
     * Sets shipping address
     */
    protected function setShippingAddress()
    {
        $shippingAddress = new Address();
        // Create functionality for this.
        $shippingAddress->setContactName($this->attendee->name . ' ' . $this->attendee->surname);
        // Collect this information from Attendee.
        $shippingAddress->setCity("Istanbul");
        // Collect this information from Attendee.
        $shippingAddress->setCountry("Turkey");
        // Collect this information from Attendee.
        $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        // Collect this information from Attendee.
        $shippingAddress->setZipCode("34742");

        $this->request->setShippingAddress($shippingAddress);
    }

    /**
     * Sets billing address
     */
    protected function setBillingAddress()
    {
        $billingAddress = new Address();
        // Create functionality for this.
        $billingAddress->setContactName($this->attendee->name . ' ' . $this->attendee->surname);
        // Collect this information from Attendee.
        $billingAddress->setCity("Istanbul");
        // Collect this information from Attendee.
        $billingAddress->setCountry("Turkey");
        // Collect this information from Attendee.
        $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        // Collect this information from Attendee.
        $billingAddress->setZipCode("34742");

        $this->request->setBillingAddress($billingAddress);
    }

    /**
     * Generates the shoping cart according to Order.
     */
    protected function setBasket()
    {
        $basketItems = array();
        $firstBasketItem = new BasketItem();
        $firstBasketItem->setId("BI101");
        $firstBasketItem->setName("Binocular");
        $firstBasketItem->setCategory1("Collectibles");
        $firstBasketItem->setCategory2("Accessories");
        $firstBasketItem->setItemType(BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice($this->order->total);

        array_push($basketItems, $firstBasketItem);

        $this->request->setBasketItems($basketItems);
    }
}