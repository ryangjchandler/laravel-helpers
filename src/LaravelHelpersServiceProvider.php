<?php

namespace RyanChandler\LaravelHelpers;

use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelHelpersServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-helpers');
    }

    public function packageBooted()
    {
        Blade::directive('attributes', static function (string $expression): string {
            return "<?php echo e(attributes({$expression})); ?>";
        });
    }
}
