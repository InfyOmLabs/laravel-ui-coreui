<?php

namespace InfyOm\CoreUIPreset;

use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;

class CoreUIPresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        UiCommand::macro('coreui', function (UiCommand $command) {
            $coreUIPreset = new CoreUIPreset($command);
            $coreUIPreset->install();

            $command->info('CoreUI scaffolding installed successfully.');

            if ($command->option('auth')) {
                $coreUIPreset->installAuth();
                $command->info('CoreUI CSS auth scaffolding installed successfully.');
            }

            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }
}
