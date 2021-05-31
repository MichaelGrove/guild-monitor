<?php

namespace App\GuildWars\ApiRequests;

use Illuminate\Support\Collection;

class Item extends ApiRequest
{
    /**
     * Fetches items from the GW2 API.
     *
     * @param Collection $item_ids
     * @return array
     */
    public static function fetch(Collection $item_ids)
    {
        return (new static)->get("/items?ids=" . $item_ids->join(','));
    }
}
