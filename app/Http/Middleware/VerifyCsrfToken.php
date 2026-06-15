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
        "/api_register","/api_login","/api_applycoupon","/api_addaddress",
        "/api_addorder","/api_getorder","/api_updateqty","/api_removeorder"
        ,"/api_confirmorder","/api_getOrderhistory"
    ];
}
