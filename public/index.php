<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require '../vendor/autoload.php';

/*---------ingredients-------*/


$amandine = ['products' => 'poire', 'amande', 'oeufs', 'farine', 'beurre', 'sucre'];
$brownies = ['products' => 'sucre', 'farine', 'beurre', 'oeufs', 'chocolat', 'noisettes'];
$cake = ['products' => 'fruits confits', 'raisins', 'farine', 'sucre', 'oeufs'];


/*------------routing------------*/

$page = 'home';
if (isset($_GET['p'])) {
  $page = $_GET['p'];
}

/*-------------render-------------*/

$loader = new FilesystemLoader(__DIR__ . '\..\src\View');
$twig = new Environment($loader);

switch ($page) {
  case 'home':
    echo $twig->render('base.html.twig');
    break;
  case 'poire_amandine':
    echo $twig->render('poire.html.twig', ['products' => $amandine]);
    break;
  case 'brownies':
    echo $twig->render('brownies.html.twig', ['products' => $brownies]);
    break;
  case'cake_aux_fruits_confits':
    echo $twig->render('cake.html.twig', ['products' => $cake]);
    break;
  default:
    header('HTTP/1.0 404 Not found');
    echo $twig->render('404.html.twig');
    break;
}