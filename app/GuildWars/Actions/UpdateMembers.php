<?php

namespace App\GuildWars\Actions;

use App\GuildWars\ApiRequests\GuildMembers;
use App\Models\Member;

class UpdateMembers {

    public static function execute()
    {
        $members = GuildMembers::fetch();
        if (!$members) {
            return;
        }

        $names = Member::getUniqueNames();

        $namesObj = [];
        foreach ($names as $name) {
            $namesObj[$name] = $name;
        }

        foreach ($members as $member) {
            $identifier = ['name' => $member['name']];

            $joined = date_create_from_format('Y-m-d\TH:i:s.000Z', $member['joined']);

            $memberData = [
                'name' => $member['name'],
                'rank' => $member['rank'],
                'joined' => $joined ? $joined->format('Y-m-d H:i:s') : null
            ];

            Member::updateOrCreate($identifier, $memberData);

            unset($namesObj[$member['name']]);
        }

        foreach ($namesObj as $k => $name) {
            Member::deleteByName($name);
        }
    }
}
