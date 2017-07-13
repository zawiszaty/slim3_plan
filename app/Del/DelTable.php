<?php

namespace App\Del;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
class DelTable{

    public function drop($delClass){

        Capsule::schema()->dropIfExists($delClass);

    }
}