<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__.'/../src/place.php';

    session_start();

    if (empty($_SESSION['list_of_places'])) {
        $_SESSION['list_of_places'] = array();
    }//The first line starts our session. The next line then checks it for the key 'list_of_tasks' using the empty function, which returns true if there is no value stored in the variable. If the key doesn't exist, we create it and set it to an empty array.

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get('/', function() use ($app) {

        return $app['twig']->render('places.html.twig', array('places' => Places::getAll()));
    });

    $app->post("/places", function() use ($app) { //links to form on places.html.twig
        $place = new Places($_POST['cityname']);//cityname must be the same on the /places form in places.html.twig
        $place->save();
        return $app['twig']->render('output_places.html.twig', array('newplace' => $place)); //newplace array referenced in output_places.html.twig
    });

    $app->post("/delete_places", function() use ($app) {
        Places::deleteAll();
        return $app['twig']->render('delete_places.html.twig');
    });

    return $app;
 ?>
