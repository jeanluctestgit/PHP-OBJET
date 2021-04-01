<?php
// example.com/src/app.php
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
use Calendar\Controller;
use Articles\Controller\ArticlesController;

$routes = new Routing\RouteCollection();
$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', [
    'year' => null,
    '_controller' => '\Calendar\Controller\LeapYearController::index',
], [], [], '', [], ['GET']));

$routes->add('articles', new Routing\Route('/articles', [
    'year' => null,
    '_controller' => '\Articles\Controller\ArticlesController::index',
], [], [], '', [], ['GET']));

$routes->add('delete_article', new Routing\Route('/articles/{id}', [
    'id' => null,
    '_controller' => '\Articles\Controller\ArticlesController::delete',
], [], [], '', [], ['DELETE']));

$routes->add('update_article', new Routing\Route('/articles/{id}', [
    'id' => null,
    '_controller' => '\Articles\Controller\ArticlesController::update',
], [], [], '', [], ['PUT']));

$routes->add('add_article', new Routing\Route('/articles', [
    '_controller' => '\Articles\Controller\ArticlesController::add',
], [], [], '', [], ['POST']));


return $routes;

