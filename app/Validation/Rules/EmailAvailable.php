<?php
/**
 * Created by PhpStorm.
 * User: zawisza
 * Date: 06.07.2017
 * Time: 12:02
 */

namespace App\Validation\Rules;


use App\Models\User;
use Respect\Validation\Rules\AbstractRule ;
class EmailAvailable extends AbstractRule
{
    public function validate($input)
    {
        return User::where('email', $input)->count() === 0;
    }

}