<?php

namespace App\GuildWars\Actions;

use App\GuildWars\ApiRequests\Account;
use App\Models\User;

class UpdateAccount
{
    public static function execute(User $user)
    {
        $account = Account::fetch($user);
        if (!$account) {
            return;
        }

        $user->update([
            'account_name' => $account['name'],
            'world_id' => $account['world'],
            // 'world_name' => $account['world_name'],
            'wvw_rank' => $account['wvw_rank'],
            'fractal_level' => $account['fractal_level'],
        ]);
    }
}
