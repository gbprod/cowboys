<?php

namespace Cowboys\CoreDomain\Cowboy;

use URLify;

/**
 * Cowboy identifier
 *
 * @author gbprod <contact@gb-prod.fr>
 */
final class CowboyIdentifier
{
    /**
     * @var string
     */
    private $value;

    /**
     * Generate a cowboy identifier from his name
     *
     * @param string $name
     *
     * @return self
     */
    public static function fromName($name)
    {
        return new self(
            URLify::filter($name)
        );
    }

    /**
     * @param string $value
     */
    private function __construct($value)
    {
        $this->value = $value;
    }
}
