<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
#[\Attribute] class FizzBuzzQuantities extends Constraint
{
    public string $message = 'El valor máximo debe ser mayor que el valor mínimo.';

    public function getTargets(): array|string
    {
        return self::CLASS_CONSTRAINT;
    }
}
