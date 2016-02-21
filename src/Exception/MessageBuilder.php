<?php
namespace Szyman\Exception;

/**
 * A trait for exceptions helping in assembling error messages from passed arguments.
 */
trait MessageBuilder
{
	/** @var array */
	protected $arguments	= array();
	/** @var string */
	protected $rawMessage;

	/**
	 * @param array $arguments
	 * @return \stdClass	Returns an object that can be passed to @see \Exception::__construct, with the following
	 *                   properties:
	 *                   - message: the error message constructed from the arguments;
	 *                   - errorCode: an error code specified in the arguments, if any;
	 *                   - previousException: an exception specified in the arguments, if any.
	 */
	protected function prepareMessage(array $arguments)
	{
		$resultObject = new \stdClass();
		$resultObject->errorCode = null;
		$resultObject->message = null;
		$resultObject->previousException = null;

		if (count($arguments) > 0)
		{
			if (is_string($arguments[0]))
			{
				$this->rawMessage = array_shift($arguments);
			}
			else if (is_array($arguments[0]))
			{
				$this->arguments  = array_shift($arguments);
				$this->rawMessage = array_shift($this->arguments);
			}
			else if (is_object($arguments[0]) && $arguments[0] instanceof \Exception)
			{
				$resultObject->previousException = $arguments[0];
				$resultObject->message = $resultObject->previousException->getMessage();
			}

			foreach ($arguments as $arg)
			{
				if (is_object($arg) && $arg instanceof \Exception)
				{
					$resultObject->previousException = $arg;
				}
				else if (is_object($arg) && $arg instanceof ErrorCode)
				{
					$resultObject->errorCode = $arg->getCode();
				}
				else
				{
					$this->arguments[] = $arg;
				}
			}
		}

		if (is_null($resultObject->message))
		{
			$resultObject->message = StringArgumentFormatter::format($this->rawMessage, $this->arguments);
		}

		return $resultObject;
	}

	/**
	 * Returns the raw message passed to this exception.
	 * @return string
	 */
	public function getRawMessage()
	{
		return $this->rawMessage;
	}

	/**
	 * Returns the arguments to the raw message passed to this exception.
	 * @return array
	 */
	public function getMessageArguments()
	{
		return $this->arguments;
	}
}