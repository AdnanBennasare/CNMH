<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
            Gate::define('create-Tasks', function ($user) {
                return $user->role == 'project_leader';
            });
            Gate::define('store-Tasks', function ($user) {
                return $user->role == 'project_leader';
            });
            Gate::define('edit-Tasks', function ($user) {
                return $user->role == 'project_leader';
            });
            Gate::define('update-Tasks', function ($user) {
                return $user->role == 'project_leader';
            });
            Gate::define('destroy-Tasks', function ($user) {
                return $user->role == 'project_leader';
            });
            Gate::define('index-Tasks', function ($user) {
                return $user ;
            });
            
        
    }
}
