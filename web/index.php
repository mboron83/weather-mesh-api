<?php
date_default_timezone_set('Europe/Warsaw');

use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\RouteCollection;

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../config/local.php';

$app = new Application();
$app->register(new TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app->register(new DoctrineServiceProvider(), array(
    'db.options' => $db_conn_param 
));

$app['debug'] = true;

$app['routes'] = $app->extend('routes', function (RouteCollection $routes) use ($app) {
    $loader = new YamlFileLoader(new FileLocator(__DIR__ . '/../config'));
    $collection = $loader->load('routes.yml');
    $routes->addCollection($collection);
    return $routes;
});

$app->run();
