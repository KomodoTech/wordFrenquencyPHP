<?php
    date_default_timezone_set('America/New_York');
    require_once(__DIR__ . "/../vendor/autoload.php");
    require_once(__DIR__ . "/../src/WordRepeatCounter.php");

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array("twig.path" => __DIR__ . "/../views"));


    /*====ROUTES===========================================================================*/
    $app->get("/", function() use($app) {
        return $app["twig"]->render("word_count_form.html.twig");
    });

    $app->get("/term_count", function() use($app) {

        $search_term = $_GET["search_term"];
        $search_text = $_GET["search_text"];

        $search_counter_instance = new WordRepeatCounter($search_term, $search_text);
        $count = $search_counter_instance->countRepeats();

        return $app["twig"]->render("search_term_count.html.twig", array("term" => $search_term, "text" => $search_text, "count" => $count));
    });

    return $app;
 ?>
