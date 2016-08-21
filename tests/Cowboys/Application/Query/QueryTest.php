<?php

namespace Tests\Cowboys\Application\Query;

use Cowboys\Application\Query\Query;
use Cowboys\Application\Response\Response;

/**
 * Test for Query
 *
 * @author GBProd <contact@gb-prod.fr>
 */
class QueryTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->query = $this->getMockForAbstractClass(Query::class);
    }

    public function testRespond()
    {
        $response = $this->getMock(Response::class);

        $this->setQueryWillAcceptResponse();

        $this->query->respond($response);

        $this->assertEquals($response, $this->query->getResponse());
    }

    protected function setQueryWillAcceptResponse()
    {
        $this->query
            ->expects($this->any())
            ->method('accept')
            ->willReturn(true)
        ;
    }

    public function testResponded()
    {
        $this->assertFalse($this->query->responded());

        $this->setQueryWillAcceptResponse();

        $this->query->respond(
            $this->getMock(Response::class)
        );

        $this->assertTrue($this->query->responded());
    }

    public function testRespondThrowExceptionIfNotAccepted()
    {
        $this->setQueryWillNotAcceptResponse();

        $this->setExpectedException(\InvalidArgumentException::class);

        $this->query->respond(
            $this->getMock(Response::class)
        );
    }

    protected function setQueryWillNotAcceptResponse()
    {
        $this->query
            ->expects($this->any())
            ->method('accept')
            ->willReturn(false)
        ;
    }
}