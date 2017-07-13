<?php

/**
 * Created by PhpStorm.
 * User: zawisza
 * Date: 06.07.2017
 * Time: 07:43
 */
namespace App\Controllers\Auth;

use App\Controllers\Controller;

use App\Models\User;
use Respect\Validation\Validator as v;
class AuthController extends Controller
{

    public function getSignOut($request, $response){

        unset($_SESSION['user']);
        return $response->withRedirect($this->router->pathFor('home'));

    }

    public function getSignIn($request, $response){
        return $this->view->render($response, 'auth/signin.twig');
    }

    public function postSignIn($request, $response){
        $validation = $this->validator->validate($request, [
            'email' => v::noWhitespace()->notEmpty()->email(),

            'password' =>  v::noWhitespace()->notEmpty(),
        ]);
        if($validation->failed()){
            $this->flash->addMessage('error','Wrong');
            return $response->withRedirect($this->router->pathFor('auth.signin'));
        }

        $auth = $this->auth->attempt($request->getParam('email'), $request->getParam('password'));
        if(!$auth){
            $this->flash->addMessage('error','Bad date');
            return $response->withRedirect($this->router->pathFor('auth.signin'));
        }
        $this->flash->addMessage('info','Your Sign In');
        return $response->withRedirect($this->router->pathFor('home'));
    }


    public function getSignUp($request, $response){


        return $this->view->render($response, 'auth/signup.twig');
    }

    public function postSignUp($request, $response){




        $validation = $this->validator->validate($request, [
            'email' => v::noWhitespace()->notEmpty()->email()->EmailAvailable(),
            'name' =>  v::noWhitespace()->notEmpty()->alpha()->digits(),
            'password' =>  v::noWhitespace()->notEmpty(),
        ]);
        if($validation->failed()){
            $this->flash->addMessage('error','Wrong');
            return $response->withRedirect($this->router->pathFor('auth.signup'));
        }

        User::create([
            'email'=> $request->getParam('email'),
            'name'=> $request->getParam('name'),
            'password'=> password_hash($request->getParam('password') , PASSWORD_DEFAULT),
        ]);
         $this->auth->attempt($request->getParam('email'), $request->getParam('password'));
        $this->flash->addMessage('info','Your Sign Up');
        return $response->withRedirect($this->router->pathFor('home'));
    }
}