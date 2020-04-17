<?php 

require_once 'vendor/autoload.php';

use app\models\{job,project};



$jobs = job::all();
$projects = project::all();
	
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


//var_dump($jobs); // sirve para ver contenidos de las variables con el tipo de dato.