<?php

namespace Elephantly\MjmlBundle\Compiler;

use Twig_Environment as Twig;
use Twig_LoaderInterface;

/**
* primary @author purplebabar(lalung.alexandre@gmail.com)
*/
class MjmlCompiler
{
    /**
    * @var Twig_LoaderInterface
    */
    private $_loader;

    function __construct(Twig_LoaderInterface $loader)
    {
        $this->_loader = $loader;
    }

    public function render($template, $params = array())
    {
        $output = $this->getMjmlOutput($this->getPath($template));
        return $output;
    }

    public function getPath($template)
    {
        return $this->_loader->getSourceContext($template)->getPath();
    }

    public function getMjmlOutput($path)
    {
        $output = shell_exec("mjml --stdout ".$path);
        return $output;
    }
}
