<?php

namespace Tests\Cowboys\Infrastructure\DependencyInjection;

use Cowboys\Application\Handler\RegisterHandler;
use Cowboys\Infrastructure\DependencyInjection\InfrastructureExtension;
use Cowboys\Infrastructure\Entity\DoctrineUserProvider;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Tests for InfrastructureExtension
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class InfrastructureExtensionTest extends \PHPUnit_Framework_TestCase
{
    private $extension;
    private $container;

    protected function setUp()
    {
        $this->extension = new InfrastructureExtension();

        $this->container = new ContainerBuilder();
        $this->container->registerExtension($this->extension);

        $this->container->set(
            'security.password_encoder',
            $this->getMock(UserPasswordEncoderInterface::class)
        );

        $this->container->set(
            'doctrine.orm.entity_manager',
            $this->getMock(EntityManagerInterface::class)
        );

        $this->container->loadFromExtension($this->extension->getAlias());
        $this->container->compile();
    }

    /**
     * @dataProvider getServices
     */
    public function testLoadServices($service, $classname)
    {
        $this->assertTrue($this->container->has($service));

        $this->assertInstanceOf(
            $classname,
            $this->container->get($service)
        );
    }

    public function getServices()
    {
        return [
            ['cowboys_app.register_handler', RegisterHandler::class],
            ['cowboys_infrastructure.user_provider', DoctrineUserProvider::class],
        ];
    }
}