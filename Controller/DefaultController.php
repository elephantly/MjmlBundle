<?php

namespace Elephantly\MjmlBundle\Controller;

class DefaultController extends MjmlController
{
    public function indexAction()
    {
        return $this->renderMjml('ElephantlyMjmlBundle:Default:index.mjml.twig', array('company' => 'Elephantly'));
    }
}
