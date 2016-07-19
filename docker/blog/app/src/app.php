<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add(
    'hello',
    new Routing\Route('/hello/{name}', [
        '_controller' => 'Octopus\\Controller\\HelloController::indexAction'
    ])
);
$routes->add('bye', new Routing\Route('/bye'));

return $routes;
