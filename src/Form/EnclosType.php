<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Chaton;
use App\Entity\Enclos;
use App\Entity\Espace;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnclosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom')
            ->add('Superficie')
            ->add('maxIndividus')
            ->add('Quarantaine')
            ->add('Id_espace', EntityType::class, [
                'class'=>Espace::class,
                'choice_label'=>"Nom",
                'multiple'=>false,
                'expanded'=>false
            ])
            ->add("ok", SubmitType::class, ["label"=>"OK"])
        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Enclos::class,
        ]);
    }
}
