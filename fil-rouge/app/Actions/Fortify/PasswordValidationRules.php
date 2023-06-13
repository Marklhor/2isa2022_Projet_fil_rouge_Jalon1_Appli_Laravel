<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    protected function passwordRules(): array
    {
        // TODO est-correct ?
        return [
            'required', 
            'string', 
            (new Password())
                ->requireUppercase()
                ->requireNumeric()
                ->requireSpecialCharacter(), 
            'confirmed', // <- NO
        ];
        // return ['required', 'string', new Password, 'confirmed'];
    }
}
