<?php

namespace Cowboys\Application\Query;
use Cowboys\Application\Response\Response;
use Cowboys\Application\Response\HomeResponse;

/**
 * Query for homepage
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class HomeQuery extends Query
{
    /**
     * {inheritdoc}
     */
    public function accept(Response $response)
    {
        return $response instanceof HomeResponse;
    }
}
