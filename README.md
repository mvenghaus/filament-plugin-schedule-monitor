# Filament Plugin - Schedule Monitor

With this plugin, you can display the data from [spatie/laravel-schedule-monitor](https://github.com/spatie/laravel-schedule-monitor) in your Filament panel.

## Screenshots

![Screenshot 1](https://raw.githubusercontent.com/mvenghaus/filament-plugin-schedule-monitor/main/docs/images/screenshot1.png)

![Screenshot 2](https://raw.githubusercontent.com/mvenghaus/filament-plugin-schedule-monitor/main/docs/images/screenshot2.png)

## Requirements

You need the latest version of Filament v3.

## Installation

Install the package via composer:

```bash
composer require spatie/laravel-schedule-monitor
php artisan vendor:publish --provider="Spatie\ScheduleMonitor\ScheduleMonitorServiceProvider" --tag="schedule-monitor-migrations"
php artisan migrate
```

```bash
composer require mvenghaus/filament-plugin-schedule-monitor:"^3.0"
```

Register the plugin in AdminPanelProvider:

```bash
...
->plugin(\Mvenghaus\FilamentScheduleMonitor\FilamentPlugin::make())
...
```

Publishing the config (optional):

```bash
php artisan vendor:publish --tag="filament-schedule-monitor-config"
```

# Contact
If you any questions or you find a bug, please report [here](https://github.com/mvenghaus/filament-plugin-schedule-monitor/issues).
