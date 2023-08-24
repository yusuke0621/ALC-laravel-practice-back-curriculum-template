<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Address
        $this->app->bind(\App\Interfaces\Repositories\AddressRepositoryInterface::class, \App\Repositories\AddressRepository::class);
        $this->app->bind(\App\Interfaces\Services\AddressServiceInterface::class, \App\Services\AddressService::class);

        // // Cart
        $this->app->bind(\App\Interfaces\Repositories\CartRepositoryInterface::class, \App\Repositories\CartRepository::class);
        $this->app->bind(\App\Interfaces\Services\CartServiceInterface::class, \App\Services\CartService::class);

        // // Category
        $this->app->bind(\App\Interfaces\Repositories\CategoryRepositoryInterface::class, \App\Repositories\CategoryRepository::class);
        $this->app->bind(\App\Interfaces\Services\CategoryServiceInterface::class, \App\Services\CategoryService::class);

        // // Medium
        $this->app->bind(\App\Interfaces\Repositories\MediumRepositoryInterface::class, \App\Repositories\MediumRepository::class);
        $this->app->bind(\App\Interfaces\Services\MediumServiceInterface::class, \App\Services\MediumService::class);

        // // Order
        $this->app->bind(\App\Interfaces\Repositories\OrderRepositoryInterface::class, \App\Repositories\OrderRepository::class);
        $this->app->bind(\App\Interfaces\Services\OrderServiceInterface::class, \App\Services\OrderService::class);

        // // OrderProduct
        $this->app->bind(\App\Interfaces\Repositories\OrderProductRepositoryInterface::class, \App\Repositories\OrderProductRepository::class);
        $this->app->bind(\App\Interfaces\Services\OrderProductServiceInterface::class, \App\Services\OrderProductService::class);

        // // Product
        $this->app->bind(\App\Interfaces\Repositories\ProductRepositoryInterface::class, \App\Repositories\ProductRepository::class);
        $this->app->bind(\App\Interfaces\Services\ProductServiceInterface::class, \App\Services\ProductService::class);

        // // Review
        $this->app->bind(\App\Interfaces\Repositories\ReviewRepositoryInterface::class, \App\Repositories\ReviewRepository::class);
        $this->app->bind(\App\Interfaces\Services\ReviewServiceInterface::class, \App\Services\ReviewService::class);

        // // Store
        $this->app->bind(\App\Interfaces\Repositories\StoreRepositoryInterface::class, \App\Repositories\StoreRepository::class);
        $this->app->bind(\App\Interfaces\Services\StoreServiceInterface::class, \App\Services\StoreService::class);

        // // TaxRate
        $this->app->bind(\App\Interfaces\Repositories\TaxRateRepositoryInterface::class, \App\Repositories\TaxRateRepository::class);
        $this->app->bind(\App\Interfaces\Services\TaxRateServiceInterface::class, \App\Services\TaxRateService::class);

        // // User
        $this->app->bind(\App\Interfaces\Repositories\UserRepositoryInterface::class, \App\Repositories\UserRepository::class);
        $this->app->bind(\App\Interfaces\Services\UserServiceInterface::class, \App\Services\UserService::class);
    }

    public function boot()
    {

    }
}
