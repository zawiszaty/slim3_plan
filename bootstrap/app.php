<?php
session_start();

require __DIR__.'/../vendor/autoload.php';
use Respect\Validation\Validator as v;
$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
        'db'=>[
            'driver'=>'mysql',
            'host'=>'localhost',
            'database' => 'codecourse',
            'username'=>'root',
            'password'=>'admin',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'=>'',




        ]
    ],

]);




$container = $app->getContainer();
$capsule = new Illuminate\Database\Capsule\Manager ;

$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db']= function ($container) use($capsule){
return $capsule;
};
$container['auth'] = function ($container){
    return new App\Auth\Auth;
};
$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};
$container['view'] = function ($container){

    $view = new Slim\Views\Twig(__DIR__ . '/../resources/views',[
        'cache'=> false,
    ]);

    $view->addExtension(new Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()
    ));



    $view->getEnvironment()->addGlobal('auth' ,[
        'check'=> $container->auth->check(),
        'user'=> $container->auth->user(),


    ]);
    $view->getEnvironment()->addGlobal('flash' , $container->flash);
    return $view;

};
$container['validator'] = function ($container){

return new App\Validation\Validator($container);
};

$container['HomeController']  =function($container){
    return new App\Controllers\HomeController($container);
};

$container['AuthController']  =function($container){
    return new App\Controllers\Auth\AuthController($container);
};
$container['PasswordController'] = function ($container){
    return new \App\Controllers\Auth\PasswordController($container);
};
$container['EditController'] = function ($container){
    return new \App\Controllers\Auth\EditController($container);
};
$container['GetClass'] = function ($container){
    return new \App\Models\GetClass($container);
};
$container['GetSingleClass'] = function ($container){
    return new \App\Models\GetSingleClass($container);
};

$container['AddClass'] = function ($container){
    return new \App\Add\AddClass();
};

$container['CreateTable'] = function ($container){
    return new \App\Add\CreateTable();
};
$container['DelClass'] = function ($container){
    return new \App\Del\DelClass();
};
$container['DelTable'] = function ($container){
    return new \App\Del\DelTable();
};

$container['UpdateClass'] = function ($container){
    return new \App\Update\UpdateClass();
};



$container['csrf'] = function ($container){
    return new Slim\Csrf\Guard;
};


$app->add(new App\Middleware\ValidationErrorMiddleware($container));
$app->add(new App\Middleware\OldInputMiddleware($container));
$app->add(new App\Middleware\CsrfViewMiddleware($container));
$app->add(new App\Middleware\GetClassMiddleware($container));
//$app->add(new App\Middleware\SingleClassMiddleware($container));


$app->add($container->csrf);

v::with('App\\Validation\\Rules');
require __DIR__ . '/../app/routes.php';