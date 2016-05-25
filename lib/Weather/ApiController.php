<?php

namespace Weather;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application;

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

    public function temperatureNewAction(Application $app, Request $request)
    {
        if ($request->isMethod(Request::METHOD_POST)) {
            $date = new \DateTime();
            $temperature = array(
                'sensor_id'  => $request->get('sensor'),
                'data'       => $request->get('value'),
                'created_at' => $date->format('Y-m-d H:i:s')
            );

            $app['db']->insert('temperature', $temperature);

            return new Response("OK " . $app['db']->lastInsertId());
        }

        return new Response("Method Not Allowed");
    }
}