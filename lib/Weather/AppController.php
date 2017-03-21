<?php

namespace Weather;

use Silex\Application;

class AppController
{
    public function homeAction(Application $app)
    {
        return $app['twig']->render('homepage.html.twig', array());
    }

    public function listAction(Application $app)
    {
        $sql = "SELECT sensor_id, name FROM sensor ORDER BY name ASC";
        $sensors = $app['db']->fetchAll($sql, array());
        return $app['twig']->render('list.html.twig', array('sensors' => $sensors));
    }
    
    public function chartAction(Application $app, $sensor)
    {
        $last24 = date('Y-m-d H:i:s', time()-24*60*60);
        $sql = "SELECT data, created_at FROM temperature WHERE sensor_id=? AND created_at>'$last24' ORDER BY id ASC";
        $temp = $app['db']->fetchAll($sql, array($sensor));
        return $app['twig']->render('chart.html.twig', array('temperature' => json_encode($temp)));
    }

    public function currentTemperatureAction(Application $app, $sensor)
    {
        $sql = "SELECT data FROM temperature WHERE sensor_id=? ORDER BY created_at DESC LIMIT 1";
        $current_temperature = $app['db']->fetchColumn($sql, array($sensor), 0);
        return $app['twig']->render('currentTemperature.html.twig', array('current_temperature' => $current_temperature));
    }    
}
