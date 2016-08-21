<?php

namespace Tests\Cowboys\UI\Controller;

use Cowboys\UI\Controller\HomepageController;
use SimpleBus\Message\Bus\MessageBus;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Tests for HomepageController
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class HomepageControllerTest extends \PHPUnit_Framework_TestCase
{
    private $templating;

    private $bus;

    private $controller;

    public function setUp()
    {
        $this->templating = $this->prophesize(EngineInterface::class);
        $this->bus = $this->prophesize(MessageBus::class);

        $this->controller = new HomepageController(
            $this->templating->reveal(),
            $this->bus->reveal()
        );
    }

    public function testRenderHomepage()
    {
        $expectedResponse = $this->prophesize(Response::class);

        $this->templating
            ->renderResponse('UIBundle:page:home.html.twig')
            ->willReturn($expectedResponse->reveal())
            ->shouldBeCalled()
        ;

        $response = $this->controller->home();

        $this->assertEquals($expectedResponse->reveal(), $response);
    }
}