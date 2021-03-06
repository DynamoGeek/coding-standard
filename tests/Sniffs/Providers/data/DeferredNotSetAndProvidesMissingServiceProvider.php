<?php
declare(strict_types=1);

namespace App\Providers;

use App\Contracts\Services\SomeNameSpace\SomeServiceContract;
use App\Contracts\Services\SomeOtherNameSpace\SomeOtherServiceContract;
use App\Contracts\Services\AnotherNameSpace\AnotherServiceContract;
use App\Services\SomeNameSpace\SomeService;
use App\Services\SomeOtherNameSpace\SomeOtherService;
use App\Services\AnotherNameSpace\AnotherService;

class SomeServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(SomeServiceContract::class, function () {
            return new SomeService(
                $this->app->make('ThisDoesntActuallyMatter'),
                'NeitherDoesThis'
            );
        });

        $this->app->bind('App\Contracts\Services\SomeOtherNameSpace\SomeOtherServiceContract', function () {
            return new SomeOtherService(
                $this->app->make('ThisDoesntActuallyMatter'),
                'NeitherDoesThis'
            );
        });

        $this->app->bind(AnotherServiceContract::class, function () {
            return new AnotherService(
                $this->app->make('ThisDoesntActuallyMatter'),
                'NeitherDoesThis'
            );
        });
    }


    /**
     * @return array the provided contracts for this deferred provider
     */
    public function provides(): array
    {
        return [
            SomeServiceContract::class,
            AnotherServiceContract::class,
        ];
    }
}
