<?php

namespace app\models;
use Illuminate\Database\Eloquent\Model;	

 class job extends Model  {
 	protected $table = 'jobs';

 

 	public function getDurationAsString(){

		$years = floor( $this->months / 12);
		$extraMonths = $this->months % 12;

		if($years==0){
			return "Job duration:  $extraMonths  months";
		}else if($years != 0){
		    return "Job Duration: $years years $extraMonths  months";
       }

    
   }

 }