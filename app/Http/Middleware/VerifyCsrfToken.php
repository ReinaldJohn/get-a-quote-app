<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
        '/',
        '/clear-session-data',
        '/set-session-variable',
        '/unset-session-variable',
        '/update-session-variables',
        '/fetch-checkbox-content',
        '/quote-form-submit',
    ];
}