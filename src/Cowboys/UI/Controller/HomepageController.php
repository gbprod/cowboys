<?php

namespace Cowboys\UI\Controller;

use SimpleBus\Message\Bus\MessageBus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller for homepage
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class HomepageController extends Controller
{
    /**
     * @var EngineInterface
     */
    private $templating;

    /**
     * @var MessageBus
     */
    private $bus;

    /**
     * @param EngineInterface $templating
     * @param MessageBus      $bus
     */
    public function __construct(EngineInterface $templating, MessageBus $bus)
    {
        $this->templating = $templating;
        $this->bus        = $bus;
    }

    /**
     * homepage
     *
     * @return Response
     */
    public function home()
    {
        // $query = new ShowHomeQuery();

        // $this->bus->handle($query);

        return $this->templating->renderResponse(
            'UIBundle:page:home.html.twig'//,
            // (array) $query->getResponse()
        );
    }
}