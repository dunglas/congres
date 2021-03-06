<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class EventMealAdmin extends Admin
{
    protected $baseRouteName = 'event_meal_admin';
    protected $baseRoutePattern = 'event/meal';
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', NULL, array('label' => 'Nom'))
            ->add('description')
            ->add('mealTime',NULL, array('label' => 'Jour/Heure du Repas'))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('name', NULL, array('label' => 'Nom'))
            ->add('description')
            ->add('mealTime', NULL, array('label' => 'Jour/Heure du Repas'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', NULL, array('label' => 'Nom'))
            ->add('description')
            ->add('mealTime', NULL, array('label' => 'Jour/Heure du Repas'))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('name', NULL, array('label' => 'Nom'))
            ->add('description')
            ->add('mealTime', NULL, array('label' => 'Jour/Heure du Repas'))
        ;
    }
}
