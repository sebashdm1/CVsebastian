<?php

namespace app\Controllers;
use app\models\job;
use app\models\project;


class AdminController extends BaseController 
{
	public function getIndex(){
		
		return $this->renderHTML('admin.twig',[
	
		]);
	}
}