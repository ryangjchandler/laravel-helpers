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
        Request::macro('collect', function ($keys = null) {
            /** @var \Illuminate\Http\Request $this */
            return Collection::make(
                $this->all($keys)
            );
        });

        Str::macro('shortenUrl', function ($url) {
            return url_shorten($url);
        });

        Blade::directive('selected', function ($expression) {
            return "<?php echo \selected({$expression}); ?>";
        });

        Blade::directive('disabled', function ($expression) {
            return "<?php echo \selected({$expression}, 'disabled'); ?>";
        });
    }
}
