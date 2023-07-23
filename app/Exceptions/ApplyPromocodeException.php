<?php

namespace App\Exceptions;

use Exception;

class ApplyPromocodeException extends Exception
{
    public static function because(string $reason)
    {
        return new ApplyPromocodeException($reason);
    }
}
