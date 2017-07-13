<?php

/**
 * Created by PhpStorm.
 * User: zawisza
 * Date: 05.07.2017
 * Time: 19:20
 */
namespace App\Controllers;





class HomeController extends Controller
{


    public function index($request,$response){



        return $this->view->render($response, 'home.twig');

    }

    public function showClass($request,$response){


        $id = $request->getAttribute('id');

$date = $this->GetSingleClass->getClass($id);




        return $this->view->render($response, 'singleClass.twig',[
            'singleClass'=>$date
        ]);

    }
}