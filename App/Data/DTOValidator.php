<?php


namespace App\Data;


class DTOValidator
{
    /**
     * @param $min
     * @param $max
     * @param $value
     * @param $fieldName
     * @throws \Exception
     */
    public static function validateLength($min, $max, $value, $fieldName)
    {
        if (mb_strlen($value) < $min || mb_strlen($value) > $max) {
            if ($fieldName === "ISBN") {
                throw new \Exception("{$fieldName} must be {$min} characters!");
            }
            throw new \Exception("{$fieldName} must be between {$min} and {$max} characters!");
        }
    }

    public static function validate($regex, $value, $fieldName)
    {
        if (!preg_match($regex, $value)) {
            $errorMsg = "Invalid {$fieldName}!";
            if ($fieldName === "first name" || $fieldName === "last name") {
                $errorMsg .= " Must contain only letters.";
            } else if ($fieldName === "ISBN") {
                $errorMsg .= " The {$fieldName} must contains only \"-\" and digits! \\\\ example: 978-3-16-148410-0";
            }
            throw new \Exception($errorMsg);
        }
    }

    //$re = '/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i';
    //if (preg_match('/[A-Z]+[a-z]+[0-9]+/', $username))
    //{
    //    echo 'Secure enough';
    //}
}