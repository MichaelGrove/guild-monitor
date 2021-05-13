<?php

namespace App\GuildWars\Actions;

use App\GuildWars\ApiRequests\Worlds;
use App\Models\World;

class UpdateWorlds {

    public static function execute()
    {
        $worlds = Worlds::fetch();
        if (!$worlds) {
            return;
        }

        foreach ($worlds as $world) {
            World::updateOrCreate(
                ['world_id' => $world['id']],
                ['world_id' => $world['id'], 'world_name' => $world['name']]
            );
        }
    }

}
