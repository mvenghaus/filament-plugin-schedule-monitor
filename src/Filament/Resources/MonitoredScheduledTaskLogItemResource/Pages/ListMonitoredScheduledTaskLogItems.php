<?php

declare(strict_types=1);

namespace Mvenghaus\FilamentScheduleMonitor\Filament\Resources\MonitoredScheduledTaskLogItemResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Mvenghaus\FilamentScheduleMonitor\Filament\Resources\MonitoredScheduledTaskLogItemResource;

class ListMonitoredScheduledTaskLogItems extends ListRecords
{
    protected static string $resource = MonitoredScheduledTaskLogItemResource::class;
}
