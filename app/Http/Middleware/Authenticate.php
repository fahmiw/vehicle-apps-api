<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if(empty($request->header('Authorization'))){
            header('HTTP/1.0 401');
            $response = json_encode(["statusCode" => 401,
            "message" => "Unauthorization"]);
            echo $response;
            die();
        }
    }
}
