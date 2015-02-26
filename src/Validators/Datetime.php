<?php
namespace FormManager\Validators;

use FormManager\InputInterface;
use FormManager\InvalidValueException;

class Datetime
{
    public static $error_message = 'This value is not a valid datetime';

    protected static $format = 'Y-m-d\TH:i:sP';

    /**
     * Validates the input value according to this attribute.
     *
     * @param InputInterface $input The input to validate
     * 
     * @throws InvalidValueException If the value is not valid
     */
    public static function validate(InputInterface $input)
    {
        $value = $input->val();

        if ($value) {
            if (!($date = date_create($value))) {
                throw new InvalidValueException(sprintf(static::$error_message, $value));
            }

            $input->val($date->format(static::$format));
        }
    }
}