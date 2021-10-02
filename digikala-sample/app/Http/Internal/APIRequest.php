<?php

namespace App\Http\Internal;

use Exception;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class APIRequest for inner API requests of our website.
 *
 * @package App\Http\Internal
 */
class APIRequest
{
    /**
     * A simple API request.
     *
     * @param string $route
     * @param string $method
     * @return false|string
     * @throws Exception
     */
    public static function handle(string $route, string $method = 'get')
    {
        $request = Request::create($route, $method);
        return collect(json_decode(app()->handle($request)->getContent(), true));
    }
}
