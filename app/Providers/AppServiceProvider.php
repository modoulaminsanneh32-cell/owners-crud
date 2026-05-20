<?php

namespace App\Providers;
use App\Events\OwnersListed;
use App\Listeners\SendOwnerInformation;
use App\Models\Owner;
use App\Models\Car;
use App\Policies\CarPolicy;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('deleteOwner', function ($user, Owner $owner){
            return ($owner->user_id==$user->id)||($user->type=='admin');

        });

        Gate::define('changeLanguage', function ($user) {

        });


        Gate::policy(Car::class, CarPolicy::class);


    }
}
