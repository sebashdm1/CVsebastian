<?php

namespace app\Controllers;
use app\models\project;


 class ProjectsController
{
	
	public function getAddProjectsAction($request)
	{

        if($request->getMethod() == 'POST'){
            $postData = $request->getParsedBody();
			$project = new project();
			$project->title = $postData["txt_title"];
			$project->Description = $postData["txt_description"];
			$project->Save();

			}


		include '../views/addProject.php';
	
		
	}
}