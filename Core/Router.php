<?php


/**
 * Class Router
 */
class Router
{

    /**
     * Associative array of routing table
     * @var array
     */
    protected $routes = [];

    /**
     * Matched route parameters
     * @var array
     */
    protected $params = [];

    /**
     * @param string $route
     * @param array $params
     *
     * @return void
     */
    public function add($route, $params)
    {
        $this->routes[$route] = $params;
    }

    /**
     * Get the routes from the routing table
     *
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * Match the routes to the route in the routing table, setting the $params
     * property if a route is found.
     *
     * @param string $url The route URL
     * @return boolean true if a match is found, false otherwise
     */
    public function match($url)
    {
        foreach ($this->routes as $route => $params) {
            if ($url == $route) {
                $this->params = $params;
                return true;
            }
        }

        return false;
    }

    /**
     * Get the currently matched parameters
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }
}