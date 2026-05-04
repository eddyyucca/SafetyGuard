<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

abstract class BaseModuleServiceProvider extends ServiceProvider
{
    /**
     * The module's base name.
     */
    protected string $moduleName = '';

    /**
     * Bootstrap module resources.
     */
    public function boot(): void
    {
        $modulePath = $this->modulePath();

        $this->registerConfig($modulePath);
        $this->registerViews($modulePath);
        $this->registerTranslations($modulePath);
        $this->registerMigrations($modulePath);
        $this->registerRoutes($modulePath);
    }

    protected function modulePath(): string
    {
        return base_path('Modules/'.$this->moduleName);
    }

    protected function registerConfig(string $modulePath): void
    {
        $configPath = $modulePath.'/Config/config.php';

        if (! is_file($configPath)) {
            return;
        }

        $this->mergeConfigFrom($configPath, strtolower($this->moduleName));
    }

    protected function registerViews(string $modulePath): void
    {
        $viewsPath = $modulePath.'/Resources/views';

        if (is_dir($viewsPath)) {
            $this->loadViewsFrom($viewsPath, strtolower($this->moduleName));
        }
    }

    protected function registerTranslations(string $modulePath): void
    {
        $langPath = $modulePath.'/Resources/lang';

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, strtolower($this->moduleName));
        }
    }

    protected function registerMigrations(string $modulePath): void
    {
        $migrationPath = $modulePath.'/Database/migrations';

        if (is_dir($migrationPath)) {
            $this->loadMigrationsFrom($migrationPath);
        }
    }

    protected function registerRoutes(string $modulePath): void
    {
        foreach (['web', 'api', 'console'] as $routeType) {
            $routePath = $modulePath.'/Routes/'.$routeType.'.php';

            if (is_file($routePath)) {
                $this->loadRoutesFrom($routePath);
            }
        }
    }
}
