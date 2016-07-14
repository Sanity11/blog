<?php

namespace Octopus\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloController
{
    public function indexAction(Request $request)
    {
        return new Response('The leap of the heap');
    }
}
