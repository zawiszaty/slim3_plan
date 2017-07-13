<?php
/**
 * Created by PhpStorm.
 * User: zawisza
 * Date: 06.07.2017
 * Time: 15:18
 */

namespace App\Add;




use App\Models\classList;

class AddClass
{
  public function add($name,$type){

      $classList = new classList();

      $classList->name = $name;
      $classList->type = $type;

      $classList->save();
  }

}