<?php

declare(strict_types=1);

namespace Mvenghaus\FilamentScheduleMonitor;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Mvenghaus\FilamentScheduleMonitor\Filament\Resources\MonitoredScheduledTaskLogItemResource;
use Mvenghaus\FilamentScheduleMonitor\Filament\Resources\MonitoredScheduledTaskResource;

class FilamentPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-plugin-schedule-monitor';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            MonitoredScheduledTaskResource::class,
            MonitoredScheduledTaskLogItemResource::class
        ]);
    }

    public function boot(Panel $panel): void
    {
    }

    public static function make(): static
    {
        return app(static::class);
    }
}
