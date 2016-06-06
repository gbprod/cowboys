<?php

namespace Cowboys\UI\Controller;

use League\Tactician\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Request;

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
     * @var CommandBus
     */
    private $commandBus;

    /**
     * @var UrlGeneratorInterface
     */
    private $router;

    /**
     * @param EngineInterface       $templating
     * @param Form                  $registerForm
     * @param CommandBus            $commandBus
     * @param UrlGeneratorInterface $router
     */
    public function __construct(
        EngineInterface $templating,
        Form $registerForm,
        CommandBus $commandBus,
        UrlGeneratorInterface $router
    ) {
        $this->templating   = $templating;
        $this->registerForm = $registerForm;
        $this->commandBus   = $commandBus;
        $this->router       = $router;
    }

    /**
     * Register
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function register(Request $request)
    {
        $this->registerForm->handleRequest($request);

        if ($this->registerForm->isSubmitted() && $this->registerForm->isValid()) {
            $this->commandBus->handle(
                $this->registerForm->getData()
            );

            return $this->redirect(
                $this->router->generate('register_success')
            );
        }

        return $this->templating->renderResponse(
            'UIBundle:page:register.html.twig',
            [
                'register_form' => $this->registerForm->createView(),
            ]
        );
    }

    /**
     * Register success
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function registerSuccess()
    {
        return $this->templating->renderResponse(
            'UIBundle:page:register_success.html.twig'
        );
    }
}