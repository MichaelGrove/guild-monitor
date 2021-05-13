<?php

namespace App\GuildWars\ApiRequests;

use App\Models\User;

class Account extends ApiRequest
{
    public static function fetch(User $user)
    {
        if (!$user->api_key) {
            throw new \Exception('User is missing an API key.');
        }
        
        $request = (new static);
        $request->setApiKey($user->api_key);
        return $request->get('/account');
    }
}
