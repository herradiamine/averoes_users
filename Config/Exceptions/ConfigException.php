<?php

declare(strict_types=1);

namespace Config\Exceptions;

use Exception;
use Throwable;

/**
 * Class ConfigException
 * @package Config\Exceptions
 * @codeCoverageIgnore
 */
class ConfigException extends Exception
{
    private const DEFAULT_MESSAGE = "It seems that your configuration contains errors";

    /**
     * Construct the exception. Note: The message is NOT binary safe.
     * @link https://php.net/manual/en/exception.construct.php
     * @param string $method [required] The method name to be added to the Exception message
     * @param string $message [optional] The Exception message to throw.
     * @param int $code [optional] The Exception code.
     * @param Throwable $previous [optional] The previous throwable used for the exception chaining.
     */
    public function __construct($method, $message = self::DEFAULT_MESSAGE, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = "$method : $message";
    }
}
