<?php

namespace App\GuildWars\ApiRequests;

class GuildUpgrade extends ApiRequest
{
    public static function fetch($upgrade_id)
    {
        return (new static)->get("/guild/upgrades/$upgrade_id");
    }
}
