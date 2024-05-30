<?php

namespace App\Providers;

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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 管理者のみ許可
        Gate::define('admin-only', function ($user) {
            return ($user->role->id == 1);
        });
        // 店舗管理者のみ許可
        Gate::define('manager-only', function($user){
            return ($user->role->id == 2);
        });
        Gate::define('user-only', function($user){
            return ($user->role->id == 3);
        });
        // 一般ユーザー以上に許可
        Gate::define('user-higher', function ($user) {
            return ($user->role->id <= 3);
        });
        // 一般ユーザーと管理者のみ許可
        Gate::define('user-or-admin-only', function($user){
            return ($user->role->id || [1, 3]);
        });
    }
}
