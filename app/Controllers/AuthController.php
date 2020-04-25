<?php

namespace app\Controllers;

use app\models\user;
use Respect\Validation\Validator;
use Laminas\Diactoros\Response\RedirectResponse;

class AuthController extends BaseController
{
	
	public function getLogin(){
           
	return $this->renderHTML('login.twig');
       	      
	}


    public function getLogout(){
       unset($_SESSION['cedula']);
       return new RedirectResponse('login');
       	      
	}


	public function postLogin($request){

          $postData = $request->getParsedBody();
	      $user = user::where('email',$postData['txt_email'])->first();
          if($user){
                 if(\password_verify($postData['txt_password'], $user->contrasena)){
                     
                     $_SESSION['cedula'] = $user->cedula;
                     return new RedirectResponse('admin');

                 }else{
                 	$responseMessage = 'Bad credentials';
                 }
          }else{
                    $responseMessage = 'Bad credentials'; 
          }

          	return $this->renderHTML('login.twig',[
          		'responseMessage' => $responseMessage
          	]);



		  
	}
	
}