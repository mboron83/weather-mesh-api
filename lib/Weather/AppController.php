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
        return $app['twig']->render('chart.html.twig', array());
    }    
}
