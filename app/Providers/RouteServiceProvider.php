<?php

namespace App\Providers;

use App\Http\Utils\RouteDefiner;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Symfony\Component\Finder\Finder;

class RouteServiceProvider extends ServiceProvider
{
    public function map(): void
    {
        /** @var Finder $handlers */
        $handlers = Finder::create()->files()->in(app_path('Http/Handlers'));
        foreach ($handlers as $file) {
            $className = 'App' . str_replace([app_path(), '/', '.php'], ['', '\\', ''], $file);
            $class = new \ReflectionClass($className);

            if ($class->isSubclassOf(RouteDefiner::class)) {
                $this->app->call([$className, 'defineRoute']);
            }
        }
    }
}
