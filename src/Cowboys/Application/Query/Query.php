<?php

namespace Cowboys\Application\Query;

use Cowboys\Application\Response\Response;

/**
 * Query base class
 *
 * @author gbprod <contact@gb-prod.fr>
 */
abstract class Query
{
    /**
     * @var Response
     */
    protected $response = null;

    /**
     * Respond
     *
     * @param Response $response
     */
    public function respond(Response $response)
    {
        if (!$this->accept($response)) {
            throw new \InvalidArgumentException();
        }

        $this->response = $response;
    }

    /**
     * Accept the response (redefine to filter response type)
     *
     * @param Response $response
     *
     * @return bool
     */
    abstract protected function accept(Response $response);

    /**
     * Get the response
     *
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Does the query is responded
     *
     * @return bool
     */
    public function responded()
    {
        return null !== $this->response;
    }
}
