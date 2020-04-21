<?php

namespace app\Controllers;
use app\models\job;
use app\models\project;


class IndexController extends BaseController 
{
	public function indexAction(){
		

		$jobs = job::all();
		$projects = project::all();


		
		$name='Sebastián Hernández Caro';
        $limitMonths = 240 ;
   

		return $this->renderHTML('index.twig',[
			'name' => $name,
			'jobs' => $jobs,
			'projects' => $projects
		]);
	}
}