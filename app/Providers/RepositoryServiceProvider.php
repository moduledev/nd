<?php

namespace App\Providers;

use App\Contracts\AdminContract;
use App\Contracts\AttributeContract;
use App\Contracts\CategoryContract;
use App\Contracts\PermissionContract;
use App\Contracts\ProductContract;
use App\Contracts\RoleContract;
use App\Repositories\AdminRepository;
use App\Repositories\AttributeRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\ProductRepository;
use App\Repositories\RoleRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        AdminContract::class => AdminRepository::class,
        RoleContract::class => RoleRepository::class,
        PermissionContract::class => PermissionRepository::class,
        ProductContract::class => ProductRepository::class,
        AttributeContract::class => AttributeRepository::class,
        CategoryContract::class => CategoryRepository::class,
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
