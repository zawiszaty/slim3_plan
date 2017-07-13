<?php
/**
 * Created by PhpStorm.
 * User: zawisza
 * Date: 06.07.2017
 * Time: 19:48
 */

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\NestedValidationException;
class MatchesPasswordException extends NestedValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'wrong current password'
        ],
    ];
}