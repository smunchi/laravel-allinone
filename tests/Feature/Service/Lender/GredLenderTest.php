<?php

namespace Tests\Service\Service\Lender;

use App\Models\Users\Lender;
use App\Services\Lender\Api\GredLender\GredLender;
use App\Services\Lender\Api\LenderResponse;
use App\Services\Lender\Request\Address;
use App\Services\Lender\Request\Bank;
use App\Services\Lender\Request\CommsPreference;
use App\Services\Lender\Request\Contact;
use App\Services\Lender\Request\Customer;
use App\Services\Lender\Request\Employment;
use App\Services\Lender\Request\IncomeExpense;
use App\Services\Lender\Request\LenderRequest;
use App\Services\Lender\Request\Application;
use Illuminate\Support\Collection;
use Tests\TestCase;

class GredLenderTest extends TestCase
{
    public function testSubmitApplication()
    {
        $application = new Application(
            1000,
            24,
            'Car Purchase'
        );

        $customer = new Customer(
            'Mr',
            'john',
            'smith'
        );

        $address1 = new Address(
            'owner',
            37
        );
        $address1->type = 'current';
        $addresses = new Collection();
        $addresses->push($address1);

        $guarantor = new \App\Services\Lender\Request\Guarantor(
            'Mr',
            'rawshan',
            'ali'
        );

        $request = new LenderRequest(
            $application,
            $customer,
            $addresses
        );
        $request->setGuarantor($guarantor);

        $apiCredentials = '{"key": "PGTgB8Ai4G9", "uri": "https://mtc.flg360.co.uk/api/APILeadCreateUpdate.php", "redirect_url": "https://www.test.com?Ref="}';

        $api = new GredLender($request, json_decode($apiCredentials, true));

        $response = $api->submitApplication();

        $this->assertInstanceOf(LenderResponse::class, $response);
        $this->assertNotNull($response->getRedirectUrl());
        $this->assertEquals('accept', $response->getStatus());
    }
}
