<?php

namespace BrainySoft\Providers;

use BrainySoft\Contracts\BankContract;
use Illuminate\Support\ServiceProvider;
use BrainySoft\Repositories\BankRepository;



class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        BankContract::class         =>          BankRepository::class,
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }
}
