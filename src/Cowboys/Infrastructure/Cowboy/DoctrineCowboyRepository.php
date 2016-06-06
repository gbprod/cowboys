<?php

namespace Cowboys\Infrastructure\Cowboy;

use Cowboys\CoreDomain\Cowboy\Cowboy;
use Cowboys\CoreDomain\Cowboy\CowboyIdentifier;
use Cowboys\CoreDomain\Cowboy\CowboyRepository;
use Doctrine\ORM\EntityManager;

/**
 * Repository for Cowboys
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class DoctrineCowboyRepository implements CowboyRepository
{
    /**
     * @var EntityManager $em
     */
    private $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * {@inheritdoc}
     */
    public function add(Cowboy $cowboy)
    {
        $this->em->persist($cowboy);
        $this->em->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function find(CowboyIdentifier $id)
    {

    }
}
