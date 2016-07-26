<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

$routes->add('/',
    new Routing\Route('/', [
        '_controller' => 'Octopus\\Controller\\HelloController::indexAction'
    ])
);

$routes->add(
    'hello',
    new Routing\Route('/hello/{name}', [
        '_controller' => 'Octopus\\Controller\\HelloController::helloAction'
    ])
);

$routes->add('bye', new Routing\Route('/bye', [
    '_controller' => function(\Symfony\Component\HttpFoundation\Request $request) {
        return new \Symfony\Component\HttpFoundation\Response('Bye bye!');
    }])
);

return $routes;
