<?php
<<<<<<< HEAD

use Illuminate\Support\Str;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

if (! function_exists('user') && class_exists('App\\Models\\User')) {
    function user(): ?\App\Models\User
    {
        return auth()->user();
    }
}

if (! function_exists('selected')) {
    function selected(bool $selected, string $attribute = 'selected'): ?string
    {
        if ($selected) {
            return $attribute;
        }
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
            $class = new class {
               use AuthorizesRequests;
            };
        }

        return $class->authorize($ability, $arguments);
    }
}

if (! function_exists('url_shorten')) {
    function url_shorten(string $url)
    {
        return Str::after($url, '://');
    }
}
=======
>>>>>>> a645368b9bd760034de7a62ddd46dc0ccc75e038
