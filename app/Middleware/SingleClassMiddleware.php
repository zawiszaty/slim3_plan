<?php

namespace App\Middleware;

use App\Models\GetSingleClass;

class SingleClassMiddleware extends Middleware {

    public function __invoke($request, $response , $next)
    {

        $date =  $this->container->GetSingleClass->getClass();



        $this->container->view->getEnvironment()->addGlobal('singleClass', $date);




        $response = $next($request, $response);
        return $response;
    }
}