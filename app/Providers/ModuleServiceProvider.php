<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Register all discovered module service providers.
     */
    public function register(): void
    {
        $this->registerModuleAutoloader();

        foreach ($this->discoverModuleProviders() as $provider) {
            $this->app->register($provider);
        }
    }

    /**
     * Register a lightweight PSR-4 autoloader for module classes.
     */
    protected function registerModuleAutoloader(): void
    {
        spl_autoload_register(static function (string $class): void {
            $prefix = 'Modules\\';

            if (! str_starts_with($class, $prefix)) {
                return;
            }

            $relativeClass = str_replace('\\', DIRECTORY_SEPARATOR, substr($class, strlen($prefix)));
            $path = base_path('Modules'.DIRECTORY_SEPARATOR.$relativeClass.'.php');

            if (is_file($path)) {
                require_once $path;
            }
        });
    }

    /**
     * Discover provider classes from the Modules directory.
     *
     * @return array<int, class-string>
     */
    protected function discoverModuleProviders(): array
    {
        $modulesPath = base_path('Modules');

        if (! is_dir($modulesPath)) {
            return [];
        }

        $providers = [];

        foreach (File::directories($modulesPath) as $modulePath) {
            $providerPath = $modulePath.'/Providers';

            if (! is_dir($providerPath)) {
                continue;
            }

            foreach (File::files($providerPath) as $providerFile) {
                if (! str_ends_with($providerFile->getFilename(), 'ServiceProvider.php')) {
                    continue;
                }

                $module = basename($modulePath);
                $provider = pathinfo($providerFile->getFilename(), PATHINFO_FILENAME);

                $providers[] = "Modules\\{$module}\\Providers\\{$provider}";
            }
        }

        sort($providers);

        return $providers;
    }
}
