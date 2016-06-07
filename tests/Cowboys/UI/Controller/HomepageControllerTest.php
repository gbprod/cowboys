<?php

namespace Tests\Cowboys\UI\Controller;

use Cowboys\UI\Controller\HomepageController;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Tests for HomepageController
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class HomepageControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testRenderHomepage()
    {
        $expectedResponse = $this->getMock(Response::class);
        $templating = $this->getMock(EngineInterface::class);

        $controller = new HomepageController($templating);

        $templating
            ->expects($this->once())
            ->method('renderResponse')
            ->with('UIBundle:page:home.html.twig')
            ->willReturn($expectedResponse)
        ;

        $response = $controller->home();

        $this->assertEquals($expectedResponse, $response);
    }
}