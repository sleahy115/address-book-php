
<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";
    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));
    session_start();
    if (empty($_SESSION['list_of_contacts'])) {
    $_SESSION['list_of_contacts'] = array();
    }
    $app["debug"] = true;

    $app->get("/", function() use ($app)
    {
      return $app['twig']->render("input_form.html.twig", array("contacts" => Contact::getAll()));
    });
    $app->post("/book", function() use ($app)
    {
      $new_contact = new Contact($_POST['name'], $_POST['address'], $_POST['phone-number'], $_POST['email']);
      $new_contact->save();
      return $app['twig']->render("form_output.html.twig", array("contact_list"=>$_SESSION['list_of_contacts']) );
    });
    $app->get("/search-form", function() use ($app)
    {
        return $app['twig']->render("search-form.html.twig", array("contacts" => Contact::getAll()));
    });
    $app->post("/search", function() use ($app)
    {
        $name_entered =$_POST["name-search"];

        if ($new_contact->search($name_entered) == false) {
            return "wrong";
        }else{
            return "it works!";
        }
        var_dump($_SESSION['list_of_contacts']->search($name_entered));

        return $app['twig']->render("search.html.twig");
    });
    $app->get("/clear", function() use ($app)
    {
        return $app['twig']->render("clear.html.twig", array("clear" => Contact::clearAll()));
    });
    return $app;
?>
