<?php
namespace Szyman\Exception;

/**
 * A generic exception class that creates an error message from its arguments.
 *
 */
class Exception extends \Exception
{
    use MessageBuilder;

    /**
     * Constructs a new Exception.
     * @param mixed 	$message
     */
    public function __construct($message)
    {
        $result = $this->prepareMessage(func_get_args());
        parent::__construct($result->message, $result->errorCode, $result->previousException);
    }
}
