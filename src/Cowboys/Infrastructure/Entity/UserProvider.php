<?php

namespace Cowboys\Infrastructure\Entity;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Interface for user provider
 *
 * @author gbprod <contact@gb-prod.fr>
 */
interface UserProvider extends UserProviderInterface
{
    /**
     * Save the user
     *
     * @param UserInterface $user
     *
     * @return void
     */
    public function add(UserInterface $user);
}