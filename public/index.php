<?php

ini_set('display_error',1);
ini_set('display_starup_error',1);
error_reporting(E_ALL); //...............PARA INICIALIZAR ERRORES !! 

require_once '../vendor/autoload.php';

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv('DB_USER'),
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


$map->get('saveProjects','/Proyecto_php/projects/add',[
    'controller'=> 'app\Controllers\ProjectsController',
    'action' => 'getAddProjectsAction'
]);

$map->post('addProjects','/Proyecto_php/projects/add',[
    'controller'=> 'app\Controllers\ProjectsController',
    'action' => 'getAddProjectsAction'
]);

$map->get('saveUser','/Proyecto_php/users/add',[
    'controller'=> 'app\Controllers\UsersController',
    'action' => 'getAddUsersAction'
]);

$map->post('addUser','/Proyecto_php/users/add',[
    'controller'=> 'app\Controllers\UsersController',
    'action' => 'getAddUsersAction'
]);

$map->get('loginForm','/Proyecto_php/login',[
    'controller'=> 'app\Controllers\AuthController',
    'action' => 'getLogin'
]);

$map->get('logout','/Proyecto_php/logout',[
    'controller'=> 'app\Controllers\AuthController',
    'action' => 'getLogout'
]);

$map->post('auth','/Proyecto_php/auth',[
    'controller'=> 'app\Controllers\AuthController',
    'action' => 'postLogin'
]);

$map->get('admin','/Proyecto_php/admin',[
    'controller'=> 'app\Controllers\AdminController',
    'action' => 'getIndex',
    'auth' => true
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
    $needsAuth = $handlerData['auth'] ?? false;

    $sessionUserCedula  = $_SESSION['cedula'] ?? null;
    if( $needsAuth && !$sessionUserCedula){
       header('location: /Proyecto_php/login');
      die;
    }

    $controller = new  $controllerName;
    $response = $controller->$actionName($request);

    foreach ($response->getHeaders() as $name => $values) {
      
          foreach ($values as $value) {
            header(sprintf('%s: %s',$name ,$value), false); 
          }
    }
    http_response_code($response->getStatusCode());
    echo $response->getBody();
    
}








	