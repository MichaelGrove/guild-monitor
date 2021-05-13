<?php

namespace App\GuildWars\ApiRequests;

class GuildMembers extends ApiRequest
{
    public static function fetch()
    {
        $guild_key = config('guildwars.guild_key');
        return (new static())->get("/guild/$guild_key/members");
    }
}
