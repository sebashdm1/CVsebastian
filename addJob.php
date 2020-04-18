<?php
//Variables super globales
//var_dump($_GET); // var_dump codigo que se ejecuta en el servidor!
use app\models\job;

if(!empty($_POST)){

$job = new job();
$job->title = $_POST["txt_title"];
$job->Description = $_POST["txt_description"];
$job->Save();

}




?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Job</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <h1>Add Job</h1>
       <form action="addJob.php" method="POST">
       	   <label>Title: </label>
       	   <input type="text" name="txt_title"><br>
       	   <label>Description: </label>
       	   <input type="text" name="txt_description"><br>
       	   <button type="submit">Save</button>
       </form>	

</body>
</html>