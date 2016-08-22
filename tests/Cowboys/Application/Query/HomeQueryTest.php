<?php

namespace Tests\Cowboys\Application\Query;
use Cowboys\Application\Query\HomeQuery;
use Cowboys\Application\Response\Response;
use Cowboys\Application\Response\HomeResponse;

/**
 * Tests for home query
 *
 * @author gb-prod <contact@gb-prod.fr>
 */
class HomeQueryTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruction()
    {
        $query = new HomeQuery();

        $this->assertInstanceOf(HomeQuery::class, $query);
    }

    public function testAccept()
    {
        $query = new HomeQuery();

        $this->assertTrue(
            $query->accept(new HomeResponse())
        );

        $this->assertFalse(
            $query->accept($this->getMock(Response::class))
        );
    }
}
