<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Pet;

class PetStatus implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return in_array($value, [Pet::STATUS_AVAILABLE, Pet::STATUS_PENDING, Pet::STATUS_SOLD]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid Pet Status.';
    }
}
