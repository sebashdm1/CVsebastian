<?php 

require 'app/models/job.php';
require 'app/models/project.php';


$job1 = new Job('PHP Developer','Esto es una descripcion usando un multiarray en php.');
$job1->months = 16;

$job2 = new Job('Python Dev', 'Esto es una descripcion usando un multiarray en php.');
$job2->months = 24;

$job3 = new Job('Devops', 'Esto es una descripcion usando un multiarray en php.');
$job3->months = 8;

$project1 = new project('Project 1', 'Esta es la descripcion del proceso 1');



$jobs=[ //arreglo de objetos de tipo Job.

  $job1,
  $job2,
  $job3

	/*[
		'title'=>'php Developer',
		'description' => 'Esto es una descripcion usando un multiarray en php.',
		'visible' => true,
		'months' => 16
	],
	[
		'title'=>'Python Dev',
		'description' => 'Esto es una descripcion usando un multiarray en php.',
		'visible' => false,
		'months' => 14
	],
	[
		'title'=>'Devops',
	    'description' => 'Esto es una descripcion usando un multiarray en php.',
	    'visible' => true,
		'months' => 5
	],
	[
		'title'=>'Node Dev',
	    'description' => 'Esto es una descripcion usando un multiarray en php.',
	    'visible' => false,
		'months' => 24
	],
	[
		'title'=>'Frontend Dev',
	    'description' => 'Esto es una descripcion usando un multiarray en php.',
	    'visible' => true,
		'months' => 3
	]*/
];

$projects= [
    
    $project1

];




function PrintElement($job){

	 if($job->visible == false){
            return;	
          }

	  echo  '<li class="work-position">';
	              echo  '<h5>'.$job->getTitle() .'</h5>';
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


//var_dump($jobs); // sirve para ver contenidos de las variables con el tipo de dato.