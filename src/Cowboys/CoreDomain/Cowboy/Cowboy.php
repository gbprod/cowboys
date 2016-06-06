<?php

namespace Cowboys\CoreDomain\Cowboy;

use Cowboys\CoreDomain\Cowboy\CowboyIdentifier;

/**
 * Cowboy
 *
 * @author gbprod <contact@gb-prod.fr>
 */
final class Cowboy
{
    /**
     * @var CowboyIdentifier
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * Register a cowboy
     *
     * @param string $name
     */
    public static function register($name)
    {
        return new self(
            CowboyIdentifier::fromName($name),
            $name
        );
    }

    private function __construct(CowboyIdentifier $id, $name)
    {
        if (empty($name)) {
            throw new \InvalidArgumentException();
        }

        $this->id   = $id;
        $this->name = $name;
    }

    /**
     * Get the id of the cowboy
     *
     * @return CowboyIdentifier
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the name of the cowboy
     *
     * @return CowboyIdentifier
     */
    public function getName()
    {
        return $this->name;
    }
}
