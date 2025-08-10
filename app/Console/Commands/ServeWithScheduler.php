<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ServeWithScheduler extends Command
{
    protected $signature = 'serve:auto';
    protected $description = 'Run Laravel server and scheduler together';

    public function handle()
    {
        $this->info('Menjalankan Laravel server dan scheduler...');

        if (strncasecmp(PHP_OS, 'WIN', 3) === 0) {
            pclose(popen("start /B php artisan schedule:work", "r"));
        } else {
            exec("php artisan schedule:work > /dev/null 2>&1 &");
        }

        $this->call('serve');
    }
}
