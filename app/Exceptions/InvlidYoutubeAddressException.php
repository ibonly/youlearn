<?php

namespace YouLearn\Exceptions;

use Exception;

class InvlidYoutubeAddressException extends Exception
{
    public function __construct ()
    {
        parent::__construct("Invalid Youtube URL");
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