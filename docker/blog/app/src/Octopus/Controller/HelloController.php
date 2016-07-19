<?php

namespace Octopus\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloController
{
    public function indexAction(Request $request)
    {
        $serverName = $request->server->get('SERVER_NAME');

        xdebug_var_dump($serverName);

        $response =
            '<h1>It\'s working, deployed!!!</h1>' .
            '<br />' .
            '<img src="http://thecatapi.com/api/images/get?format=src&type=gif">';

        if ($serverName === 'blog.dev') {

            $response = '<h1>Owww yeah, we have a local dev environment.</h1>';
        }

        return new Response($response);
    }

    public function helloAction(Request $request)
    {
        return new Response('<h2>Hello ' . $request->get('name') . '</h2>');
    }
}
