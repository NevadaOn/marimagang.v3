<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ServeWithScheduler extends Command
{
    protected $signature = 'serve:auto {--host=0.0.0.0} {--port=8000}';
    protected $description = 'Run Laravel development server and scheduler together';

    public function handle()
    {
        $host = $this->option('host');
        $port = $this->option('port');

        $this->info("🚀 Menjalankan Laravel server di http://{$host}:{$port}");
        $this->info("⏱️ Menjalankan scheduler di background...");

        if (strncasecmp(PHP_OS, 'WIN', 3) === 0) {
            pclose(popen("start /B php artisan schedule:work", "r"));
        } else {
            exec("php artisan schedule:work > /dev/null 2>&1 &");
        }

        passthru("php -S {$host}:{$port} -t public");
    }
}
