<?php

namespace Tests\Cowboys\UI\DependencyInjection;

use Cowboys\UI\Controller\HomepageController;
use Cowboys\UI\DependencyInjection\UIExtension;
use SimpleBus\Message\Bus\MessageBus;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Tests for UIExtension
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class UIExtensionTest extends \PHPUnit_Framework_TestCase
{
    private $extension;
    private $container;

    protected function setUp()
    {
        $this->extension = new UIExtension();

        $this->container = new ContainerBuilder();
        $this->container->registerExtension($this->extension);

        $this->container->set('templating', $this->getMock(EngineInterface::class));
        $this->container->set('command_bus', $this->getMock(MessageBus::class, [], [[]]));
        $this->container->set('router', $this->getMock(UrlGeneratorInterface::class));

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
            ['cowboys_ui.homepage_controller', HomepageController::class]
        ];
    }

}