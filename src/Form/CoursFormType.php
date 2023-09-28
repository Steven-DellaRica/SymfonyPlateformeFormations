<?php

namespace App\Form;

use App\Entity\Cours;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoursFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cours_titre')
            ->add('cours_niveau')
            ->add('cours_temps_estime')
            ->add('cours_image')
            ->add('cours_date')
            ->add('cours_cree')
            ->add('cours_synopsis')
            ->add('langage', EntityType::class, array(
                'class' => 'App\Entity\Langages',
                'choice_label' => 'langage_libelle', 
                'placeholder' => 'Le texte affiché par défaut')
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cours::class,
        ]);
    }
}
