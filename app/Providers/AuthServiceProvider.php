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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
      $this->registerPolicies();

      // 管理者以上に許可
      Gate::define('admin-role', function ($user) {
        return ($user->role >= 1 && $user->role <= 10);
      });
      // 一般ユーザー以上に許可ー
      Gate::define('user-role', function ($user) {
        return ($user->role > 10 && $user->role <= 100);
      });
    }
    
}
