<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Health\Facades\Health;
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;
use Spatie\Health\Checks\Checks\CacheCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\DatabaseConnectionCountCheck;
use Spatie\Health\Checks\Checks\DatabaseTableSizeCheck;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use Spatie\Health\Checks\Checks\PingCheck;
use Spatie\Health\Checks\Checks\ScheduleCheck;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        Health::checks([
            UsedDiskSpaceCheck::new()->label('Disk space on main disk'),
            CacheCheck::new(),
            DatabaseCheck::new(),
            DatabaseConnectionCountCheck::new()
        ->failWhenMoreConnectionsThan(100),
        DatabaseTableSizeCheck::new()
        ->table('users', maxSizeInMb: 1_000),
        DebugModeCheck::new(),
        EnvironmentCheck::new(),
        PingCheck::new()->url('https://www.google.com/'),
        ScheduleCheck::new(),
        ]);
    }
    public function boot()
    {
     
    }
}
