<?php

namespace App\Billing;

use Illuminate\Support\Str;

class BankPaymentGateway implements PaymentGatewayContract
{
    protected $currency;
    protected $discount;

    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
        
    }

    public function charge($amount)
    {
        return [
            'amount' => $amount-$this->discount,
            'confirmation_number' => Str::random(),
            'currency' => $this->currency,
            'discount' => $this->discount
        ];
    }

    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }
}
