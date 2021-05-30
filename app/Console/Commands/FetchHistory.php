<?php

namespace App\Console\Commands;

use App\GuildWars\Actions\UpdateHistory;
use Illuminate\Console\Command;

class FetchHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guildwars:fetch-history';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches guild history data from GW2 API.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        UpdateHistory::execute();
        return 0;
    }
}
