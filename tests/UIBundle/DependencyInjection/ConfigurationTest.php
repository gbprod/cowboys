<?php

namespace Tests\Cowboys\UIBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Cowboys\UIBundle\DependencyInjection\Configuration;

/**
 * Tests for Configuration
 * 
 * @author gbprod <contact@gb-prod.fr>
 */
class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    public function testGetConfigTreeBuilder()
    {
        $configuration = new Configuration();
        
        $tree = $configuration->getConfigTreeBuilder();
        
        $this->assertInstanceOf(
            TreeBuilder::class,
            $tree
        );
        
        $this->assertEquals(
            'cowboys_ui',
            $tree->buildTree()->getName()
        );
    }
}