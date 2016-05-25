<?php

namespace Weather;

use Symfony\Component\HttpFoundation\Response;

class AppController
{
    public function homeAction()
    {
        return new Response("AppController::homeAction");
    }
}