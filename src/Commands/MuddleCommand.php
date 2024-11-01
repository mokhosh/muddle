<?php

namespace Mokhosh\Muddle\Commands;

use Illuminate\Console\Command;

class MuddleCommand extends Command
{
    public $signature = 'muddle';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
