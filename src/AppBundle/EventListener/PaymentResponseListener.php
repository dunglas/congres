<?php

namespace AppBundle\EventListener;

use Lexik\Bundle\PayboxBundle\Event\PayboxResponseEvent;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Payment\Payment;

class PaymentResponseListener
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function onPaymentIpnResponse(PayboxResponseEvent $event)
    {

        if ($event->isVerified()) {
            $data = $event->getData();
            $ref = explode('-', $data['Ref']);
            $payment_id = $ref[count($ref) - 1];

            $payment = $this->em->getRepository('AppBundle:Payment\Payment')->findOneById($payment_id);
            $payment->setPaymentIPN($data);

            if ($data['Erreur'] == 0000) {
                $payment->setStatus(Payment::STATUS_BANKED);
            } else {
                $payment->setStatus(Payment::STATUS_REFUSED);
            }
            $this->em->persist($payment);
            $this->em->flush();
        }

    }
}
