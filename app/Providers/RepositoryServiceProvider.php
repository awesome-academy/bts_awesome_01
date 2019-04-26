<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Tour;
use App\Models\Day;
use App\Models\Image;
use App\Models\Province;
use App\Models\Service;
use App\Models\Category;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Tour\TourRepository;
use App\Repositories\Tour\TourRepositoryInterface;
use App\Repositories\Day\DayRepository;
use App\Repositories\Day\DayRepositoryInterface;
use App\Repositories\Image\ImageRepository;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\Province\ProvinceRepository;
use App\Repositories\Province\ProvinceRepositoryInterface;
use App\Repositories\Service\ServiceRepository;
use App\Repositories\Service\ServiceRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\DatabaseManager;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $db = $this->app->make(DatabaseManager::class);
        $this->app->singleton(UserRepositoryInterface::class, function () use ($db) {
            return new UserRepository(new User(), $db);
        });
        $this->app->singleton(TourRepositoryInterface::class, function () use ($db) {
            return new TourRepository(new Tour(), $db);
        });
        $this->app->singleton(DayRepositoryInterface::class, function () use ($db) {
            return new DayRepository(new Day(), $db);
        });
        $this->app->singleton(ImageRepositoryInterface::class, function () use ($db) {
            return new ImageRepository(new Image(), $db);
        });
        $this->app->singleton(ProvinceRepositoryInterface::class, function () use ($db) {
            return new ProvinceRepository(new Province(), $db);
        });
        $this->app->singleton(ServiceRepositoryInterface::class, function () use ($db) {
            return new ServiceRepository(new Service(), $db);
        });
        $this->app->singleton(CategoryRepositoryInterface::class, function () use ($db) {
            return new CategoryRepository(new Category(), $db);
        });
    }
}
