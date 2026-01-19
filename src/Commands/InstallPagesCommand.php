<?php

declare(strict_types=1);

namespace Accelade\Pages\Commands;

use Illuminate\Console\Command;

class InstallPagesCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'pages:install
                            {--force : Overwrite existing files}';

    /**
     * The console command description.
     */
    protected $description = 'Install the Pages plugin';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Installing Pages...');

        // Publish config
        $this->call('vendor:publish', [
            '--tag' => 'accelade-pages-config',
            '--force' => $this->option('force'),
        ]);

        $this->info('Pages installed successfully!');

        return self::SUCCESS;
    }
}
