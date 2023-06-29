<?php

namespace App\Factory;

class CodeGenerator
{
    public int $randomStringLength = 6  ;
    public string $outputString;
    private int $iterationLimit = 6;

    public function generate(): string
    {
        $iterations = 0;
        $length = $this->randomStringLength;

        // Generate a valid coupon until all validation passes
        while ($this->validate() === false) {

            // Recovery scenario - break from the loop if exceeded max. iterations
            if ($iterations >= $this->iterationLimit) {
                break;
            }

            // Churn / Generates the random string
            $this->churn($length);

            if ($this->validate() === true) {
                break;
            }
            // Incrementing the iteration count
            $iterations++;
        }

        return $this->outputString;
    }

    /**
     * Generates a string using random_bytes,
     * converts into hex using bin2hex and returns all uppercase string
     *
     * @param $length
     * @return void
     * @throws \Exception
     */
    public function churn($length): void
    {
        // Need to substr as the output hex string of a bin random string
        // http://php.net/manual/en/function.random-bytes.php
        $this->outputString = substr(strtoupper(bin2hex(random_bytes($length))), 0, $length);
    }

    /**
     * Validates if the string contains characters which are
     * only allowed and does not contain characters which are
     * not allowed
     *
     * @return Boolean
     */
    public function validate(): bool
    {
        if (empty($this->outputString)) {
            return false;
        }

        if (ctype_alpha($this->outputString)) {
            return true;
        }
        if (ctype_digit($this->outputString)) {
            return false;
        }
        if (
            !str_contains($this->outputString, 'I') &&
            !str_contains($this->outputString, 'O') &&
            !str_contains($this->outputString, '0')
        ) {
            return true;
        }

        return false;
    }

    public function __destruct()
    {
        unset($this->outputString);
    }
}
