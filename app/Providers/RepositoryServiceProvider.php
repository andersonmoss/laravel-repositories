<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Core\Eloquent\{
    EloquentCategoryRepository,
    EloquentProductRepository
};

use App\Repositories\Core\QueryBuilder\{
    QueryBuilderCategoryRepository
};

use App\Repositories\Contracts\{
    ProductRepositoryInterface,
    CategoryRepositoryInterface
};

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(
            ProductRepositoryInterface::class,
            EloquentProductRepository::class,
        );
        // or use helper app()->bind();
        $this->app->bind(
            CategoryRepositoryInterface::class,
            //QueryBuilderCategoryRepository::class,
            EloquentCategoryRepository::class
        );
    }
}
