<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;

use App\Models\Contract;
use Illuminate\Support\ServiceProvider;

class driverContractStatusProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (auth()->check()) {
            $driverID = auth()->user()->id;
            $pendingContractsCount = Contract::where('driver_user_id', $driverID)
                ->where('status', 2)
                ->count();
            // Share the $pendingContractsCount value with all views
            View::share('pendingContractsCount', $pendingContractsCount);
        }
    }
}
