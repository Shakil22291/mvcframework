<?php

namespace App\Core\Exceptions;

use App\Core\Application;
use Exception;

class NotFoundException extends Exception
{
    protected $message = "Not Found";
    protected $code = 404;
}