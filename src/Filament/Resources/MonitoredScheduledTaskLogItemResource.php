<?php

declare(strict_types=1);

namespace Mvenghaus\FilamentScheduleMonitor\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
use Nette\Utils\Html;
use Spatie\ScheduleMonitor\Models\MonitoredScheduledTask;
use Spatie\ScheduleMonitor\Models\MonitoredScheduledTaskLogItem;

class MonitoredScheduledTaskLogItemResource extends Resource
{
    protected static ?string $model = MonitoredScheduledTaskLogItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __(config('filament-schedule-monitor.resources.monitored_scheduled_task_log_item.navigation_group'));
    }

    public static function getNavigationLabel(): string
    {
        return __(config('filament-schedule-monitor.resources.monitored_scheduled_task_log_item.navigation_label'));
    }

    public static function getModelLabel(): string
    {
        return __(config('filament-schedule-monitor.resources.monitored_scheduled_task_log_item.label'));
    }

    public static function getPluralLabel(): ?string
    {
        return __(config('filament-schedule-monitor.resources.monitored_scheduled_task_log_item.plural_label'));
    }

    public static function getNavigationIcon(): ?string
    {
        return config('filament-schedule-monitor.resources.monitored_scheduled_task_log_item.navigation_icon');
    }

    public static function getNavigationSort(): ?int
    {
        return config('filament-schedule-monitor.resources.monitored_scheduled_task_log_item.navigation_sort');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->label(__('filament-schedule-monitor::translations.type'))
                    ->sortable()
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        MonitoredScheduledTaskLogItem::TYPE_STARTING => 'info',
                        MonitoredScheduledTaskLogItem::TYPE_FINISHED => 'success',
                        MonitoredScheduledTaskLogItem::TYPE_SKIPPED => 'warning',
                        MonitoredScheduledTaskLogItem::TYPE_FAILED => 'danger',
                    })
                    ->formatStateUsing(
                        fn(string $state): string => __('filament-schedule-monitor::translations.'.$state)
                    )
                    ->action(
                        Tables\Actions\ViewAction::make()
                            ->modalHeading('')
                            ->modalContent(
                                fn(MonitoredScheduledTaskLogItem $record): HtmlString => new HtmlString(
                                    sprintf('<pre>%s</pre>', print_r($record->meta, true))
                                )
                            )
                    ),
                Tables\Columns\TextColumn::make('monitoredScheduledTask.name')
                    ->label(__('filament-schedule-monitor::translations.name'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('meta.memory')
                    ->label(__('filament-schedule-monitor::translations.memory'))
                    ->sortable()
                    ->formatStateUsing(fn(string $state): string => sprintf('%d MB', (int) $state / 1024 / 1024)),
                Tables\Columns\TextColumn::make('meta.runtime')
                    ->label(__('filament-schedule-monitor::translations.runtime'))
                    ->sortable()
                    ->formatStateUsing(fn(string $state): string => sprintf('%.2fs', $state)),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament-schedule-monitor::translations.created_at'))
                    ->sortable()
                    ->dateTime(),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->label(__('filament-schedule-monitor::translations.type'))
                    ->multiple()
                    ->options([
                        MonitoredScheduledTaskLogItem::TYPE_STARTING => __('filament-schedule-monitor::translations.'.MonitoredScheduledTaskLogItem::TYPE_STARTING),
                        MonitoredScheduledTaskLogItem::TYPE_FINISHED => __('filament-schedule-monitor::translations.'.MonitoredScheduledTaskLogItem::TYPE_FINISHED),
                        MonitoredScheduledTaskLogItem::TYPE_SKIPPED => __('filament-schedule-monitor::translations.'.MonitoredScheduledTaskLogItem::TYPE_SKIPPED),
                        MonitoredScheduledTaskLogItem::TYPE_FAILED => __('filament-schedule-monitor::translations.'.MonitoredScheduledTaskLogItem::TYPE_FAILED),
                    ]),
                SelectFilter::make('name')
                    ->attribute('monitored_scheduled_task_id')
                    ->label(__('filament-schedule-monitor::translations.name'))
                    ->multiple()
                    ->options(
                        MonitoredScheduledTask::all()->pluck('name', 'id')
                    ),
            ])
            ->filtersLayout(Tables\Enums\FiltersLayout::AboveContent);
    }

    public static function getPages(): array
    {
        return [
            'index' => MonitoredScheduledTaskLogItemResource\Pages\ListMonitoredScheduledTaskLogItems::route('/'),
        ];
    }
}
