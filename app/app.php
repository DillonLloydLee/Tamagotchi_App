<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Monster.php";

    session_start();
    if (empty($_SESSION['list_of_monsters'])) {
        $_SESSION['list_of_monsters'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array( 'twig.path' => __DIR__.'/../views'));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('monsters.html.twig', array('monster' => Monster::getAll()));
    });


    $app->post("/add_monster", function() use ($app) {
        $monster = new Monster($_POST['name']);
        $monster->saveMonster();
        return $app['twig']->render('add_monster.html.twig', array('newmonster' => $monster));
    });


    $app->post("/release_monsters", function() use ($app) {
        Monster::releaseAll();
        return $app['twig']->render('release_monsters.html.twig');
    });

    return $app;

?>
