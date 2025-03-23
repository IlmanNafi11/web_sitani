<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneRules implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        if (!is_string($value)) {
            $fail(":attribute harus berupa string");
        }

        if (!ctype_digit($value)) {
            $fail(":attribute harus berupa angka");
        }

        if (strlen($value) < 11 || strlen($value) > 12) {
            $fail(":attribute wajib terdiri dari 11-12 karakter");
        }

        if (!str_starts_with($value, '08')) {
            $fail(":attribute wajib dimulai dengan 08xxx");
        }
    }
}
