<?php

namespace App\Providers;

use App\Http\Integrations\SpotifyClient;
use App\Infrastructure\Repositories\DoctrinePersistRepository;
use App\Infrastructure\Repositories\DoctrineSongRepository;
use Illuminate\Support\ServiceProvider;
use Spotify\Contracts\SpotifyClientContract;
use Spotify\Repository\PersistRepository;
use Spotify\Repository\SongRepository;

class AppServiceProvider extends ServiceProvider
{
    private array $classBindings = [
        PersistRepository::class => DoctrinePersistRepository::class,
        SongRepository::class => DoctrineSongRepository::class,

        SpotifyClientContract::class => SpotifyClient::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->classBindings as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
