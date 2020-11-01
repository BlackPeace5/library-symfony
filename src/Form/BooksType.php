<?php

namespace App\Form;

use App\Entity\Books;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BooksType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label' => 'Название книги',
                'attr' => [
                    'placeholder' => 'Война и мир'
                ]
            ))

            ->add('author', TextType::class, array(
                'label' => 'Автор произведения',
                'attr' => [
                    'placeholder' => 'Лев Толстой'
                ]
            ))
            ->add('year',DateType::class, array(
                'label' => 'Год',
                'years' => $this->getYears(1700)

            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Сохранить',
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ))
        ;
    }

    private function getYears($min, $max='current') : array
    {
        $years = range($min, ($max === 'current' ? date('Y-m-d') : $max));

        return array_combine($years, $years);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Books::class,
        ]);
    }
}
