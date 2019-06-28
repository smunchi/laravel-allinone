<?php

namespace App\Services\Lender\Request;

class Address
{
    public $houseName;
    public $houseNumber;
    public $type;

    public function __construct(
        $houseName,
        $houseNumber,
        $type
    ) {
        $this->houseName = $houseName;
        $this->houseNumber = $houseNumber;
        $this->type = $type;
    }
}
