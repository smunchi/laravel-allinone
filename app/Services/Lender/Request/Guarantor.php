<?php


namespace App\Services\Lender\Request;

class Guarantor
{
    public $title;
    public $firstName;
    public $lastName;

    public function __construct(
        $title,
        $firstName,
        $lastName
    ) {
        $this->title = $title;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
}
