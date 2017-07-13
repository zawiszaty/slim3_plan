<?php

$app->get('/', 'HomeController:index')->setName('home');
$app->get('/home', 'HomeController:index');
$app->get('/home/{id}', 'HomeController:showClass');

$app->group('', function (){
    $this->get('/auth/signup','AuthController:getSignUp')->setName('auth.signup');
    $this->post('/auth/signup','AuthController:postSignUp');
//login routes
    $this->get('/auth/signin','AuthController:getSignIn')->setName('auth.signin');
    $this->post('/auth/signin','AuthController:postSignIn');
})->add(new \App\Middleware\GuestMiddleware($container));


$app->group('', function (){
    $this->get('/auth/signout', 'AuthController:getsignout')->setName('auth.signout');

    $this->get('/auth/password/change', 'PasswordController:getChangePassword')->setName('auth.password.change');
    $this->post('/auth/password/change', 'PasswordController:postChangePassword');

    $this->get('/edit','EditController:getEdit')->setName('edit');
    $this->get('/edit/{id}','EditController:getEditId');
    $this->post('/add','EditController:postAddClass')->setName('addClass');
    $this->post('/del','EditController:postDelClass')->setName('delClass');
    $this->post('/update/','EditController:updateClass')->setName('update');

})->add(new \App\Middleware\AuthMiddleware($container));