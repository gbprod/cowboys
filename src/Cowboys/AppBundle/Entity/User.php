<?php

namespace Cowboys\AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Application User
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class User implements UserInterface, \Serializable
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @param string|null $email
     * @param string|null $password
     */
    public function __construct($email = null, $password = null)
    {
        $this->email    = $email;
        $this->password = $password;
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * {@inheritdoc}
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return serialize([
            $this->email,
            $this->password,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        list (
            $this->email,
            $this->password,
        ) = unserialize($serialized);
    }
}