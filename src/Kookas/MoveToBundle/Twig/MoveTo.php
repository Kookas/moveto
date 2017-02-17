<?php

/**
 * This file is part of kookas/movetobundle.
 *
 * (c) Ashleigh Udoh <mail@audoh.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kookas\MoveToBundle\Twig;

use Twig_Extension,
    Twig_SimpleFunction;

class MoveTo extends Twig_Extension
{
    private $requestStack;
    private $router;
    
    public function __construct($requestStack, $router)
    {
        $this->requestStack = $requestStack;
        $this->router = $router;
    }
    
    public function getFunctions()
    {
        return 
        [
            new Twig_SimpleFunction('moveTo', [$this, 'moveTo'])
        ];
    }
    
    private function getUrl()
    {
        $uri = 
        [
            'route' => $this
                ->requestStack
                ->getMasterRequest()
                ->attributes
                ->get('_route'),
                
            'params' => $this
                ->requestStack
                ->getMasterRequest()
                ->attributes
                ->get('_route_params')
        ];
                
        return $uri;
    }
    
    public function moveTo($params, $route = null)
    {        
        $path = $this->getUrl();
        
        if($route)
            $path['route'] = $route;
        
        $path['params'] = array_replace($path['params'], $params);
        
        $uri = $this->router->generate($path['route'], $path['params']);
        
        return $uri;
    }
    
    public function getName()
    {
        return "kookas-move_to";
    }
}