<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Http;

class ReCaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $response = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify",[
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $value,
            "Content-Type", "application/x-www-form-urlencoded; charset=utf-8"
        ]);

    
  
        if (!($response->json()["success"] ?? false)) {
              $fail('The google recaptcha is required.');
        }
    }
}
