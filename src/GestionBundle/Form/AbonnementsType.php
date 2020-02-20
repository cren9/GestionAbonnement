<?php

namespace GestionBundle\Form;
//namespace GestionBundle\Entity\Abonnements;
use GestionBundle\Entity\Abonnements;
use GestionBundle\Entity\Repas;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class AbonnementsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('options')
                ->add('type',EntityType::class,array(
                'class'=>'GestionBundle:Repas',
                    'choice_label'=>'type',
                        'expanded'=>true,
                        'multiple'=>false,
                     )

                )
                ->add('prix')
                ->add('nbMois')
                ->add('Ajouter un abonnement',SubmitType::class);

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\Abonnements'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionbundle_abonnements';
    }


}
