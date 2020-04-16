<?php

require_once 'app/models/baseElement.php';

 class job extends baseElement{

 	public function __construct($title , $description){
 			$newTitle= 'Job: '.$title;
 			parent::__construct($newTitle , $description);

 		}

 	public function getDurationAsString(){

		$years = floor( $this->months / 12);
		$extraMonths = $this->months % 12;

		if($years==0){
			return "$extraMonths  months";
		}else{
		return "Job Duration: $years years $extraMonths  months";
       }
   }

 }