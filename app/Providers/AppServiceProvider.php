<?php

namespace App\Providers;

use App\Contracts\AIProviderInterface;
use App\Services\AI\Providers\OpenAIProvider;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
         $this->app->bind(
            AIProviderInterface::class,
            OpenAIProvider::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
