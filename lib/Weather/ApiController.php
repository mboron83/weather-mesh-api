<?php

namespace Weather;

use Symfony\Component\HttpFoundation\Response;

class ApiController
{
    public function sensorAction()
    {
        return new Response("AppController::sensorAction");
    }

    public function sensorAddAction()
    {
        return new Response("AppController::sensorAddAction");
    }
}