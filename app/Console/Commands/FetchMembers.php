<?php

namespace App\Console\Commands;

use App\GuildWars\Actions\UpdateMembers;
use Illuminate\Console\Command;

class FetchMembers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guildwars:fetch-members';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches guild members data from GW2 API.';

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
        UpdateMembers::execute();
        return 0;
    }
}
