<?php

namespace App\Services\Lender\Request;

use Illuminate\Support\Collection;

class LenderRequest
{
    public $application;
    public $customer;
    public $addresses;
    public $guarantor;

    public function __construct(
        Application $application,
        Customer $customer,
        Collection $addresses
    ) {
        $this->application = $application;
        $this->customer = $customer;

        $this->checkAddresses($addresses);
        $this->addresses = $addresses;
    }

    public function setGuarantor(Guarantor $guarantor)
    {
        $this->guarantor = $guarantor;
    }

    public function checkAddresses(Collection $addresses)
    {
        foreach ($addresses as $address) {
            if (!($address instanceof Address)) {
                throw new \InvalidArgumentException(
                    'Expecting ' . Address::class . ' instance in the addresses collection'
                );
            }
        }
    }

    public function getCurrentAddress()
    {
        return $this->addresses->where('type', 'current')->first();
    }
}
