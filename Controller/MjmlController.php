<?php

namespace Elephantly\MjmlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
* @author purplebabar lalung.alexandre@gmail.com
*/
class MjmlController extends Controller
{
    /**
     * Returns a rendered view.
     *
     * @param string $view       The view name
     * @param array  $parameters An array of parameters to pass to the view
     *
     * @return string The rendered view
     */
    public function renderMjmlView($view, array $parameters = array())
    {
        $mjml = $this->container->get('elephantly.mjml')->render($view);

        if ($this->container->has('templating')) {
            return $this->container->get('templating')->render($mjml, $parameters);
        }

        if (!$this->container->has('twig')) {
            throw new \LogicException('You can not use the "renderView" method if the Templating Component or the Twig Bundle are not available.');
        }

        return $this->container->get('twig')->render($mjml, $parameters);
    }

    /**
     * Renders a view.
     *
     * @param string   $view       The view name
     * @param array    $parameters An array of parameters to pass to the view
     * @param Response $response   A response instance
     *
     * @return Response A Response instance
     */
    public function renderMjml($view, array $parameters = array(), Response $response = null)
    {
        $mjml = $this->container->get('elephantly.mjml')->render($view);

        if ($this->container->has('templating')) {
            return $this->container->get('templating')->renderResponse($mjml, $parameters, $response);
        }

        if (!$this->container->has('twig')) {
            throw new \LogicException('You can not use the "render" method if the Templating Component or the Twig Bundle are not available.');
        }

        if (null === $response) {
            $response = new Response();
        }

        $response->setContent($this->container->get('twig')->render($mjml, $parameters));

        return $response;
    }
}
