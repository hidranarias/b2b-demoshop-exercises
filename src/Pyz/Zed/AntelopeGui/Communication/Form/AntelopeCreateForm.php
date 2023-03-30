<?php

namespace Pyz\Zed\AntelopeGui\Communication\Form;

use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class AntelopeCreateForm extends AbstractType
{
    public const FIELD_NAME = 'name';
    public const FIELD_COLOR = 'color';

    public function getBlockPrefix(): string
    {
        return 'antelope';
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addNameField($builder);
    }

    protected function addNameField(FormBuilderInterface $builder): void
    {
        $builder->add(static::FIELD_NAME, TextType::class, [
            'label' => 'Name',
            'constraints' => [
                $this->createNotBlankConstraint(),
            ],
        ]);
    }

    // TODO-1: Create a method to add a field to provide a color for the antelope
    // Hint-1: Do not forget to call it in the `buildForm()`-method

    protected function createNotBlankConstraint(): NotBlank
    {
        return new NotBlank();
    }
}
