<?php

namespace Cowboys\UIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Form\Form;

/**
 * Controller for registering
 * 
 * @author gbprod <contact@gb-prod.fr>
 */
class RegisterController extends Controller 
{
    /**
     * @var EngineInterface
     */
    private $templating;
    
    /**
     * @var Form
     */
    private $registerForm;
    
    /**
     * @param EngineInterface $templating
     */
    public function __construct(EngineInterface $templating, Form $registerForm)
    {
        $this->templating   = $templating; 
        $this->registerForm = $registerForm;
    }
    
    /**
     * homepage
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function register()
    {
        return $this->templating->renderResponse(
            'UIBundle:page:register.html.twig',
            [
                'register_form' => $this->registerForm->createView(),    
            ]
        );
    }
}