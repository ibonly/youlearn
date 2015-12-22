<?php

namespace YouLearn\Exceptions;

use Exception;

class EmptyFieldException extends Exception
{
    public function __construct ()
    {
        parent::__construct("Input field is empty");
    }

    /**
     * Get the error message
     *
     * @return string
     */
    public function errorMessage ()
    {
        return $this->getMessage();
    }
}