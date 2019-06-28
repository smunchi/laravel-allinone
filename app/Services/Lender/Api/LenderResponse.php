<?php

namespace App\Services\Lender\Api;

class LenderResponse
{
    protected $status;
    protected $redirectUrl;

    public function __construct($status)
    {
        if (!in_array($status, config('enums.offer_statuses'))) {
            throw new \InvalidArgumentException('Invalid offer status');
        }

        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    /**
     * @param mixed $redirectUrl
     */
    public function setRedirectUrl($redirectUrl): void
    {
        $this->redirectUrl = $redirectUrl;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
