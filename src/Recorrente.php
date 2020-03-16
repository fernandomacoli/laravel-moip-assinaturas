<?php
namespace Moip\Recorrente;

use Illuminate\Support\Facades\Config;
use Moip\Recorrente\Api\v1\Coupon;
use Moip\Recorrente\Api\v1\Invoice;
use Moip\Recorrente\Api\v1\Payment;
use Moip\Recorrente\Api\v1\Plan;
use Moip\Recorrente\Api\v1\Retry;
use Moip\Recorrente\Api\v1\Subscription;
use Moip\Recorrente\Api\v1\Subscriber;
use Moip\Recorrente\Api\v2\Subscriber as Customer; // Usa o subscriber na V2 do Moip


class Recorrente
{

    public $token;

    public $key;
    public $env;

    public function __construct()
    {
        $this->token = Config::get('moiprecorrente.token');
        $this->key =  Config::get('moiprecorrente.chave') ;

        if(config('moiprecorrente.test') == true)
            $this->env = Config::get('moiprecorrente.sandbox');
        else
            $this->env = Config::get('moiprecorrente.production');
    }

    /**
     * @return Plan
     */
    public function Plan()
    {
        return new Plan($this->env);
    }

    /**
     * @return Subscriber
     */
    public function Subscriber()
    {
        return new Subscriber($this->env);
    }

    /**
     * @return Customer
     */
    public function Customer()
    {
        return new Customer($this->env);
    }

    /**
     * @return Subscription
     */
    public function Subscription()
    {
        return new Subscription($this->env);
    }

    /**
     * @return Invoice
     */
    public function Invoice()
    {
        return new Invoice($this->env);
    }

    /**
     * @return Payment
     */
    public function Payment()
    {
        return new Payment($this->env);
    }

    /**
     * @return Coupon
     */
    public function Coupon()
    {
        return new Coupon($this->env);
    }

    /**
     * @return Retry
     */
    public function Retry()
    {
        return new Retry($this->env);
    }
}