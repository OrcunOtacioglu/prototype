<?php


namespace Acikgise\Payment\Gateways;


use Acikgise\Payment\Common\GatewayInterface;
use App\Models\Attendee;
use App\Models\Order;
use Iyzipay\Model\Address;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\CheckoutFormInitialize;
use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Options;
use Iyzipay\Request\CreateCheckoutFormInitializeRequest;

class Iyzico implements GatewayInterface
{
    protected $attendee;

    protected $order;

    protected $request;

    protected $buyer;

    protected $shipppingAddress;

    protected $billingAddress;

    protected $options;

    // @TODO Refactor all class.

    public function __construct(Attendee $attendee, Order $order)
    {
        $this->attendee = $attendee;
        $this->order = $order;

        $this->options();
        $this->preparePayment();

//        $this->makePayment();
    }

    public function preparePayment()
    {
        $request = new CreateCheckoutFormInitializeRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setPrice("1");
        $request->setPaidPrice("1.2");
        $request->setCurrency(Currency::TL);
        $request->setBasketId("B67832");
        $request->setPaymentGroup(PaymentGroup::PRODUCT);
        $request->setCallbackUrl("http://development.dev/iyzico");
        $request->setEnabledInstallments(array(2, 3, 6, 9));
        $buyer = new Buyer();
        $buyer->setId("BY789");
        $buyer->setName("John");
        $buyer->setSurname("Doe");
        $buyer->setGsmNumber("+905350000000");
        $buyer->setEmail("email@email.com");
        $buyer->setIdentityNumber("74300864791");
        $buyer->setLastLoginDate("2015-10-05 12:43:35");
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        $buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $buyer->setIp("85.34.78.112");
        $buyer->setCity("Istanbul");
        $buyer->setCountry("Turkey");
        $buyer->setZipCode("34732");
        $request->setBuyer($buyer);
        $shippingAddress = new Address();
        $shippingAddress->setContactName("Jane Doe");
        $shippingAddress->setCity("Istanbul");
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $shippingAddress->setZipCode("34742");
        $request->setShippingAddress($shippingAddress);
        $billingAddress = new Address();
        $billingAddress->setContactName("Jane Doe");
        $billingAddress->setCity("Istanbul");
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $billingAddress->setZipCode("34742");
        $request->setBillingAddress($billingAddress);
        $basketItems = array();
        $firstBasketItem = new BasketItem();
        $firstBasketItem->setId("BI101");
        $firstBasketItem->setName("Binocular");
        $firstBasketItem->setCategory1("Collectibles");
        $firstBasketItem->setCategory2("Accessories");
        $firstBasketItem->setItemType(BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice("0.3");
        $basketItems[0] = $firstBasketItem;
        $secondBasketItem = new BasketItem();
        $secondBasketItem->setId("BI102");
        $secondBasketItem->setName("Game code");
        $secondBasketItem->setCategory1("Game");
        $secondBasketItem->setCategory2("Online Game Items");
        $secondBasketItem->setItemType(BasketItemType::VIRTUAL);
        $secondBasketItem->setPrice("0.5");
        $basketItems[1] = $secondBasketItem;
        $thirdBasketItem = new BasketItem();
        $thirdBasketItem->setId("BI103");
        $thirdBasketItem->setName("Usb");
        $thirdBasketItem->setCategory1("Electronics");
        $thirdBasketItem->setCategory2("Usb / Cable");
        $thirdBasketItem->setItemType(BasketItemType::PHYSICAL);
        $thirdBasketItem->setPrice("0.2");
        $basketItems[2] = $thirdBasketItem;
        $request->setBasketItems($basketItems);
        $checkoutFormInitialize = CheckoutFormInitialize::create($request, $this->options);
        print_r($checkoutFormInitialize);

    }

    public function makePayment()
    {
        $checkoutFormInitialize = CheckoutFormInitialize::create($this->request, $this->options);
        dd($checkoutFormInitialize);
    }

    protected function options()
    {
        $this->options = new Options();
        $this->options->setApiKey("sandbox-XGqr0sVLwRM0CHputawzwlgAQNRrRqI9");
        $this->options->setSecretKey("sandbox-4eI1PwbJRV7w4R9DpsfMGlreysBfJoVP");
        $this->options->setBaseUrl("https://sandbox-api.iyzipay.com");
    }
}