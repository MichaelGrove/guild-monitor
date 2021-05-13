<?php

namespace App\GuildWars\Actions;

use App\GuildWars\ApiRequests\GuildHistory;
use App\Models\HistoryItem;
use App\Models\InviteDeclineLog;
use App\Models\InviteLog;
use App\Models\JoinLog;
use App\Models\KickLog;
use App\Models\MotdLog;
use App\Models\RankChangeLog;
use App\Models\StashLog;
use App\Models\TreasuryLog;
use App\Models\UpgradeLog;

class UpdateHistory
{
    public function run()
    {
        $latest_id = HistoryItem::getLatestId();
        $history = GuildHistory::fetch($latest_id);
        if (!$history) {
            return;
        }

        foreach ($history as $item) {
            $time = date_create_from_format('Y-m-d\TH:i:s.000Z', $item['time']);

            $historyData = [
                'log_id' => $item['id'],
                'log_type' => $item['type'],
                'log_datetime' => $time ? $time->format('Y-m-d H:i:s') : null,
                'log_user' => $item['user'] ?? '',
            ];

            $metaData = $this->buildMetaData($item);

            if ($metaData) {
                $metaData->history_item()->create($historyData);
            }

            /** @var HistoryItem $item */
            // $history_item = HistoryItem::create($historyData);

            // if ($metaData) {
            //     $history_item->metable()->create($metaData);
            //     // $history_item->history_meta()->create($metaData);
            // }
        }
    }

    public function buildMetaData($item)
    {
        switch ($item['type']) {
            case 'stash':
                return StashLog::create([
                    'operation' => $item['operation'],
                    'item_id' => $item['item_id'],
                    'count' => $item['count'],
                    'coins' => $item['coins'],
                ]);
            case 'upgrade':
                return UpgradeLog::create([
                    'action' => $item['action'],
                    'upgrade_id' => $item['upgrade_id'],
                    'recipe_id' => $item['recipe_id'] ?? null,
                ]);
            case 'rank_change':
                return RankChangeLog::create([
                    'changed_by' => $item['changed_by'],
                    'old_rank' => $item['old_rank'],
                    'new_rank' => $item['new_rank'],
                ]);
            case 'invite_declined':
                return InviteDeclineLog::create([
                    'declined_by' => $item['declined_by']
                ]);
            case 'invited':
                return InviteLog::create([
                    'user' => $item['user'],
                    'invited_by' => $item['invited_by'],
                ]);
            case 'joined':
                return JoinLog::create([
                    'user' => $item['user']
                ]);
            case 'motd':
                return MotdLog::create([
                    'motd' => $item['motd']
                ]);
            case 'kick':
                return KickLog::create([
                    'user' => $item['user'],
                    'kicked_by' => $item['kicked_by']
                ]);
            default:
                return null;
        }
    }

    public static function execute()
    {
        return(new static)->run();
    }
}
