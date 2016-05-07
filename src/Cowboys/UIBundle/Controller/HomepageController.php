<?php

namespace Cowboys\UIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

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
     * @param EngineInterface $templating
     */
    public function __construct(EngineInterface $templating)
    {
        $this->templating = $templating; 
    }
    
    /**
     * homepage
     * 
     * @return Response
     */
    public function home()
    {
        return $this->templating->renderResponse(
            'UIBundle:page:home.html.twig'
        );
    }
}