<?php

namespace Tests\Cowboys\Infrastructure\Entity;

use Cowboys\Infrastructure\Entity\User;

/**
 * Tests for User
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruction()
    {
        $user = User::register('username', 'password');

        $this->assertEquals('username', $user->getUsername());
        $this->assertEquals('password', $user->getPassword());
    }

    public function testSerialize()
    {
        $user = User::register('username', 'password');

        $this->assertEquals(
            'a:2:{i:0;s:8:"username";i:1;s:8:"password";}',
            $user->serialize()
        );

    }

    public function testUnserialize()
    {
        $user = new User();

        $user->unserialize('a:2:{i:0;s:8:"username";i:1;s:8:"password";}');

        $this->assertEquals('username', $user->getUsername());
        $this->assertEquals('password', $user->getPassword());
    }
}