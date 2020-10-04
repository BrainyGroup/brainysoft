<?php

namespace BrainySoft\Providers;

use BrainySoft\Payroll\BasicSetting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class BasicSettingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
            // only use the Settings package if the Settings table is present in the database
        if (!App::runningInConsole() && count(Schema::getColumnListing('settings'))) {
            $settings = BasicSetting::all();
            foreach ($settings as $key => $setting)
            {
                Config::set('settings.'.$setting->key, $setting->value);
            }
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('settings', function ($app) {
            return new BasicSetting();
        });
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('BasicSetting', BasicSetting::class);
    }
}
