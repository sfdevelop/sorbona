<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Decimal implements Rule
{
    protected int $integerDigits;

    protected int $fractionDigits;

    public function __construct($integerDigits = 8, $fractionDigits = 2)
    {
        $this->integerDigits = $integerDigits;
        $this->fractionDigits = $fractionDigits;
    }

    public function passes($attribute, $value): bool|int
    {
        $pattern = '/^\d{1,'.$this->integerDigits.'}(?:\.\d{0,'.$this->fractionDigits.'})?$/';

        return preg_match($pattern, $value);
    }

    public function message(): string
    {
        return 'The :attribute must be a decimal number with up to '.$this->integerDigits.' integer digits and '.$this->fractionDigits.' decimal places.';
    }
}
