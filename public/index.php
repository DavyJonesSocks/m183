<?php

include_once "../vendor/autoload.php";
$router = new \Controller\Router(new \Controller\Request);

$router->add('/dashboard', Controller\Dashboard::class);
$router->add('/dashboard', Controller\Dashboard::class);
echo $router->run();
$interface = new \Controller\ApiInterface();




//$data = $interface->getPokemon($interface::ALL_POKEMON);

//var_dump($data);

?>

