<?php

namespace App\Models;



class GetClass extends Model {

    public function getZawodowa(){
$date =  $this->container->db->table('class_list')->where('type','szkola_zawodowa')->get();

        return $date;
    }

    public function getTechnikum(){
        $date =  $this->container->db->table('class_list')->where('type','technikum')->get();


        return $date;
    }

    public function getLiceum(){
        $date =  $this->container->db->table('class_list')->where('type','liceum')->get();


        return $date;
    }







}