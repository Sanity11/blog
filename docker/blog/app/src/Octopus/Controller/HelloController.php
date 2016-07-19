<?php

namespace Octopus\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloController
{
    public function indexAction()
    {
        return new Response('<h1>It\'s working, deployed!!!</h1><br><img src="http://thecatapi.com/api/images/get?format=src&type=gif">');
    }

    public function helloAction(Request $request)
    {
        return new Response('<h2>Hello ' . $request->get('name') . '</h2>');
    }
}
