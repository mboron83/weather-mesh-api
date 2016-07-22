<?php

namespace Weather;

use Silex\Application;

class AppController
{
    public function homeAction(Application $app)
    {
        return $app['twig']->render('homepage.html.twig', array());
    }
    
    public function chartAction(Application $app)
    {
        $sql = "SELECT * FROM temperature ORDER BY id DESC LIMIT 100";
        $temp = $app['db']->fetchAssoc($sql, array());
        print_r($temp);
        return $app['twig']->render('chart.html.twig', array());
    }    
}
