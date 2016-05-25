<?php

namespace Weather;

use Silex\Application;

class AppController
{
    public function homeAction(Application $app)
    {
        return $app['twig']->render('homepage.html.twig', array());
    }
}