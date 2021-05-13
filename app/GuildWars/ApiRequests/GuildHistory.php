<?php

namespace App\GuildWars\ApiRequests;

class GuildHistory extends ApiRequest
{
    public static function fetch($latest_id = null)
    {
        $guild_key = config('guildwars.guild_key');
        
        $query = [];
        if ($latest_id) {
            $query['since'] = $latest_id;
        }

        return (new static)->get("/guild/$guild_key/log", $query);
    }
}
