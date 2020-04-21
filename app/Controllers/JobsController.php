<?php

namespace app\Controllers;

use app\models\job;

class JobsController extends BaseController
{
	
	public function getAddJobAction($request){
          
         
			if(  $request->getMethod() == 'POST'){
            $postData = $request->getParsedBody();
			$job = new job();
			$job->title = $postData["txt_title"];
			$job->Description = $postData["txt_description"];
			$job->Save();

			}

		echo $this->renderHTML('addJob.twig');

	}
	
}