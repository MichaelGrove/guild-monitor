<?php

namespace App\GuildWars\ApiRequests;

class Worlds extends ApiRequest
{
    public static function fetch()
    {
        return (new static)->get('/worlds', ['ids' => 'all']);
    }
}
