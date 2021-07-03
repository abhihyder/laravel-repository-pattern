<?php

namespace App\Providers;

use App\Repositories\Eloquent\ParcelRepository;
use App\Repositories\Eloquent\ParcelStationRepository;
use App\Repositories\Eloquent\ParcelCategoryRepository;
use App\Repositories\Eloquent\EnvelopeQrCodeRepository;
use App\Repositories\Interfaces\AddressBookRepositoryInterface;
use App\Repositories\Eloquent\AddressBookRepository;
use App\Repositories\Interfaces\ParcelRepositoryInterface;
use App\Repositories\Interfaces\ParcelStationRepositoryInterface;
use App\Repositories\Interfaces\ParcelCategoryRepositoryInterface;
use App\Repositories\Interfaces\EnvelopeQrCodeRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AddressBookRepositoryInterface::class, AddressBookRepository::class);
        $this->app->bind(ParcelStationRepositoryInterface::class, ParcelStationRepository::class);
        $this->app->bind(ParcelCategoryRepositoryInterface::class, ParcelCategoryRepository::class);
        $this->app->bind(EnvelopeQrCodeRepositoryInterface::class, EnvelopeQrCodeRepository::class);
        $this->app->bind(ParcelRepositoryInterface::class, ParcelRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
