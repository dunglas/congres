<?php

namespace AppBundle\Entity\Event;

use Doctrine\ORM\EntityRepository;

/**
 * EventMealRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EventMealRepository extends EntityRepository
{
    protected $classname = 'AppBundle\Entity\Event\EventMeal';

    public function findByEventQueryBuider(Event $event)
    {
        return $this->createQueryBuilder('em')
            ->where('em.event = :event')
            ->setParameter('event', $event->getId())
            ;
    }
}
