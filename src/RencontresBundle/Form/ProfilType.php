<?php

namespace RencontresBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Range;

class ProfilType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('taille', IntegerType::class, array(
                'data' => '165',
                'scale' => 0))
            ->add('poids')
            ->add('cheveux', ChoiceType::class, array(
                'choices' => array(
                    'Bruns' => 'Bruns',
                    'Blonds' => 'Blonds',
                    'Châtains' => 'Châtains',
                    'Roux' => 'Roux'
                ),
            ))
            ->add('yeux', ChoiceType::class, array(
                'choices' => array(
                    'Verts' => 'Verts',
                    'Bleus' => 'Bleus',
                    'Marrons' => 'Marrons',
                    'Noirs' => 'Noirs'
                ),
            ))
            ->add('ville')
            ->add('description')
            ->add('passions')
            ->add('submit', SubmitType::class, ["label" => "Enregistrer les modifications"]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RencontresBundle\Entity\Profil'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'rencontresbundle_profil';
    }


}
