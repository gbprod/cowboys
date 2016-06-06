<?php

namespace Cowboys\AppBundle\Handler;

use Cowboys\AppBundle\Command\RegisterCommand;
use Cowboys\AppBundle\Entity\User;
use Cowboys\AppBundle\Entity\UserProvider;
use Cowboys\CoreDomain\Cowboy\Cowboy;
use Cowboys\CoreDomain\Cowboy\CowboyRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Handler for register
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class RegisterHandler
{
    /**
     * @var CowboyRepository
     */
    private $repository;

    /**
     * @param CowboyRepository $repository
     */
    public function __construct(CowboyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle register command
     *
     * @param RegisterCommand $command
     */
    public function handle(RegisterCommand $command)
    {
        $cowboy = Cowboy::register($command->name);

        $this->repository->add($cowboy);
    }
}
