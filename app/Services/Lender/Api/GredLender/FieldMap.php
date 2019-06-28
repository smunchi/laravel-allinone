<?php

namespace App\Services\Lender\Api\GredLender;

use App\Services\Lender\Request\LenderRequest;

trait FieldMap
{
    protected $employmentStatusMap = [
        'full time' => 'Full-Time Employed',
        'part time' => 'Part-Time Employed',
        'temporary' => 'Temporary Employment',
        'self employed' => 'Self Employed',
        'home maker' => 'Unemployed',
        'on benefits' => 'Benefits',
        'retired' => 'Retired',
        'student' => 'Student',
        'unemployed' => 'Unemployed'
    ];

    protected $responseStatusMap = [
        '0' => 'accept',
        '1' => 'declined'
    ];

    protected function mapRequest(LenderRequest $request): LenderRequest
    {
        $request->customer->employmentStatus = $this->employmentStatusMap[$request->customer->employmentStatus] ?? '';

        return $request;
    }
}
