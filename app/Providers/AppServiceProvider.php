<?php

namespace App\Providers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;


// use App\Policies\BookPolicy;

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
        //
        Gate::before(function(User $user) {
            if($user->hasRole('admin')){
                return true;
            }
        });

        Gate::define('viewAll', function(User $user): Response
        {
             return $user->roles->flatMap->permissions->contains('name','can_view_all')
                    ? Response::allow()
                    : Response::deny('You do not have this capability. "VIEW ALL"');
        });

        Gate::define('create', function(User $user): Response
        {
             return $user->roles->flatMap->permissions->contains('name','can_create')
                    ? Response::allow()
                    : Response::deny('You do not have this capability. "CREATE"');
        });

        Gate::define('view', function(User $user): Response
        {
             return $user->roles->flatMap->permissions->contains('name','can_view_detail')
                    ? Response::allow()
                    : Response::deny('You do not have this capability. "VIEW DETAIL"');
        });

        Gate::define('update', function(User $user): Response
        {
             return $user->roles->flatMap->permissions->contains('name','can_update')
                    ? Response::allow()
                    : Response::deny('You do not have this capability. "UPDATE"');
        });

        Gate::define('delete', function(User $user): Response
        {
             return $user->roles->flatMap->permissions->contains('name','can_delete')
                    ? Response::allow()
                    : Response::deny('You do not have this capability."DELETE"');
        });

        Paginator::useBootstrapFive();
    }
}
