<?php

namespace App\Services\Lender\Request;

class Customer
{
    public $title;
    public $firstName;
    public $lastName;
    public $employmentStatus;

    public function __construct(
        $title,
        $firstName,
        $lastName,
        $employmentStatus
    ) {
        $this->title = $title;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->employmentStatus = $employmentStatus;
    }
}
