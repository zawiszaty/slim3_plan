<?php
/**
 * Created by PhpStorm.
 * User: zawisza
 * Date: 06.07.2017
 * Time: 12:09
 */

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\NestedValidationException;

class EmailAvailableException extends NestedValidationException
{
public static $defaultTemplates = [
    self::MODE_DEFAULT => [
self::STANDARD => 'email is allredy taken'
    ],
];
}