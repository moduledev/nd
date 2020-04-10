<?php

namespace App\Providers;

use App\Contracts\AdminContract;
use App\Contracts\PermissionContract;
use App\Contracts\RoleContract;
use App\Repositories\AdminRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        AdminContract::class => AdminRepository::class,
        RoleContract::class => RoleRepository::class,
        PermissionContract::class => PermissionRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        foreach ($this->repositories as $interfaces => $realization){
            $this->app->bind($interfaces, $realization);
        }
    }
}
