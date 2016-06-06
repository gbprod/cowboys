<?php

namespace Tests\Cowboys\AppBundle\DependencyInjection;

use Cowboys\AppBundle\Controller\HomepageController;
use Cowboys\AppBundle\DependencyInjection\AppExtension;
use Cowboys\AppBundle\Handler\RegisterHandler;
use Cowboys\Infrastructure\Entity\DoctrineUserProvider;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Tests for AppExtension
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class AppExtensionTest extends \PHPUnit_Framework_TestCase
{
    private $extension;
    private $container;

    protected function setUp()
    {
        $this->extension = new AppExtension();

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