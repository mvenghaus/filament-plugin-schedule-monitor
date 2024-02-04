<?php

declare(strict_types=1);

namespace Mvenghaus\FilamentScheduleMonitor\Filament\Resources\MonitoredScheduledTaskResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Mvenghaus\FilamentScheduleMonitor\Filament\Resources\MonitoredScheduledTaskResource;

class ListMonitoredScheduledTasks extends ListRecords
{
    protected static string $resource = MonitoredScheduledTaskResource::class;
}
