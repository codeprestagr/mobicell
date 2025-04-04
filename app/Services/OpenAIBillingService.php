<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenAIBillingService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('openai.api_key'); // Fetch from config
    }

    public function getUsage()
    {
        return $this->fetchBillingData('usage');
    }

    public function getSubscription()
    {
        return $this->fetchBillingData('subscription');
    }

    public function getCreditGrants()
    {
        return $this->fetchBillingData('credit_grants');
    }

    public function fetchBillingData($type)
    {
        $url = "https://api.openai.com/v1/organization/costs";

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->apiKey}",
            'Content-Type'  => 'application/json',
        ])->get($url);

        return $response->json();
    }
}
