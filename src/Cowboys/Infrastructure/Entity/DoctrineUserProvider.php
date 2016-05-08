<?php

namespace Cowboys\Infrastructure\Entity;

use Cowboys\AppBundle\Entity\UserProvider;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User provider for doctrine
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class DoctrineUserProvider implements UserProvider
{
    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function loadUserByUsername($username)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function refreshUser(UserInterface $user)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function supportsClass($class)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function save(UserInterface $user)
    {

    }
}