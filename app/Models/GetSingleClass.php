<?php

namespace App\Models;



class GetSingleClass extends Model {

    public function getClass($id){


    $date = $this->container->db->table($id)->get();


    return $date;




    }







}