<?php

namespace Kookas\MoveToBundle\Twig;

class MoveTo extends \Twig_Extension
{
    private $_requestStack;
    private $_router;
    
    public function __construct($requestStack, $router)
    {
        $this->_requestStack = $requestStack;
        $this->_router = $router;
    }
    
    public function getFunctions()
    {
        return 
        [
            new \Twig_SimpleFunction('moveTo', [$this, 'moveTo'])
        ];
    }
    
    private function getRequestStack()
    {
        return $this->_requestStack;
    }
    
    private function getRouter()
    {
        return $this->_router;
    }
    
    private function getUrl()
    {
        $uri = 
        [
            'route' => $this
                ->getRequestStack()
                ->getCurrentRequest()
                ->attributes
                ->get('_route'),
                
            'params' => $this
                ->getRequestStack()
                ->getCurrentRequest()
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
        
        $uri = $this->getRouter()->generate($path['route'], $path['params']);
        
        return $uri;
    }
    
    public function getName()
    {
        return "kookas-move_to";
    }
}