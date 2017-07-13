<?php

namespace App\Update;
use Illuminate\Database\Capsule\Manager as Capsule;

class UpdateClass{
    public function update($class,$id,array $date)
    {




        Capsule::table($class) ->where('id', $id)->update([
'godzina'=>$date['godzina'],
'poniedzialek'=>$date['poniedzialek'],
'sala_p'=>$date['sala_p'],
'wtorek'=>$date['wtorek'],
'sala_w'=>$date['sala_w'],
'sroda'=>$date['sroda'],
'sala_s'=>$date['sala_s'],
'czwartek'=>$date['czwartek'],
'sala_cz'=>$date['sala_cz'],
'piatek'=>$date['piatek'],
'sala_pi'=>$date['sala_pi'],
        ]);
    }
}