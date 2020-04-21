<?php

namespace app\Controllers;
use app\models\job;
use app\models\project;


class IndexController
{
	public function indexAction(){
		

		$jobs = job::all();
		$projects = project::all();


		
		$name='Sebastián Hernández Caro';
        $limitMonths = 240 ;
   
        include '../views/index.php';

	}
}