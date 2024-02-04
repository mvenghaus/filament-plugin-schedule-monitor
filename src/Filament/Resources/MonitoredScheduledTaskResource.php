<?php

declare(strict_types=1);

namespace Mvenghaus\FilamentScheduleMonitor\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Spatie\ScheduleMonitor\Models\MonitoredScheduledTask;

class MonitoredScheduledTaskResource extends Resource
{
    protected static ?string $model = MonitoredScheduledTask::class;

    public static function getNavigationGroup(): ?string
    {
        return __(config('filament-schedule-monitor.resources.monitored_scheduled_task.navigation_group'));
    }

    public static function getNavigationLabel(): string
    {
        return __(config('filament-schedule-monitor.resources.monitored_scheduled_task.navigation_label'));
    }

    public static function getModelLabel(): string
    {
        return __(config('filament-schedule-monitor.resources.monitored_scheduled_task.label'));
    }

    public static function getPluralLabel(): ?string
    {
        return __(config('filament-schedule-monitor.resources.monitored_scheduled_task.plural_label'));
    }

    public static function getNavigationIcon(): ?string
    {
        return config('filament-schedule-monitor.resources.monitored_scheduled_task.navigation_icon');
    }

    public static function getNavigationSort(): ?int
    {
        return config('filament-schedule-monitor.resources.monitored_scheduled_task.navigation_sort');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament-schedule-monitor::translations.name'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->label(__('filament-schedule-monitor::translations.type'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('cron_expression')
                    ->label(__('filament-schedule-monitor::translations.cron_expression'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('timezone')
                    ->label(__('filament-schedule-monitor::translations.timezone'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_started_at')
                    ->label(__('filament-schedule-monitor::translations.last_started_at'))
                    ->sortable()
                    ->dateTime(),
                Tables\Columns\TextColumn::make('last_finished_at')
                    ->label(__('filament-schedule-monitor::translations.last_finished_at'))
                    ->sortable()
                    ->dateTime(),
                Tables\Columns\TextColumn::make('last_failed_at')
                    ->label(__('filament-schedule-monitor::translations.last_failed_at'))
                    ->sortable()
                    ->dateTime(),
                Tables\Columns\TextColumn::make('last_skipped_at')
                    ->label(__('filament-schedule-monitor::translations.last_skipped_at'))
                    ->sortable()
                    ->dateTime(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => MonitoredScheduledTaskResource\Pages\ListMonitoredScheduledTasks::route('/'),
        ];
    }
}
