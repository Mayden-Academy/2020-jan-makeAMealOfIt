<?php

namespace Mamoi\Validators;

class Validator
{
    /** Method to set/trim url
     *
     *  @param string $formInput
     *  @return string trimmed formInput
     */
    public static function trimFormSearchInput(string $formInput) : string
    {
        return trim($formInput);
    }

    /** Method to remove any non-alphabetic chars
     *
     *  @param string $formInput
     *  @return string sanitised so only string with strictly just alphabetic returned
     */
    public static function sanitiseFormSearchInput(string $formInput) : string
    {
        return preg_replace("/[!-@\[-`\{-\~]/","", $formInput);
    }

    /** Method to remove extra spaces between words
     *
     * @param $formInput
     * @return string
     */
    public static function formatFormSearchInput(string $formInput) : string
    {
        return preg_replace('/\s\s+/', ' ', $formInput);
    }

    /** Method to trim string if over 255 chars and call self methods
     *
     * @param $formInput
     * @return string
     */
    public static function validateString($formInput) {
        if (strlen($formInput) > 255) {
            $formInput = substr($formInput, 0, 254);
        }
        $sanitisedInput = self::sanitiseFormSearchInput($formInput);
        $resultTrimmed = self::trimFormSearchInput($sanitisedInput);
        return self::formatFormSearchInput($resultTrimmed);
    }

}