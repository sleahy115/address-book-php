<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    session_start();
    if(empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of-contact'] = array();
    }

    $app["debug"] = true;

    $app->get("/", function() use ($app)
    {
      return $app['twig']->render("input_form.html.twig");
    });
    $app->post("/book", function() use ($app)
    {
      $new_contact = new Contact($_POST['name'], $_POST['address'], $_POST['phone-number']);

      return $app['twig']->render("form_output.html.twig", array("contact" => $new_contact));
    });

    return $app;

?>
