<?php

ini_set('display_error',1);
ini_set('display_starup_error',1);
error_reporting(E_ALL); //...............PARA INICIALIZAR ERRORES !! 

require_once '../vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'portafoliodb',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals( // implementacion de diactoros para las peticiones
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);



$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();
$map->get('index','/Proyecto_php/','../index.php');
$map->get('addJobs','/Proyecto_php/jobs/add','../addJobs.php');

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if(!$route){
    echo 'No Found';
}else{
    require $route->handler;
}








	