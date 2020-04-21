<?php

namespace app\Controllers;
use app\models\project;


 class ProjectsController  extends BaseController
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


		echo $this->renderHTML('addProject.twig');
	
		
	}
}