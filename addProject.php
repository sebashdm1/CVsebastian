<?php
//Variables super globales
//var_dump($_GET); // var_dump codigo que se ejecuta en el servidor!
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use app\models\project;

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

if(!empty($_POST)){

$project = new project();
$project->title = $_POST["txt_title"];
$project->Description = $_POST["txt_description"];
$project->Save();

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Project</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <h1>Add Project</h1>
       <form action="addProject.php" method="POST">
       	   <label>Title: </label>
       	   <input type="text" name="txt_title"><br>
       	   <label>Description: </label>
       	   <input type="text" name="txt_description"><br>
       	   <button type="submit">Save</button>
       </form>	

</body>
</html>