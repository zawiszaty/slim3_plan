<?php
/**
 * Created by PhpStorm.
 * User: zawisza
 * Date: 05.07.2017
 * Time: 19:25
 */

namespace App\Controllers;


class Controller
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function __get($property)
    {
        if($this->container->{$property}){

            return $this->container->{$property};
        }

    }

}