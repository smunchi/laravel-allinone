<?php

namespace App\Services\Lender\Api\GredLender;

use Smunchi\ApiRequest\Facades\Http;
use App\Services\Lender\Api\LenderApi;
use App\Services\Lender\Api\LenderResponse;
use App\Services\Lender\Request\LenderRequest;
use Illuminate\Support\Facades\Log;

class GredLender extends LenderApi
{
    use FieldMap;

    public $response;
    public $header;

    public function __construct(LenderRequest $lenderRequest, array $apiCredentials)
    {
        parent::__construct($lenderRequest, $apiCredentials);

        $this->header = [
            'Content-Type' => 'text/xml; charset=UTF8',
        ];
    }

    public function submitApplication(): LenderResponse
    {
        $xmlRequestBody = $this->formatRequest();

        return $this->sendRequest($xmlRequestBody);
    }

    public function formatRequest()
    {
        return view(
            'service.lender.guarantor.requestSubmitApplication',
            [
                'credentials' => $this->credentials,
                'request' => $this->request,
            ]
        )->render();
    }

    /**
     * @param $xmlRequestBody
     * @return LenderResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function sendRequest($xmlRequestBody): LenderResponse
    {
        $response = Http::post($this->credentials['uri'], $xmlRequestBody, $this->header);

        return $this->parseResponse($response);
    }

    private function parseResponse($xmlResponse): LenderResponse
    {
        $response = simplexml_load_string($xmlResponse->contents);

        if ($response->status == 0) {
            $lenderResponse = new LenderResponse($this->responseStatusMap[$response->status->__toString()]);

            return $lenderResponse;
        }

        $errorMessage = $response->item->message;
        Log::error($errorMessage);

        return new LenderResponse($this->responseStatusMap[$response->status->__toString()]);
    }
}
