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

    /**
     * Add new temperature value to database
     * @param Application $app
     * @param Request $request
     * @return Response
     */    
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

            return new Response("OK");
        }

        return new Response("Method Not Allowed");
    }

    /**
     * Add new humidity value to database
     * @param Application $app
     * @param Request $request
     * @return Response
     */    
    public function humidityNewAction(Application $app, Request $request)
    {
        if ($request->isMethod(Request::METHOD_POST)) {
            $date = new \DateTime();
            $humidity = array(
                'sensor_id'  => $request->get('sensor'),
                'data'       => $request->get('value'),
                'created_at' => $date->format('Y-m-d H:i:s')
            );

            $app['db']->insert('humidity', $humidity);

            return new Response("OK " . $app['db']->lastInsertId());
        }

        return new Response("Method Not Allowed");
    }

    /**
     * Add new pressure value to database
     * @param Application $app
     * @param Request $request
     * @return Response
     */
    public function pressureNewAction(Application $app, Request $request)
    {
        if ($request->isMethod(Request::METHOD_POST)) {
            $date = new \DateTime();
            $pressure = array(
                'sensor_id'  => $request->get('sensor'),
                'data'       => $request->get('value'),
                'created_at' => $date->format('Y-m-d H:i:s')
            );

            $app['db']->insert('pressure', $pressure);

            return new Response("OK " . $app['db']->lastInsertId());
        }

        return new Response("Method Not Allowed");
    }
}