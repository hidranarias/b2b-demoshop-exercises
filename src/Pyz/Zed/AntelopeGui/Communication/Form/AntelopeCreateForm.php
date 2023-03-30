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
        $this->addColorField($builder);
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

    protected function addColorField(FormBuilderInterface $builder): void
    {
        $builder->add(static::FIELD_COLOR, TextType::class, [
            'label' => 'Color',
            'constraints' => [
                $this->createNotBlankConstraint(),
            ],
        ]);
    }

    protected function createNotBlankConstraint(): NotBlank
    {
        return new NotBlank();
    }
}
