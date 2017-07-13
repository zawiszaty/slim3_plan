<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class classList extends Model {

    protected $table = 'class_list';

    protected $fillable = [
        'id',
        'name',
        'type',

    ];



}