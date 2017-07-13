<?php
/**
 * Created by PhpStorm.
 * User: zawisza
 * Date: 06.07.2017
 * Time: 15:18
 */

namespace App\Del;




use App\Models\classList;

class DelClass{


    public function del($name){

        $classList = new classList();

        $classList->where('name', $name)->delete();
    }

}