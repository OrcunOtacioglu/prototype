<?php


namespace lib\Payment\Common;


use Acikgise\Payment\Common\GatewayInterface;

abstract class AbstractGatewayFactory implements GatewayInterface
{

    protected $parameters = array();

    /**
     * Returns all parameters for the gateway.
     *
     * @return array
     */
    public function getParameters()
    {
        if (isEmpty($this->parameters)) {
            $this->setParameters();
        }

        return $this->parameters;
    }

    /**
     * Sets parameters.
     */
    protected function setParameters()
    {
        $this->parameters = '';// Get Parameters from DB
    }

    /**
     * Updates an individual parameter.
     *
     * @param $key
     * @param $value
     */
    public function setParameter($key, $value)
    {

    }

    /**
     * Prepares the payment.
     */
    public function preparePayment()
    {
        // TODO: Implement preparePayment() method.
    }

    public function makePayment()
    {
        // TODO: Implement makePayment() method.
    }
}