<?php

namespace App\GuildWars\ApiRequests;

use Illuminate\Support\Facades\Http;

class ApiRequest 
{    
    private $base_url;
    private $api_key;

    public function __construct()
    {
        $this->base_url = config('guildwars.base_url');
        $this->api_key = config('guildwars.api_key');
    }

    public function setApiKey($api_key) {
        $this->api_key = $api_key;
    }

    protected function get($endpoint, $query = null) {
        $response = Http::withToken($this->api_key)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->get($this->base_url . $endpoint, $query);
        
        $status = $response->getStatusCode();
        if ($status != 200) {
            throw new \Exception('Request failed with code ' . $status);
        }

        return $response->json();
    }
}
