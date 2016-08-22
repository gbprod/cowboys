<?php

namespace Tests\Cowboys\Application\Response;

use Cowboys\Application\Response\HomeResponse;

/**
 * Tests for HomeResponse
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class HomeResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruction()
    {
        $event = new HomeResponse();

        $this->assertInstanceOf(HomeResponse::class, $event);
    }
}
