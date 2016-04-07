<?php

/**
 * Created by PhpStorm.
 * User: wlodek
 * Date: 07/04/16
 * Time: 12:04
 */
class Router
{
    /**
     * Assotiative array of routes -routing table
     * @var array
     */
    protected $routes = [];

    /**
     * Parameters from the matched route
     * @var array
     */
    protected $params = [];



    /**
     * Add a route to the routing table
     *
     * @param string $route The route URL
     * @param array $prams Parameters (e.g. controller, action, etc.)
     *
     * @return void
     */
    public function add($route, $params =[]){
        // Convert the route to a regular expression: escape forward slashes
        $route = preg_replace('/\//', '\\/', $route);

        // Convert variables e.g. {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        // Convert variables with custom regular expressions e.g. {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        // Add start and end delimiters, and case insensitive flag
        $route = '/^' . $route . '$/i';


        $this->routes[$route] = $params;
    }

    /**
     * Get all the routes from the routing table
     *
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * Match the route to the routes in routing table
     * setting $params property if route is found
     *
     * @param string $url The route url
     *
     * @return boolean true if match found, or false otherwise
     */
    public function match($url)
    {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }

                $this->params = $params;
                return true;
            }
        }

        return false;
    }


    /**
     * Get currently matched parameters
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

}