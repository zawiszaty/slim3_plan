<?php

/**
 * Created by PhpStorm.
 * User: zawisza
 * Date: 06.07.2017
 * Time: 07:43
 */
namespace App\Controllers\Auth;

use App\Controllers\Controller;


use App\Middleware\PlanMiddleware;

use App\Models\Plan;
use Respect\Validation\Validator as v;

class EditController extends Controller
{
    protected $data;

    public function getEdit($request, $response){
        return $this->view->render($response, 'auth/edit/edit.twig');


    }

//
//    public function postEdit($request, $response){
//        $users =$this->db->select('* from users');
//
//        foreach ($users as $user) {
//            echo $user->name;
//        }
//
//
//
//
//
//
//
//        $this->flash->addMessage('info' , 'Plan changed');
//        return $response->withRedirect($this->router->pathFor('edit'));
//
//
//
//    }
public function getEditId($request, $response){

        $id = $request->getAttribute('id');

$_SESSION['id'] = $id;
    $data =  $this->GetSingleClass->getClass($id);

    return $this->view->render($response, 'auth/edit/editClass.twig', [
        'singleClass' => $data
    ]);





}
    public function updateClass($request, $response)
    {

for($i=0;$i<=8;$i++){

    $data['godzina']= $request->getParam('godzina'.$i);
    $data['poniedzialek']= $request->getParam('poniedzialek'.$i);
    $data['sala_p']= $request->getParam('sala_p'.$i);
    $data['wtorek']= $request->getParam('wtorek'.$i);
    $data['sala_w']= $request->getParam('sala_w'.$i);
    $data['sroda']= $request->getParam('sroda'.$i);
    $data['sala_s']= $request->getParam('sala_s'.$i);
    $data['czwartek']= $request->getParam('czwartek'.$i);
    $data['sala_cz']= $request->getParam('sala_cz'.$i);
    $data['piatek']= $request->getParam('piatek'.$i);
    $data['sala_pi']= $request->getParam('sala_pi'.$i);
$this->UpdateClass->update($_SESSION['id'],$i,$data);
}
        $this->flash->addMessage('info','update');
        return $response->withRedirect($this->router->pathFor('edit'));
    }


    public function postAddClass($request, $response){

        $validation = $this->validator->validate($request, [
            'newClass' => v::notEmpty()->alpha()->digits(),
            'selectAdd' =>  v::noWhitespace()->notEmpty(),

        ]);

        if($validation->failed()){
            $this->flash->addMessage('error','Wrong');
            return $response->withRedirect($this->router->pathFor('edit'));
        }

    $newClass= $request->getParam('newClass');
    $type = $request->getParam('selectAdd');
    $newClass = str_replace(' ','_',$newClass);


$this->AddClass->add($newClass, $type);
        $this->CreateTable->create($newClass);

        $this->flash->addMessage('info','Klasa dodana');
        return $response->withRedirect($this->router->pathFor('edit'));




    }
    public function postDelClass($request, $response){




        $delClass =  $request->getParam('selectDel');

        $this->DelClass->del($delClass);
        $this->DelTable->drop($delClass);

        $this->flash->addMessage('info','Klasa usunieta');
        return $response->withRedirect($this->router->pathFor('edit'));



    }

}