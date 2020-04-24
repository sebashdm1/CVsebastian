<?php

namespace app\Controllers;

use app\models\user;
use Respect\Validation\Validator;

class UsersController extends BaseController
{
	
	public function getAddUsersAction($request){
          
          $responseMessage = null;
			
			if(  $request->getMethod() == 'POST'){


                    $postData = $request->getParsedBody();
			        $user = new user();
			        $user->cedula = $postData["txt_cedula"];
					$user->nombre = $postData["txt_nomUser"];
					$user->email = $postData["txt_email"];
					$user->contrasena =password_hash($postData["txt_password"], PASSWORD_DEFAULT);
					$user->Save();
					$responseMessage = 'User Saved';
                   
			}

		 return $this->renderHTML('addUser.twig',[
		 	'responseMessage' => $responseMessage
		 ]);

	}
	
}