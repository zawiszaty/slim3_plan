<?php

namespace App\Middleware;

class GetClassMiddleware extends Middleware {

    public function __invoke($request, $response , $next)
    {

      $dateZawodowa =  $this->container->GetClass->getZawodowa();

        $this->container->view->getEnvironment()->addGlobal('zawodowa', $dateZawodowa);

        $dateTechnikum =  $this->container->GetClass->getTechnikum();

        $this->container->view->getEnvironment()->addGlobal('technikum', $dateTechnikum);

        $dateLiceum =  $this->container->GetClass->getLiceum();

        $this->container->view->getEnvironment()->addGlobal('liceum', $dateLiceum);


        $response = $next($request, $response);
        return $response;
    }
}