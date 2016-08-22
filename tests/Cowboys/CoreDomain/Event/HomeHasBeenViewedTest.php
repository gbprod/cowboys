<?php

namespace Tests\Cowboys\CoreDomain\Event;

use Cowboys\CoreDomain\Event\HomeHasBeenViewed;

/**
 * Tests for HomeHasBeenViewed
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class HomeHasBeenViewedTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruction()
    {
        $event = new HomeHasBeenViewed();

        $this->assertInstanceOf(HomeHasBeenViewed::class, $event);
    }
}
