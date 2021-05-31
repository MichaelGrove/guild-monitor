<?php

namespace App\Console\Commands;

use App\GuildWars\Actions\UpdateItems;
use Illuminate\Console\Command;

class FetchItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guildwars:fetch-items';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches items from GW2 API.';

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
        UpdateItems::execute();
        return 0;
    }
}
