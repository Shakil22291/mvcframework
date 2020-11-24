<?php

namespace App\Core\Exceptions;

use App\Core\Application;
use Exception;

class ForbiddenException extends Exception
{
    protected $message = "This action is unauthorized";
    protected $code = 403;
}