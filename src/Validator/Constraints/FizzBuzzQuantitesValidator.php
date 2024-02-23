<?php

namespace App\Validator\Constraints;

use App\Entity\FizzBuzz;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class FizzBuzzQuantitesValidator extends ConstraintValidator
{
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$value instanceof FizzBuzz) {
            throw new UnexpectedTypeException($value, FizzBuzz::class);
        }

        if ($value->getMax() <= $value->getMin()) {
            $this->context->buildViolation($constraint->message)
                ->addViolation()
            ;
        }
    }
}
