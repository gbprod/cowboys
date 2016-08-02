<?php

namespace Cowboys\UI\Controller;

use SimpleBus\Message\Bus\MessageBus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

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
     * @var MessageBus
     */
    private $bus;

    /**
     * @var UrlGeneratorInterface
     */
    private $router;

    /**
     * @param EngineInterface       $templating
     * @param Form                  $registerForm
     * @param MessageBus            $bus
     * @param UrlGeneratorInterface $router
     */
    public function __construct(
        EngineInterface $templating,
        Form $registerForm,
        MessageBus $bus,
        UrlGeneratorInterface $router
    ) {
        $this->templating   = $templating;
        $this->registerForm = $registerForm;
        $this->bus          = $bus;
        $this->router       = $router;
    }

    /**
     * Register
     *
     * @param Request $request
     *
     * @return Response
     */
    public function register(Request $request)
    {
        $this->registerForm->handleRequest($request);

        if ($this->registerForm->isSubmitted() && $this->registerForm->isValid()) {
            $this->bus->handle($this->registerForm->getData());

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
     * @return Response
     */
    public function registerSuccess()
    {
        return $this->templating->renderResponse(
            'UIBundle:page:register_success.html.twig'
        );
    }
}