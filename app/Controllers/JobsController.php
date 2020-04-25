<?php

namespace app\Controllers;

use app\models\job;
use Respect\Validation\Validator;

class JobsController extends BaseController
{
	
	public function getAddJobAction($request){
          
          $responseMessage = null;
			
			if(  $request->getMethod() == 'POST'){


            $postData = $request->getParsedBody();
			$jobValidator = 

			Validator::key('txt_title', Validator::stringType()->notEmpty())
			->key('txt_description', Validator::stringType()->notEmpty());

             try {
	                $jobValidator->assert($postData);

                    $files=$request->getUploadedFiles();
                    $logo = $files['logo'];

                    if($logo->getError() == UPLOAD_ERR_OK)
                    	{
                    		$fileName = $logo->getClientFilename();
                    		$logo->moveTo("uploads/$fileName");
                    	}

					$job = new job();
					$job->title = $postData["txt_title"];
					$job->Description = $postData["txt_description"];
					$job->fileName;
					$job->Save();
					$responseMessage = 'Job Saved';
                    
            
             } catch(\Exception $e){
                   $responseMessage ="NO ENVIAR DATOS VACIOS";

             }

         
			}

		 return $this->renderHTML('addJob.twig',[
		 	'responseMessage' => $responseMessage
		 ]);

	}
	
}