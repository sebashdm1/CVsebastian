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
$map->get('index','/Proyecto_php/',[
    'controller'=> 'app\Controllers\IndexController',
    'action' => 'indexAction'
]);

$map->get('saveJobs','/Proyecto_php/jobs/add',[
    'controller'=> 'app\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);

$map->post('addJobs','/Proyecto_php/jobs/add',[
    'controller'=> 'app\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);






$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

function PrintElement($job){

    // if($job->visible == false){
    //       return;    
   //    }

      echo  '<li class="work-position">';
                  echo  '<h5>'.$job->title .'</h5>';
                  echo  '<p>' .$job->description.'</p>';
                  echo  '<p>' .$job->getDurationAsString().'</p>';
                  echo  '<strong>Achievements: </strong>';
                  echo  '<ul> ';
                  echo  '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li> ';
                  echo  '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li> ';
                  echo  '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li> ';
                  echo  '</ul>';
                  echo  '</li>';

}


function printElementProject($project){

    // if($job->visible == false){
    //       return;    
   //    }

      echo  '<li class="work-position">';
                  echo  '<h5>'.$project->title .'</h5>';
                  echo  '<p>' .$project->description.'</p>';
                  echo  '<p>' .$project->getDurationAsString().'</p>';
                  echo  '<strong>Achievements: </strong>';
                  echo  '<ul> ';
                  echo  '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li> ';
                  echo  '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li> ';
                  echo  '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li> ';
                  echo  '</ul>';
                  echo  '</li>';

}


if(!$route){
    echo 'No Found';
}else{
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];

    $controller = new  $controllerName;
    $controller->$actionName($request);
    
}








	