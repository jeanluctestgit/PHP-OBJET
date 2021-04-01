<?php
// example.com/src/app.php
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
use Calendar\Controller;

$routes = new Routing\RouteCollection();
$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', [
    'year' => null,
    '_controller' => '\Calendar\Controller\LeapYearController::index',
]));


return $routes;

