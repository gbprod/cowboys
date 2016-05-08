<?php

namespace Tests\Cowboys\AppBundle\Command;

use Cowboys\AppBundle\Command\RegisterCommand;

/**
 * Tests for RegisterCommand
 * 
 * @author gbprod <contact@gb-prod.fr>
 */
class RegisterCommandTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $this->assertInstanceOf(
            RegisterCommand::class,
            new RegisterCommand()
        );
    }
}