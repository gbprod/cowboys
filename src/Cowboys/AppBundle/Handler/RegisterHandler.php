<?php

namespace Cowboys\AppBundle\Handler;

use Cowboys\AppBundle\Command\RegisterCommand;
use Cowboys\AppBundle\Entity\UserProvider;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Handler for register
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class RegisterHandler
{
    /**
     * @var UserProvider
     */
    private $provider;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * @param UserProvider                 $provider
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(
        UserProvider $provider,
        UserPasswordEncoderInterface $encoder
    ) {
        $this->provider = $provider;
        $this->encoder  = $encoder;
    }

    /**
     * Handle register command
     *
     * @param RegisterCommand $command
     */
    public function handle(RegisterCommand $command)
    {

    }
}