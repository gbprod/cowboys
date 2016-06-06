<?php

namespace Cowboys\CoreDomain\Cowboy;

/**
 * Repository for Cowboys
 *
 * @author gbprod <contact@gb-prod.fr>
 */
interface CowboyRepository
{
    /**
     * Add a cowboy to the repository
     *
     * @param Cowboy $cowboy
     *
     * @return void
     */
    public function add(Cowboy $cowboy);

    /**
     * Find a cowboy by his id
     *
     * @param CowboyIdentifier $id
     *
     * @return Cowboy|null
     */
    public function find(CowboyIdentifier $id);
}
