
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

    $app->get("/", function() use ($app){
      return $app['twig']->render("input_form.html.twig", array("contacts" => Contact::getAll()));
      });
    $app->post("/book", function() use ($app){
      $new_contact = new Contact($_POST['name'], $_POST['address'], $_POST['phone-number'], $_POST['email']);
      $new_contact->save();
      var_dump($_SESSION['list_of_contacts']);
    //   $new_contact->clearContact($new_contact);
      return $app['twig']->render("form_output.html.twig", array("contact_list"=>$_SESSION['list_of_contacts']));
    //   $delete_contact = array_slice($_SESSION['list_of_contacts'], -1);
    //   $delete_contact = array();
    //   var_dump($delete_contact);
    });
    $app->get("/clear", function() use ($app){
        return $app['twig']->render("clear.html.twig", array("clear" => Contact::clearAll()));
    });
    // $app->get("/clear-contact", function() use ($app)
    // {
    //
    //     return $app['twig']->render("clear-contact.html.twig", array("delete"=>$delete_contact));
    // });
    return $app;
?>
