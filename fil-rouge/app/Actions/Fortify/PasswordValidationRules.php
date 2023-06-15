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
        /**
         * Le mot de passe est requis (required).
         * Le mot de passe doit être une chaîne de caractères (string).
         * Le mot de passe doit contenir au moins une lettre majuscule (requireUppercase()).
         * Le mot de passe doit contenir au moins un chiffre (requireNumeric()).
         * Le mot de passe doit contenir au moins un caractère spécial (requireSpecialCharacter()).
         * Le mot de passe doit être confirmé en le saisissant à nouveau (confirmed).
         * Le mot de passe doit avoir une longueur minimale de 8 caractères (min(8)).
         */
        return [
            'required', 
            'string', 
            (new Password())
                ->min(8)
                ->requireUppercase()
                ->requireNumeric()
                ->requireSpecialCharacter(), 
            'confirmed',
        ];
        // return ['required', 'string', new Password, 'confirmed'];
    }
}
