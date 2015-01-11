<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class NewCongresContributionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type', 'choice', array(
                'choices' => array('generale' => 'Générale', 'thematique' => 'Thématique'),
                'expanded' => true,
                'mapped' => false,
        ));
        $builder->add('title');
        $builder->add('content');
    }

    public function getName()
    {
        return 'new_congres_contribution';
    }
}
