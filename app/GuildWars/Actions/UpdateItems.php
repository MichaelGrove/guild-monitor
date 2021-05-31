<?php

namespace App\GuildWars\Actions;

use App\GuildWars\ApiRequests\Item as ItemRequest;
use App\Models\Item;
use App\Models\StashLog;

class UpdateItems {

    public static function execute()
    {
        $to_not_fetch = Item::getUniqueItemIds();
        $to_fetch = StashLog::getMissingItemIds($to_not_fetch);
        $chunks = $to_fetch->chunk(50);

        foreach ($chunks as $chunk) {
            $results = ItemRequest::fetch($chunk);
            foreach ($results as $item) {
                Item::updateOrCreate(
                    ['item_id' => $item['id']],
                    [
                        'item_id' => $item['id'],
                        'name' => $item['name'],
                        'type' => $item['type'],
                        'description' => empty($item['description']) ? '' : $item['description'],
                    ],
                );
            }
        }
    }
}
