<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('test', function(User $user) {
            return preg_match('/test/', $user->name);
        });


        // use App\Models\User;
        // use Illuminate\Support\Facades\Gate;
        // if (Gate::denies('test', $user)) {
        //     abort(403);
        // }
    }
}
