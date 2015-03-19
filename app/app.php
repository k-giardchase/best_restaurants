<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Cuisine.php";
    require_once __DIR__."/../src/Restaurant.php";

    $app = new Silex\Application();

    $DB = new PDO('pgsql:host=localhost;dbname=best_restaurants');

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    //HOME
    $app->get('/', function() use($app) {
        return $app['twig']->render('index.twig', array('cuisines' => Cuisine::getAll()));
    });

    $app->get('/restaurants', function() use($app){
        return $app['twig']->render('restaurants.twig', array('restaurants' => Restaurant::getAll()));
    });

    $app->get('/cuisine/{id}', function($id) use ($app){
        $cuisine = Cuisine::find($id);
        return $app['twig']->render('cuisine.twig', array('cuisines' => $cuisine, 'restaurants' => $cuisine->getRestaurants()));
    });

    $app->post('/cuisine', function() use ($app){
        $cuisine = new Cuisine($_POST['type']);
        $cuisine->save();
        return $app['twig']->render('index.twig', array('cuisines' => Cuisine::getAll()));
    });

    $app->post("/restaurants", function() use ($app){
        $name = $_POST['name'];
        $review = $_POST['review'];
        $stars = $_POST['stars'];
        $type_id = $_POST['type_id'];
        $restaurant = new Restaurant($name, $review, $stars, $type_id, $id = null);
        $restaurant->save();
        $cuisine = Cuisine::find($type_id);
        return $app['twig']->render('cuisine.twig', array('cuisines' => $cuisine, 'restaurants' => Restaurant::getAll()));
    });

    $app->post("/delete_restaurants", function() use($app){
        Restaurant::deleteAll();
    return $app['twig']->render('index.twig', array('cuisines' => Cuisine::getAll()));
    });

    $app->post("/delete_cuisines", function() use($app){
            Cuisine::deleteAll();
            return $app['twig']->render('index.twig');
    });

    $app->get("/cuisine/{id}/edit", function($id) use($app){
        $cuisine = Cuisine::find($id);
        return $app['twig']->render('cuisine_edit.twig', array('cuisine' => $cuisine));
    });

    $app->patch("/cuisine/{id}", function($id) use ($app){
        $type = $_POST['type'];
        $cuisine = Cuisine::find($id);
        $cuisine->update($type);

        return $app['twig']->render('cuisine.twig', array('cuisines' => $cuisine, 'restaurants' => $cuisine->getRestaurants()));
    });

    $app->delete('/cuisine/{id}', function ($id) use ($app) {
        $cuisines = Cuisine::find($id);
        $cuisines->delete();
        return $app['twig']->render('index.twig', array('cuisines' => Cuisine::getAll()));
    });


    return $app;

?>
