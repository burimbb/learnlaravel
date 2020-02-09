<?php

namespace App\Billing;

use Illuminate\Support\Str;

class CreditPaymentGateway implements PaymentGatewayContract
{
    protected $currency;
    protected $discount;
    protected $fee;

    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }

    public function charge($amount)
    {
        $this->fee = $amount * 0.05;

        return [
            'amount' => $amount-$this->discount - $this->fee,
            'confirmation_number' => Str::random(),
            'currency' => $this->currency,
            'discount' => $this->discount,
            'fee' => $this->fee,
        ];
    }

    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }
}
