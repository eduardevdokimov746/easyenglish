<?php

namespace App\Containers\User\Exceptions;

use Throwable;

class OldPasswordNotValidException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = __('user::validation.old_password_not_valid');
    }
}
