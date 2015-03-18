<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Cuisine.php";
    require_once __DIR__."/../src/Restaurant.php";

    $app = new Silex\Application();

    $DB = new PDO('pgsql:host=localhost;dbname=best_restaurants');

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    //HOME
    $app->get('/', function() use($app) {
        return $app['twig']->render('index.twig');
    });

    $app->get('/restaurants', function() use($app){
        return $app['twig']->render('restaurants.twig', array('restaurants' => Restaurant::getAll()));
    });

    $app->get('/cuisines', function() use ($app){
        return $app['twig']->render('cuisines.twig', array('cuisines' => Cuisine::getAll()));
    });

    $app->post("/restaurants", function() use ($app){
        $restaurant = new Restaurant($_POST['name'], $_POST['review'], $_POST['stars'], $_POST['id']);
    });

    return $app;

?>
