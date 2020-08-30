<?php

class BankAccounts
{
    protected $accounts;

    /**
     * Constructor of this class BankAccounts
     */
    public function __construct($accounts)
    {
        $this->accounts = $accounts;
    }

    /**
     * Create new public function
     */
    public function filterBy($type)
    {
        return array_filter($this->accounts, function ($account) use ($type) {
            return $account->typeOf($type);
        });
    }
}

class Account
{
    protected $type;

    /**
     * Constructor of this class Account
     */
    private function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * Create new public static function
     */
    public static function open($type)
    {
        return new static($type);
    }

    /**
     * Create new private function
     */
    private function isActive()
    {
        return true;
    }

    /**
     * Create new private function
     */
    private function getType()
    {
        return $this->type;
    }

    /**
     * Create new public function
     */
    public function typeOf($type)
    {
        return $this->isActive() && $this->getType() == $type;
    }
}

$accounts = [
    Account::open('checking'),
    Account::open('savings'),
    Account::open('testing'),
    Account::open('savings'),
    Account::open('checking'),
];

$bank = new BankAccounts($accounts);

var_dump($bank->filterBy('savings'));
