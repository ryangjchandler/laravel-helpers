<?php

namespace RyanChandler\LaravelHelpers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
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
        Blade::directive('selected', function ($expression) {
            return "<?php echo \selected({$expression}); ?>";
        });

        Blade::directive('disabled', function ($expression) {
            return "<?php echo \selected({$expression}, 'disabled'); ?>";
        });
    }
}
