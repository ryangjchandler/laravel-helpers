<?php

use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\HtmlString;
use Illuminate\View\ComponentAttributeBag;

if (! function_exists('user') && class_exists('App\\Models\\User')) {
    function user(): ?\App\Models\User
    {
        return auth()->user();
    }
}

if (! function_exists('route_is')) {
    function route_is(string $route): bool
    {
        return Route::currentRouteName() === $route;
    }
}

if (! function_exists('selected')) {
    function selected(bool $selected, string $attribute = 'selected'): ?string
    {
        if ($selected) {
            return $attribute;
        }

        return null;
    }
}

if (! function_exists('attributes')) {
    function attributes(array $attributes = []): ComponentAttributeBag
    {
        return new ComponentAttributeBag($attributes);
    }
}

if (! function_exists('authorize')) {
    /**
     * Authorize a given action for the current user.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    function authorize(mixed $ability, mixed $arguments = []): Response
    {
        static $class = null;

        if ($class === null) {
            $class = new class () {
                use AuthorizesRequests;
            };
        }

        return $class->authorize($ability, $arguments);
    }
}

if (! function_exists('mdash')) {
    function mdash(): HtmlString
    {
        return new HtmlString('&mdash;');
    }
}
