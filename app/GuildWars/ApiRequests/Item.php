<?php

namespace App\GuildWars\ApiRequests;

class Item extends ApiRequest
{
    public static function fetch($item_id)
    {
        return (new static)->get("/items/$item_id");
    }
}
