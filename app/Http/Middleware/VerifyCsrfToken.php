<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        // for allowing use of DELETE, PUT etc. Delete this afterwards!!
		// this will remove the middleware for authentication
		'api/*', // this works as well
    ];
}
