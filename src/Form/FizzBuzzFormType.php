<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class FizzBuzzFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('min', IntegerType::class, [
                'attr' => [
                    'placeholder' => 'Mínimo',
                ],
                'row_attr' => [
                    'class' => 'form-floating',
                ],
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                    new GreaterThan(0),
                ],
            ])
            ->add('max', IntegerType::class, [
                'attr' => [
                    'placeholder' => 'Máximo',
                ],
                'row_attr' => [
                    'class' => 'form-floating',
                ],
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                    new GreaterThan(0),
                    new Callback([$this, 'validateMaxGreaterThanMin']),
                ],
            ])
        ;
    }

    public function validateMaxGreaterThanMin($value, ExecutionContextInterface $context): void
    {
        $formData = $context->getRoot()->getData();

        $min = $formData['min'];
        $max = $formData['max'];

        if ($max <= $min) {
            $context->buildViolation('El valor máximo debe ser mayor que el valor mínimo.')
                ->addViolation();
        }
    }
}
