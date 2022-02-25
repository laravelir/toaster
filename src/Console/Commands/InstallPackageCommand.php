<?php

namespace Laravelir\Toaster\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallToasterCommand extends Command
{
    protected $signature = 'toaster:install';

    protected $description = 'Install the toaster Toaster';

    public function handle()
    {
        $this->line("\t... Welcome To Toaster Installer ...");

        //config
        if (File::exists(config_path('toaster.php'))) {
            $confirm = $this->confirm("toaster.php already exist. Do you want to overwrite?");
            if ($confirm) {
                $this->publishConfig();
                $this->info("config overwrite finished");
            } else {
                $this->info("skipped config publish");
            }
        } else {
            $this->publishConfig();
            $this->info("config published");
        }


        $this->info("Toaster Successfully Installed.\n");
        $this->info("\t\tGood Luck.");
    }


    //     //assets
    //     if (File::exists(public_path('toaster'))) {
    //         $confirm = $this->confirm("toaster directory already exist. Do you want to overwrite?");
    //         if ($confirm) {
    //             $this->publishAssets();
    //             $this->info("assets overwrite finished");
    //         } else {
    //             $this->info("skipped assets publish");
    //         }
    //     } else {
    //         $this->publishAssets();
    //         $this->info("assets published");
    //     }

    private function publishConfig()
    {
        $this->call('vendor:publish', [
            '--provider' => "Laravelir\\Toaster\Providers\toasterServiceProvider",
            '--tag'      => 'config',
            '--force'    => true
        ]);
    }

    // private function publishMigration()
    // {
    //     $this->call('vendor:publish', [
    //         '--provider' => "Laravelir\\Toaster\Providers\toasterServiceProvider",
    //         '--tag'      => 'migrations',
    //         '--force'    => true
    //     ]);
    // }

    // private function publishAssets()
    // {
    //     $this->call('vendor:publish', [
    //         '--provider' => "Laravelir\\Toaster\Providers\toasterServiceProvider",
    //         '--tag'      => 'assets',
    //         '--force'    => true
    //     ]);
    // }
}
